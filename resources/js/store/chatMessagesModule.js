import axios from "axios";

export const chatMessagesModule = {
    state: () => ({
        messages: []
    }),
    mutations: {
        addMessages(state, payload) {
            if (payload.data) {
                payload.data.forEach((item, index, array) => {
                    if (item.time) {
                        let time = new Date(Date.parse(item.time));
                        item.time = `${time.getHours()}:${time.getMinutes()}`;
                    }
                });

                state.messages = payload.data;
            }
        },
        addMessage(state, payload) {
            // let id = state.messages[state.messages.length - 1].id + 1; // temp for test
            // let date = new Date(); // temp for test
            // state.messages.push({
            //     id,
            //     userName: "Current User",
            //     userAvatar: "images/user/1.png",
            //     message: payload,
            //     time: date.getHours() + ':' + date.getMinutes()
            // });

        }
    },
    actions: {
        getMessages({commit}, chatId) {
            if (chatId != '') {
                axios
                    .get(`/api/v1/chat/${chatId}`)
                    .then(response => {
                        commit('addMessages', response.data);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            } else {
                return;
            }
        },
        saveMessage({commit}, messageData) {
            if (messageData.message.trim() != '' && messageData.chatId != '') {
                axios
                    .post(`/api/v1/chat/${messageData.chatId}/message`, {
                        message: messageData.message
                    })
                    .then(response => {
                        console.log(response.data);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            } else {
                return;
            }
        }
    }
};