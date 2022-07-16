<template>
	<transition name="fade">
		<div class="toast-container" :class="placementRef">
			<div class="toast" :class="{open: isOpenRef, [color]: true}">
				<div class="left-container">
					<slot name="icon">
						<Icon :color="iconColor" :size="iconSize">
							<BugOutline v-if="colorRef === 'warning'"></BugOutline>
							<AlertCircleOutline v-else-if="colorRef === 'danger'"></AlertCircleOutline>
							<InformationCircleOutline v-else-if="colorRef === 'primary'"></InformationCircleOutline>
							<CheckmarkOutline v-else></CheckmarkOutline>
						</Icon>
					</slot>
				</div>
				<div class="center-container">
					<h2 v-if="titleRef" v-html="titleRef" :class="{colorized: isColorizedTitleRef}"></h2>
					<div v-else-if="$slots.title">
						<slot name="title"></slot>
					</div>
					<p v-if="bodyRef" v-html="bodyRef"></p>
					<div v-else-if="$slots.body">
						<slot name="body"></slot>
					</div>
				</div>
				<div class="right-container">
					<button @click="closeToast">&times;</button>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>
import {
	BugOutline,
	CloseOutline,
	AlertOutline,
	CheckmarkOutline,
	AlertCircleOutline,
	InformationCircleOutline,
} from '@vicons/ionicons5';
import { Icon } from '@vicons/utils';
import { defineComponent, watch, ref, toRef } from 'vue';

export default defineComponent({
	name: 'Toast',
	props: {
		colorizedTitle: {
			type: [Boolean],
			default: true,
			required: false
		},
		placement: {
			type: [String],
			default: 'top-left',
			required: true
		},
		isOpen: {
			type: [Boolean],
			required: true
		},
		title: {
			type: [String],
			default: 'Произошла ошибка!',
			required: false
		},
		color: {
			type: [String],
			required: true
		},
		body: {
			type: [String],
			default: null,
			required: false
		},
		isSpin: {
			type: [Boolean],
			default: false
		},
		iconSize: {
			type: [String],
			default: '25px',
			required: false
		}
	},
	components: {
		Icon,
		BugOutline,
		CheckmarkOutline,
		AlertCircleOutline,
		InformationCircleOutline
	},
	setup(props, { emit }) {
		const isOpenRef = ref(props.isOpen);
		const isSpinRef = toRef(props, 'isSpin');
		const isColorizedTitleRef = toRef(props, 'colorizedTitle');

		const colorRef = toRef(props, 'color');
		const placementRef = toRef(props, 'placement');

		const bodyRef = toRef(props, 'body');
		const titleRef = toRef(props, 'title');

		watch(() => props.isOpen, (first) => {
			isOpenRef.value = first;

			console.log(bodyRef.value, titleRef.value);
		});

		return {
			bodyRef,
			colorRef,
			titleRef,
			isSpinRef,
			isOpenRef,
			closeToast: (event) => {
				isOpenRef.value = false;
				emit('closeToast', event);
			},
			iconColor: (
				colorRef.value === 'danger' ? '#eb445a' : (
					colorRef.value === 'warning' ? '#ffc409' : (
						colorRef.value === 'primary' ? '#3880ff' : '#2dd36f'
					)
				)
			),
			placementRef,
			isColorizedTitleRef,

		};
	},
});
</script>
<style scoped>
.toast-container {
	left: 0;
	top: 55px;
	width: 100%;
	z-index: 1030;
	display: flex;
	position: fixed;
	pointer-events: none;
	justify-content: left;
	height: calc(100vh - 96px);
}

.ios .toast-container {
	top: 95px!important;
}

@media (max-width: 992px) {
	.toast-container {
		top: 55px!important;
	}
}

.toast-container.top-left {
	justify-content: left;
	align-items: start;
}
.toast-container.top-left .toast {
	opacity: 0;
	transform: scale(0) translateX(-400px);
}

.toast-container.top-center {
	justify-content: center;
	align-items: start;
}
.toast-container.top-center .toast {
	opacity: 0;
	transform: scale(0) translateY(-150px);
}

.toast-container.top-right {
	justify-content: right;
	align-items: start;
}
.toast-container.top-right .toast {
	opacity: 0;
	transform: scale(0) translateX(400px);
}

.toast-container.middle-left {
	justify-content: left;
	align-items: center;
}
.toast-container.middle-left .toast {
	opacity: 0;
	transform: scale(0) translateX(-400px);
}

.toast-container.middle-right {
	justify-content: right;
	align-items: center;
}
.toast-container.middle-right .toast {
	opacity: 0;
	transform: scale(0) translateX(400px);
}

.toast-container.middle-center {
	justify-content: center;
	align-items: center;
}
.toast-container.middle-center .toast {
	opacity: 0;
	transform: scale(0);
}

.toast-container.bottom-left {
	justify-content: left;
	align-items: end;
}
.toast-container.bottom-right {
	justify-content: right;
	align-items: end;
}
.toast-container.bottom-center {
	justify-content: center;
	align-items: end;
}

