<template>
    <div class="chooseTeam popup-bg">
        <div class="chooseTeam-inner">
            <div class="chooseTeam-wrapper">
                <button
					@click="clearError"
					class="chooseTeam-wrapper__btn-close btn-close"
				>
                    <img src="/images/icons/close.svg" alt="">
                </button>
                <div class="error-message">{{ message }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from "vuex";

    export default {
        data() {
            return {

            }
        },
        props: {
            message: {
				type: String,
				default: 'Неизвестная ошибка'
			}
        },
        computed: {
        },
        methods: {
            ...mapActions({
                clearError: 'clearError'
            })
        }
    }
</script>

<style scoped>
    .chooseTeam {
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        background: #212136;
        opacity: .9;
        z-index: 1001;
    }

	.error-message {
		color: #d9516a;
	}
</style>
