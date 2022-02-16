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
            axios
                .post("/api/v1/login", {
                    email: user.email,
                    password: user.password
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