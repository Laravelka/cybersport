<template>
        <div class="match-chat">
            <div class="match-chat__inner">
                <form
                        @submit.prevent
                        class="match-chat__form"
                        action="#"
                >
                    <div class="match-chat__label-box">
                        <label v-for="message in messages" :key="message.id" class="match-chat__label">
                            <a class="match-chat__icon" href="#">
                                <div class="match-chat__icongradient icon-chat">
                                    <img class="match-chat__iconimg" :src="message.userAvatar" alt="">
                                </div>
                            </a>
                            <div class="match-chat__text-inner">
                                <div class="match-chat__text-username chat-username">{{ message.userName }}</div>
                                <div class="match-chat__message-box">
                                    <div class="match-chat__message">{{ message.message }}</div>
                                    <div class="match-chat__message-time">{{ message.time }}</div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="match-chat__input-box">
                        <input
                                v-model="messageData.message"
                                class="match-chat__form-input"
                                placeholder="Сообщение..."
                                type="text"
                        >
                        <button class="match-chat__btn-attach">
                            <img src="images/icons/attach.svg" alt="">
                        </button>
                        <button class="match-chat__btn-emoji">
                            <img src="images/icons/emoji.svg" alt="">
                        </button>
                        <button
                                @click="sendMessage"
                                class="match-chat__btn-send"
                        >
                            <img src="images/icons/send.svg" alt="">
                        </button>
                    </div>
                </form>
                <button class="match-chat__btn">
                    <img class="match-chat__btn-img" src="images/icons/arrow-right.svg" alt="">
                </button>
            </div>
        </div>
</template>

<script>
    import {mapState, mapActions} from "vuex";

    export default {
        data() {
            return {
                messageData: {
                    message: '',
                    chatId: '2'
                },
            }
        },
        created() {
            this.getMessages(2);
        },
        mounted() {
            window.Echo.channel('chat.2')
                .listen('ChatMessage', () => {
                    this.getMessages(2);
                });
        },
        computed: {
            ...mapState({
                chatMessages: state => state.messages.messages
            }),
            messages() {
                return this.chatMessages.slice(-5);
            }
        },
        methods: {
            sendMessage() {
                this.saveMessage(this.messageData);
                this.messageData.message = '';
            },
            ...mapActions({
                getMessages: 'getMessages',
                saveMessage: 'saveMessage'
            })
        }
    }
</script>