import {createStore} from "vuex";
import {matchesModule} from "./matchesModule";
import {chatMessagesModule} from "./chatMessagesModule";

export default createStore({
    modules: {
        matches: matchesModule,
        messages: chatMessagesModule
    }
});