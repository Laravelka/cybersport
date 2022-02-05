import {createStore} from "vuex";
import {matchesModule} from "./matchesModule";

export default createStore({
    modules: {
        matches: matchesModule
    }
});