.toast-container.bottom-left .toast {
	opacity: 0;
	transform: scale(0) translateX(-400px);
}

.toast-container.bottom-right .toast {
	opacity: 0;
	transform: scale(0) translateX(400px);
}

.toast-container.bottom-center .toast {
	opacity: 0;
	transform: scale(0) translateY(150px);
}

.toast {
	margin: 10px;
	width: 380px;
	height: 80px;
	display: flex;
	color: #666;
	border-radius: .5rem;
	pointer-events: all;
	backdrop-filter: blur(5px);
	justify-content: space-between;
	background-color: rgb(33 33 54 / 60%);
	grid-template-columns: 1.3fr 6fr 0.5fr;
	box-shadow: 0 15px 30px rgba(0,0,0,0.08);
	transition: all .5s cubic-bezier(.155, 1.105, .295, 1.12) 0s;
	box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
}

body.dark .toast {
	color: #aaa;
	box-shadow: 0 6px 10px rgba(0,0,0,.15), 0 0 6px rgba(0,0,0,.15);
}

body.dark .ios .toast {
	border: 1px solid rgb(255 255 255 / 10%)
}

.toast.open {
	opacity: 1!important;
	transform: scale(1) translateX(0) translateY(0)!important;
	/*animation: vibrate-1 0.3s linear infinite both;*/
}

.toast.success {
	border-left: 8px solid var(--app-color-success, #2dd36f);
}
.toast.danger {
	border-left: 8px solid var(--app-color-danger, #eb445a);
}
.toast.primary {
	border-left: 8px solid var(--app-color-primary, #3880ff);
}
.toast.warning {
	border-left: 8px solid var(--app-color-warning, #ffc409);
}

body.dark .toast.primary {
	border-left: 8px solid var(--app-color-primary, #3880ff);
}
body.dark .toast.danger {
	border-left: 8px solid var(--app-color-danger, #eb445a);
}
body.dark .toast.warning {
	border-left: 8px solid var(--app-color-warning, #ffc409);
}
body.dark .toast.success {
	border-left: 8px solid var(--app-color-success, #2dd36f);
}
/*body.dark .toast {
	background: #808080;
}*/

.toast-container.bl-0 .toast {
	border-left: 0px!important;
}

.toast-container.vibrate .left-container .xicon {
	animation: vibrate-1 0.3s linear infinite both;
}

.toast button {
	align-self: flex-start;
	background-color: transparent;
	font-size: 25px;
	color: #656565;
	line-height: 0;
	cursor: pointer;
	border: 0;
}

.toast:not(:last-child){
	margin-bottom: 50px;
}

.toast .left-container,.right-container {
	align-self: center;
}

.toast .center-container h2 {
	color: #282b2e;
	font-weight: 600;
	font-size: 16px;
	margin-top: 8px!important;
}

body.dark .toast .center-container h2 {
	color: #6c757d;
}

.toast.success .center-container h2.colorized {
	color: var(--app-color-success, #2dd36f);
}

.toast.danger .center-container h2.colorized {
	color: var(--app-color-danger, #eb445a);
}

.toast.primary .center-container h2.colorized {
	color: var(--app-color-primary, #3880ff);
}

.toast.warning .center-container h2.colorized {
	color: var(--app-color-warning, #ffc409);
}

.toast .center-container p {
	font-size: 12px;
	font-weight: 400;
	color: #c5c5c5;
	padding: 4px 0;
}

.left-container {
	width: 100px;
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
}

.center-container {
	width: 100%;
	height: 100%;
	height: 100%;
	/*display: flex;
	align-items: center;*/
}

.right-container {
	width: 25px;
	height: 100%;
	align-items: center;
	display: flex;
	justify-content: center;
	padding: 12px;
}

/* vibrate animation
@-webkit-keyframes vibrate-1 {
	0% {
		-webkit-transform: translate(0);
				transform: translate(0);
	}
	20% {
		-webkit-transform: translate(-2px, 2px);
				transform: translate(-2px, 2px);
	}
	40% {
		-webkit-transform: translate(-2px, -2px);
				transform: translate(-2px, -2px);
	}
	60% {
		-webkit-transform: translate(2px, 2px);
				transform: translate(2px, 2px);
	}
	80% {
		-webkit-transform: translate(2px, -2px);
				transform: translate(2px, -2px);
	}
	100% {
		-webkit-transform: translate(0);
				transform: translate(0);
	}
}
*/

@keyframes vibrate-1 {
	0% {
		-webkit-transform: translate(0);
		transform: translate(0);
	}
	20% {
		-webkit-transform: translate(-1px, 1px);
		transform: translate(-1px, 1px);
	}
	40% {
		-webkit-transform: translate(-1px, -1px);
		transform: translate(-1px, -1px);
	}
	60% {
		-webkit-transform: translate(1px, 1px);
		transform: translate(1px, 1px);
	}
	80% {
		-webkit-transform: translate(1px, -1px);
		transform: translate(1px, -1px);
	}
	100% {
		-webkit-transform: translate(0);
		transform: translate(0);
	}
}
</style>
