import axios from "axios";

export const currentUserModule = {
    state: () => ({
        user: {
            id: '',
            name: '',
            email: 'admin@mail.com',
            phone: '48123456789',
            firstName: '',
            lastName: '',
            telegram: '',
            discord: '',
            avatar: '',
            isAdmin: '',
            isBanned: '',
            balance: '',
            balanceCoins: '',
            pwPoints: '',
            referalStatus: '',
            referalLink: '',
            posts: []
        }
    }),
    actions: {
        loginUser({}, user) {
            console.log(user);
            if (user.email.indexOf('@') === -1) {
                user.phone = user.email;
                delete user.email;
            }
            axios
                .post("/api/v1/login", {
                    ...user
                })
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
};