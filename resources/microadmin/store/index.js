import Vue from "vue";
import Vuex from "vuex";
import router from "../router"; // Vue router instance
Vue.use(Vuex);

/* ========================== State ========================== */
const state = {
    user: {
        data: {},
        // token: sessionStorage.getItem("TOKEN"),
        token: localStorage.getItem("ADMIN_TOKEN"),
    },

    /* ========================== global ========================== */
    // image_base_link: '/../public/storage/',

    /* ========================== local ========================== */
    image_base_link: "/../storage/",
};

/* ========================== Getters ========================== */
const getters = {
    admin(state) {
        return state.user;
    },
};

/* ========================== Actions ========================== */
const actions = {
    //every time this session check, for user session running or expired
    admin(context) {
        axios
            .get("/api/auth/check")
            //if session status ruining
            .then((resp) => {
                if (resp.data.status == "AUTHORIZED") {
                    context.commit("setToken", resp.data.token);
                    router.push({ name: "dashboard" });
                    return;
                }
                if (resp.data.status == "UNAUTHORIZED") {
                    context.commit("logout");
                    router.push({
                        name: "login",
                    });
                    return;
                }
            })
            //error handling
            .catch(() => {
                router.push({
                    name: "login",
                });
            });
    },

    authenticate_check(context) {
        axios
            .get("/api/authenticate/check")
            //if session status ruining
            .then((resp) => {
                if (resp.data.status == "UNAUTHORIZED") {
                    context.commit("logout");
                    router.push({
                        name: "login",
                    });
                    return;
                }
                else{
                    context.commit("setUser", resp.data.admin);
                    return;
                }
            })
            //error handling
            .catch(() => {
                router.push({
                    name: "login",
                });
            });
    },
};

/* ========================== Mutations ========================== */
const mutations = {
    setUser: (state, user) => {
        state.user.data = user;
    },

    setToken: (state, token) => {
        state.user.token = token;
        localStorage.setItem("ADMIN_TOKEN", token);
    },

    logout: (state) => {
        state.user.token = null;
        state.user.data = {};
        localStorage.removeItem("ADMIN_TOKEN");
    },
};

/* ========================== Store ========================== */
const store = new Vuex.Store({
    state: state,
    mutations: mutations,
    getters: getters,
    actions: actions,
});

global.store = store;
export default store;
