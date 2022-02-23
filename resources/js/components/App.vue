<template>
    <router-view></router-view>
    <loader v-show="loading"></loader>
    <error
            v-show="errorMessage"
            :message="errorMessage"
    ></error>
</template>

<script>
    import axios from "axios";
    import {mapState, mapGetters} from "vuex";
    import Error from "./UI/Error";
    import Loader from "./UI/Loader";

    export default {
        components: {
            Error, Loader
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

            if (this.token) {
                axios.defaults.headers.common["Authorization"] = "Bearer " + this.token;
            }
        },
        // beforeUpdate() {
        //     if (localStorage.hasOwnProperty("access_token")) {
        //         axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("access_token");
        //     }
        // }
    }
</script>