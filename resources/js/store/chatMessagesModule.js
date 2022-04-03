import axios from "axios";

export const chatMessagesModule = {
    state: () => ({
        messages: []
    }),
    mutations: {
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
                    })
            } else {
                return;
            }
        }
    }
};