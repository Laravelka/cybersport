import {createStore} from "vuex";
import {currentUserModule} from "./currentUserModule";
import {matchesModule} from "./matchesModule";
import {chatMessagesModule} from "./chatMessagesModule";

export default createStore({
    modules: {
        currentUser: currentUserModule,
        matches: matchesModule,
        messages: chatMessagesModule
    }
});