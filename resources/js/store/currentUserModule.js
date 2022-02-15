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
    })
};