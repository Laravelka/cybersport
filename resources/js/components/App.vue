<template>
    <router-view></router-view>
</template>

<script>
    import axios from "axios";
    import {mapActions} from "vuex";

    export default {
        data() {
            return {
                name: "Cyber app"
            }
        },
        created() {
            if (localStorage.hasOwnProperty("access_token")) {
                axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("access_token");
            }
        }
    }
</script>