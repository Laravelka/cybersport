<template>
    <div class="header">
        <router-link class="header__icon" :to="{ name: 'profile' }">
            <div class="header__icongradient icon">
                <img class="header__iconimg" :src="user.avatar" alt="">
                <span>10</span>
            </div>
        </router-link>
        <div class="header__info">
            <router-link class="header__name user-name" :to="{ name: 'profile' }">{{ user.name }}
                <span class="header__settings-icon">
                        <img class="header__settings" src="/images/admin/icons/settings.svg" alt="">
                    </span>
            </router-link>
            <div class="header__num purse">{{ user.balance }} $
                <span>
                        <img class="header__numimg" src="/images/admin/icons/purse.svg" alt="">
                    </span>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState, mapActions} from "vuex";

    export default {
        data() {
            return {

            }
        },
        computed: {
            ...mapState({
                user: state => state.currentUser.user
            })
        },
        methods: {
            ...mapActions({
                logout: 'logoutUser'
            })
        }
    }
</script>