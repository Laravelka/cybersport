<template>
    <router-view></router-view>
    <loader v-show="loading"></loader>
	<Toast
		:is-spin="true"
		:is-open="errorMessage !== null"
		color="danger"
		placement="top-center"
		:body="errorMessage"
		icon-size="35px"
	/>
</template>

<script>
    import { mapState, mapGetters } from "vuex";
    import Error from "./UI/Error";
    import Loader from "./UI/Loader";
    import Toast from "./Toast";

    export default {
        components: {
            Error, Loader, Toast
        },
        data() {
            return {
                name: "Cyber app"
            }
        },
        computed: {
            ...mapState({
                loading: state => state.common.loading,
                errorMessage: state => state.common.error,
                token: state => state.currentUser.token
            }),
            ...mapGetters({
                isLoggedIn: 'isLoggedIn'
            })
        },
        created() {
            if (localStorage.hasOwnProperty("current_user") && localStorage.hasOwnProperty("access_token")) {
                this.$store.dispatch("autoLoginUser", {
                    user: JSON.parse(localStorage.getItem("current_user")),
                    token: localStorage.getItem("access_token")
                });
            }
        }
    }
</script>
