<template>
    <div class="feed-bottom__box">
        <router-link class="feed-bottom__icon me-1 ms-0"
            :to="{ name: 'getProfile', params: {id: comment.user.id} }">
            <div class="feed-bottom__icongradient icon">
                <img class="feed-bottom__iconimg" v-if="comment.user.avatar !== null"
                    :src="comment.user.avatar" alt="">
                <img class="feed-bottom__iconimg" v-else src="/images/logo.svg" alt="no avatar">
            </div>
        </router-link>
        <div class="feed-bottom__box-name">
            <div class="feed-bottom__user-name">{{ comment.user.name }}, 13 игр</div>
            <div class="feed-bottom__user-time mt-1">{{ comment.created_at }}</div>
        </div>
    </div>
    <div class="feed-bottom__comment" v-html="comment.content" />
    <img class="feed-bottom__img" v-if="comment.img !== null" :src="comment.img" alt="">
</template>

<script>
    export default {
        name: 'CommentItem',
        props: [
            'comment'
        ]
    }
</script>
