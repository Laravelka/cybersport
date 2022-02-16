<template>
    <router-view></router-view>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                name: "Cyber app"
            }
        },
        created() {
            axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("access_token");
        }
    }
</script>