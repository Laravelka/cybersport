<template>
	<div class="main-profile">

		<header-nav/>

		<div class="friends">
			<div class="container-lg">
				<div class="friends__inner">
					<profile-info />

					<div class="friends-content">
						<div class="friends-list">
							<div class="friends-list__title title">Друзья</div>
							<div class="text-center w-100 p-3" v-if="friends.length === 0">Пока что пусто</div>
							<template v-else>
								<div class="friends-list__items">
									<friend-list-item v-for="(friend, index) in friends" v-bind:key="index" :friend="friend" />
								</div>
								<button class="friends-list__btn friends-yet" v-if="friends.length > 10">еще 10</button>
								<div class="friends-list__arrows-box">
									<button class="friends-list__arrow-btn">
										<img src="images/icons/arrow-left.svg" alt="">
									</button>
									<button class="friends-list__arrow-btn">
										<img src="images/icons/arrow-right.svg" alt="">
									</button>
								</div>
								<ul class="friends-list__dots-list">
									<li class="friends-list__dots-item">
										<button class="friends-list__dots-btn"></button>
									</li>
									<li class="friends-list__dots-item friends-list__dots-item_active">
										<button class="friends-list__dots-btn"></button>
									</li>
									<li class="friends-list__dots-item">
										<button class="friends-list__dots-btn"></button>
									</li>
									<li class="friends-list__dots-item">
										<button class="friends-list__dots-btn"></button>
									</li>
								</ul>
							</template>
						</div>

						<div class="friends-list">
							<div class="friends-list__title title">Заявки в друзья</div>
							<div class="text-center w-100 p-3" v-if="invites.length === 0">Пока что пусто</div>
							<template v-else>
								<div class="friends-list__items">
									<friend-list-item v-for="(friend, index) in invites" v-bind:key="index" :friend="friend" />
								</div>
								<button class="friends-list__btn friends-yet" v-if="invites.length > 10">еще 10</button>
								<div class="friends-list__arrows-box">
									<button class="friends-list__arrow-btn">
										<img src="images/icons/arrow-left.svg" alt="">
									</button>
									<button class="friends-list__arrow-btn">
										<img src="images/icons/arrow-right.svg" alt="">
									</button>
								</div>
								<ul class="friends-list__dots-list">
									<li class="friends-list__dots-item">
										<button class="friends-list__dots-btn"></button>
									</li>
									<li class="friends-list__dots-item friends-list__dots-item_active">
										<button class="friends-list__dots-btn"></button>
									</li>
									<li class="friends-list__dots-item">
										<button class="friends-list__dots-btn"></button>
									</li>
									<li class="friends-list__dots-item">
										<button class="friends-list__dots-btn"></button>
									</li>
								</ul>
							</template>
						</div>

						<div class="friends-list">
							<div class="friends-list__title title">Подписчики</div>
							<div class="text-light text-center w-100 p-3" v-if="subscribers.length === 0">Пока что пусто</div>
							<div v-else>
								<div class="friends-list__items">
									<friend-list-item v-for="(friend, index) in subscribers" v-bind:key="index" :friend="friend" />
								</div>
								<button class="friends-list__btn friends-yet" v-if="subscribers.length > 10">еще 10</button>
								<div class="friends-list__arrows-box">
									<button class="friends-list__arrow-btn">
										<img src="images/icons/arrow-left.svg" alt="">
									</button>
									<button class="friends-list__arrow-btn">
										<img src="images/icons/arrow-right.svg" alt="">
									</button>
								</div>
								<ul class="friends-list__dots-list">
									<li class="friends-list__dots-item">
										<button class="friends-list__dots-btn"></button>
									</li>
									<li class="friends-list__dots-item friends-list__dots-item_active">
										<button class="friends-list__dots-btn"></button>
									</li>
									<li class="friends-list__dots-item">
										<button class="friends-list__dots-btn"></button>
									</li>
									<li class="friends-list__dots-item">
										<button class="friends-list__dots-btn"></button>
									</li>
								</ul>
							</div>
						</div>

					</div>

					<profile-side-nav/>

				</div>
			</div>
		</div>

		<mobile-nav/>
	</div>
</template>

<script>
	import axios from "axios";
	import { ref, computed } from "vue";
	import MobileNav from "../UI/MobileNav";
	import HeaderNav from "../header/HeaderNav";
	import ProfileInfo from "../UI/ProfileInfo";
	import ProfileSideNav from "../UI/ProfileSideNav";
	import FriendListItem from "../friend/FriendListItem";
	
	import { mapActions, mapState, useStore } from "vuex";

	export default {
		components: {
			HeaderNav, MobileNav, ProfileInfo, ProfileSideNav, FriendListItem
		},
		setup() {
			const store = useStore();
			store.dispatch('updateUser');
			
			const profileRef = store.state.currentUser.user;
			
			axios.get('/api/v1/friends/getByUserId/' + profileRef.id)
			.then((response) => {
				console.log(response.data);
			}).catch((error) => {

			});
			
			return {
				friends: computed(() => {
					if (profileRef.friends) {
						return profileRef?.friends.filter((friend) => {
							return friend.is_friend;
						});
					} else {
						return [];
					}
				}),
				invites: computed(() => {
					if (profileRef.friends) {
						return profileRef?.friends.filter((friend) => {
							return !friend.is_friend && !friend.is_subscriber;
						});
					} else {
						return [];
					}
				}),
				subscribers: computed(() => {
					if (profileRef.friends) {
						return profileRef?.friends.filter((friend) => {
							return friend.is_subscriber;
						});
					} else {
						return [];
					}
				})
			};
		}
	}
</script>
