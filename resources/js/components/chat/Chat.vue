<template>
        <div class="match-chat">
            <div class="match-chat__inner">
                <form class="match-chat__form" action="#">
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
                                :value="message.message"
                                @input="inputMessage"
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
                                @click.prevent="sendMessage"
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
    import {mapState, mapMutations} from "vuex";

    export default {
        data() {
            return {
                message: {
                    message: ''
                },
                chatMessages: [
                    {
                        id: 1,
                        userName: "First User",
                        userAvatar: "images/user/1.png",
                        message: "Какое-то сообщение",
                        time: "22:44"
                    },
                    {
                        id: 2,
                        userName: "Second User",
                        userAvatar: "images/user/1.png",
                        message: "Какое-то сообщение от пользователя",
                        time: "22:45"
                    },
                    {
                        id: 3,
                        userName: "Third User",
                        userAvatar: "images/user/1.png",
                        message: "Какое-то длинное сообщение от третьего пользователя",
                        time: "22:46"
                    },
                    {
                        id: 4,
                        userName: "First User",
                        userAvatar: "images/user/1.png",
                        message: "Какое-то длинное сообщение от первого пользователя с кучей текста",
                        time: "22:47"
                    },
                    {
                        id: 5,
                        userName: "Second User",
                        userAvatar: "images/user/1.png",
                        message: "Какое-то длинное сообщение от второго пользователя с кучей текста",
                        time: "22:53"
                    }
                ]
            }
        },
        computed: {
            // ...mapState({
            //     messages: state => state.messages.messages
            // })
            messages() {
                return this.chatMessages.slice(-5);
            }
        },
        methods: {
            inputMessage(event) {
                this.message.message = event.target.value;
            },
            sendMessage(event) {
                this.saveMessage(this.message);
                this.message.message = '';
            },
            saveMessage(payload) {
                let id = this.chatMessages[this.chatMessages.length - 1].id + 1; // temp for test
                let date = new Date(); // temp for test
                this.chatMessages.push({
                    id,
                    userName: "Current User",
                    userAvatar: "images/user/1.png",
                    message: payload.message,
                    time: date.getHours() + ':' + date.getMinutes()
                });
            }
            // ...mapMutations({
            //     saveMessage: 'addMessage'
            // })
        }
    }
</script>