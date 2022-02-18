import {createStore} from "vuex";
import {commonModule} from "./common";
import {currentUserModule} from "./currentUserModule";
import {matchesModule} from "./matchesModule";
import {chatMessagesModule} from "./chatMessagesModule";

export default createStore({
    modules: {
        common: commonModule,
        currentUser: currentUserModule,
        matches: matchesModule,
        messages: chatMessagesModule
    }
});