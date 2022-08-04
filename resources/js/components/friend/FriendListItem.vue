<template>
	<div class="friends-list__item">
		<button class="friends-list__close-btn btn-close">
			<img src="images/icons/close-friends.svg" alt="">
		</button>
		<router-link class="header-usermenu__icon" :to="{ name: 'getProfile', params: {id: friendUser.id} }">
			<div class="header-usermenu__icongradient icon">
				<img
					class="header-usermenu__iconimg"
					v-if="friendUser.avatar"
					:src="friendUser.avatar"
				>
				<img v-else class="header-usermenu__iconimg" src="/images/logo.svg" alt="no avatar">
			</div>
		</router-link>
		<div class="friends-list__item-box">
			<div class="friends-list__name-box">
				<div class="friends-list__item-id profile-id">#{{ friendUser.id }}</div>
				<a class="friends-list__item-name user-name" href="#">{{ friendUser.name }}
				</a>
				<a class="friends-list__item-online friends-online" href="#">В сети</a>
			</div>
			<div class="friends-list__btn-box">
				<button 
					v-if="(friend.is_friend || friend.is_subscriber) || isSubscriber" 
					@click="deleteFromFriend(friendUser.id)" 
					class="friends-list__item-btn friends-btn friends-list__item-btn_gray"
				>{{ friend.is_subscriber ? 'Отписаться' : 'Оставить в подписчиках' }}</button>
				<button v-else @click="addToFriend(friendUser.id)" class="friends-list__item-btn friends-btn friends-list__item-btn_purple">Добавить
					в друзья</button>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	import { computed } from 'vue';
	import { useStore } from 'vuex';
	
	export default {
		props: ['friend', 'isSubscriber'],
		setup(props, { emit }) {
			const store = useStore();
			const { user } = store.getters;
			
			const addToFriend = (id) => {
				axios.post('/api/v1/friends/', {
					user_id: id
				}).then((response) => {
					const { data } = response;
					
					emit('user-added', data);
				}).catch((error) => {
					if (error.response && error.response.data) {
						store.commit('setError', error.response.data.message);
					} else {
						store.commit('setError', error.message);
					}
					store.commit('setLoading', false);
				});
			};
			
			const deleteFromFriend = (id) => {
				axios.delete('/api/v1/friends/' + id, {
					user_id: user.id
				}).then((response) => {
					emit('user-deleted', id);
				}).catch((error) => {
					if (error.response && error.response.data) {
						store.commit('setError', error.response.data.message);
					} else {
						store.commit('setError', error.message);
					}
					store.commit('setLoading', false);
				});
			};
			
			return {
				friendUser: computed(() => {
					return props.friend.user.id == user.id ? props.friend.subscriber : props.friend.user;
				}),
				addToFriend,
				deleteFromFriend
			}
		}
	}
</script>