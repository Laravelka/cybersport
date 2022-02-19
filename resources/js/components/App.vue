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
                errorMessage: state => state.common.error
            }),
            ...mapGetters({
                isLoggedIn: 'isLoggedIn'
            })
        },
        created() {
            if (localStorage.hasOwnProperty("current_user")) {
                this.$store.dispatch("autoLoginUser", JSON.parse(localStorage.getItem("current_user")));
            }
            if (localStorage.hasOwnProperty("access_token")) {
                axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("access_token");
            }
        }
    }
</script>