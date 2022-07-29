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
	// import { Picker, EmojiIndex } from "emoji-mart-vue-fast/src";
	// import data from "emoji-mart-vue-fast/data/twitter.json";
    import { mapState, mapGetters } from "vuex";
    import Error from "./UI/Error";
    import Loader from "./UI/Loader";
    import Toast from "./Toast";
	import { ref } from "vue";

	// import 'emoji-mart-vue-fast/css/emoji-mart.css'

	// let emojiIndex = new EmojiIndex(data);

    export default {
        components: {
            Error, Loader, Toast
        },
        data: () => ({
            name: "Cyber app"
        }),
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
        },
		setup() {
			const pickerStyle = ref({});
			const emojisOutput = ref('');
			const isShowEmojiPickerRef = ref(false);
			const emojiPickerPositionRef = ref(false);

			// <Picker :class="isShowEmojiPickerRef ? 'show' : null" :style="pickerStyle" :data="emojiIndex" set="twitter" @select="showEmoji" />

			return {
				showEmoji(emoji) {
					if (emojiPickerPositionRef.value === 'comment') {

					}
					isShowEmojiPickerRef.value = false;
				},
				// emojiIndex: emojiIndex,
				pickerStyle,
				setShowPicker: (value, position) => {
					isShowEmojiPickerRef.value = value;
					emojiPickerPositionRef.value = position;
				},
				isShowEmojiPickerRef,
				emojiPickerPositionRef,
			}
		}
    }
</script>
