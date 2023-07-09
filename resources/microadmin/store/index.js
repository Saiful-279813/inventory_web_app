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
    /* ========================== GEO ========================== */
    division_list: [],
    district_list: [],
    upazila_list: [],
    division_wise_district_list: [],
    district_wise_upazila_list: [],




};

/* ========================== Getters ========================== */
const getters = {
    admin(state) {
        return state.user;
    },
    /* ========================== GEO ========================== */
    division_list(state) {
        return state.division_list;
    },
    district_list(state) {
        return state.district_list;
    },
    upazila_list(state) {
        return state.upazila_list;
    },
    division_wise_district_list(state) {
        return state.division_wise_district_list;
    },
    district_wise_upazila_list(state) {
        return state.district_wise_upazila_list;
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

    // Division List
    divisionList(context) {
        axios
            .get("/api/division/list")
            .then((resp) => {
                if (resp.data.status == "true") {
                    context.commit("divisionList",resp.data.divisions);
                }
            })
            //error handling
            .catch((err) => {
                console.log(err);
            });
    },

    // District List
    districtList(context) {
        axios
            .get("/api/district/list")
            .then((resp) => {
                if (resp.data.status == "true") {
                    context.commit("districtList",resp.data.districts);
                }
            })
            //error handling
            .catch((err) => {
                console.log(err);
            });
    },

    // Upazila List
    upazilaList(context) {
        axios
            .get("/api/upazila/list")
            .then((resp) => {
                if (resp.data.status == "true") {
                    context.commit("upazilaList",resp.data.upazilas);
                }
            })
            //error handling
            .catch((err) => {
                console.log(err);
            });
    },

    // division wise district List
    divisionWiseDistrict(context) {
        axios
            .get("/api/division/wise/district/list/")
            .then((resp) => {
                if (resp.data.status == "true") {
                    context.commit("upazilaList",resp.data.upazilas);
                }
            })
            //error handling
            .catch((err) => {
                console.log(err);
            });
    },


};

/* ========================== Mutations ========================== */
const mutations = {
    divisionList: (state,divisionList) => {
        state.divisionList = divisionList
    },




    /* ============ Authenticate Mutation ============== */
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
