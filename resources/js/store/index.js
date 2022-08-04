import { createStore } from "vuex";
import { commonModule } from "./common";
import { emojione } from "./emojione";
import { currentUserModule } from "./currentUserModule";
import { matchesModule } from "./matchesModule";
import { chatMessagesModule } from "./chatMessagesModule";

export default createStore({
    modules: {
        common: commonModule,
        emojione: emojione,
        currentUser: currentUserModule,
        matches: matchesModule,
        messages: chatMessagesModule
    }
});