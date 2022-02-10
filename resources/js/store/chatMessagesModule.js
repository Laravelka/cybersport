export const chatMessagesModule = {
    state: () => ({
        messages: [
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
    }),
    mutations: {
        addMessage(state, payload) {
            let id = state.messages[state.messages.length - 1].id + 1; // temp for test
            let date = new Date(); // temp for test
            state.messages.push({
                id,
                userName: "Current User",
                userAvatar: "images/user/1.png",
                message: payload,
                time: date.getHours() + ':' + date.getMinutes()
            });
        }
    }
};