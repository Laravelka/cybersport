<template>
    <router-view></router-view>
    <loader v-show="loading"></loader>
</template>

<script>
    import axios from "axios";
    import {mapState} from "vuex";
    import Loader from "./UI/Loader";

    export default {
        components: {
            Loader
        },
        data() {
            return {
                name: "Cyber app"
            }
        },
        computed: {
            ...mapState({
                loading: state => state.common.loading
            })
        },
        created() {
            if (localStorage.hasOwnProperty("access_token")) {
                axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("access_token");
            }
        }
    }
</script>