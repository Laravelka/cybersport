<template>
    <div class="main">

        <header-nav/>

        <match-list :matches="matches"/>

        <chat/>

        <mobile-nav/>
    </div>
</template>

<script>
    import HeaderNav from "../header/HeaderNav";
    import Chat from "../chat/Chat";
    import MatchList from "../match/MatchList";
    import MobileNav from "../UI/MobileNav";
    import { mapState, useStore } from "vuex";
	import { computed } from "vue";
	
    export default {
        components: {
            HeaderNav, Chat, MatchList, MobileNav
        },
        setup() {
            const store = useStore();

            store.dispatch('setLoading', true);
            store.dispatch('getMatches');
			
			return {
				matches: computed(() => {
					console.log(store.state.matches);
					
					return store.state.matches.data
				})
			}
        }
    }
</script>