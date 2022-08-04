<template>
	<div class="emojione-box position-absolute shadow-sm">
		<div class="emojione-box-loader" v-if="isLoading">
			Загрузка...
		</div>
		<div v-else>
			<div class="emojione-box-categories">
				<div class="emojione-box-category-tabs">
					<div v-for="(category, index) in emojione.categories" v-bind:key="index"
						v-html="toImage(emojione.shortCodesSort[category][0])" />
				</div>
			</div>
			<div class="emojione-box-emojies">
				<div v-for="(code, index) in emojione.shortCodesSort[activeTab]" v-bind:key="index">
					<span v-html="toImage(code)"></span>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { ref } from 'vue';
	import emojione from 'emojione';
	import { mapState } from "vuex";

	export default {
		name: 'EmojiBox',
		computed: {
			...mapState({
				emojione: state => state.emojione.emojione,
				isLoading: state => state.emojione.isLoading
			})
		},
		setup() {
			const activeTab = ref('activity');

			return {
				activeTab,
				toImage: value => emojione.toImage(value)
			}
		}
	}
</script>

<style scoped>
	.emojione-box {
		border-radius: 12.6897px;
		background: #2e2f4a;
		padding: 6px;
		z-index: 1020;
		height: 16.5vh;
		bottom: 35px;
		width: 21vw;
		right: -13vw;
	}

	.emojione-box-categories {
		overflow-y: hidden;
		overflow-x: auto;
		height: 42px;
	}

	.emojione-box-category-tabs {
		width: max-content;
		height: 26px;
	}
	
	.emojione-box-category-tabs > div {
		width: 32px!important;
		display: inline-block;
	}

	.emojione-box-categories::-webkit-scrollbar {
		width: 4px;
		height: 6px;
		background: #191928;
		border-radius: 20px;
	}

	.emojione-box-categories::-webkit-scrollbar-thumb {
		background: linear-gradient(180deg, #cc094d 0%, #8616cd 100%);
		border-radius: 20px;
		border: 1px solid #191928;
	}

	.emojione-box-categories > span {
		height: 24px;
		width: 24px;
	}
</style>