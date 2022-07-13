<template>
	<div class="profile-info">
	    <div class="profile-info__title title">ИНФОРМАЦИЯ О ПРОФИЛЕ</div>
	    <div class="profile-info__user-box">
	        <a class="header-usermenu__icon" href="#">
	            <div class="header-usermenu__icongradient icon">
	                <img class="header-usermenu__iconimg" :src="user.avatar" alt="">
	            </div>
	        </a>
	        <div class="profile-info__content">
	            <div class="profile-info__content-id profile-id">#{{ user.id }}</div>
	            <a class="profile-info__content-name profile-name" href="#">{{ user.name }}
	                <span v-if="user.is_admin">
	                    <img class="profile-info__content-crown" src="images/icons/crown.png" alt="">
	                </span>
	            </a>
	            <div class="profile-info__content-subname profile-subname">{{ user.first_name ?? '' }} {{ user.last_name ?? '' }}</div>
	            <a class="profile-info__content-edit" href="#">Редактировать профиль</a>
	        </div>
	    </div>
	    <ul class="profile-info__list">
	        <li class="profile-info__list-item info-list">
	            <a class="profile-info__list-link info-link" href="#">Друзей:</a>
	            <div class="profile-info__list-num profile-info__list-num_blue">{{ user.friends?.length ?? 0 }}</div>
	        </li>
	        <li class="profile-info__list-item info-list">
	            <a class="profile-info__list-link info-link" href="#">Подписчики:</a>
	            <div class="profile-info__list-num profile-info__list-num_blue">{{ user.subscribers?.length ?? 0 }}</div>
	        </li>
	        <li class="profile-info__list-item info-list">
	            <a class="profile-info__list-link info-link" href="#">PW баллы:</a>
	            <div class="profile-info__list-num profile-info__list-num_blue">{{ user.pw_points }}</div>
	        </li>
	        <li class="profile-info__list-item info-list">
	            <a class="profile-info__list-link info-link" href="#">Побед:</a>
	            <div class="profile-info__list-num profile-info__list-num_blue">100(52%)</div>
	        </li>
	        <li class="profile-info__list-item info-list">
	            <a class="profile-info__list-link info-link" href="#">Матчей:</a>
	            <div class="profile-info__list-num profile-info__list-num_blue">120</div>
	        </li>
	        <li class="profile-info__list-item info-list">
	            <a class="profile-info__list-link info-link" href="#">Оборот:</a>
	            <div class="profile-info__list-num profile-info__list-num_blue">350,00$</div>
	        </li>
	        <li class="profile-info__list-item info-list">
	            <a class="profile-info__list-link info-link" href="#">Сумма выигрыша:</a>
	            <div class="profile-info__list-num profile-info__list-num_blue">1000$</div>
	        </li>
	    </ul>
	    <button class="profile-info__btn">Выйти</button>
	</div>
</template>

<script>
	import { mapActions, mapState } from "vuex";

	export default {
		name: 'ProfileInfo',
		computed: {
			...mapState({
				user: state => state.currentUser.user
			})
		},
		beforeCreate() {
			this.$store.dispatch('updateUser');
		}
	}
</script>