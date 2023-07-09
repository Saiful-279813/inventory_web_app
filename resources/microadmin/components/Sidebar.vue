<template>
    <nav>
        <v-app-bar color="#fff" app>
            <v-row>
                <v-col xl="1" lg="1" md="1" sm="1" col="1">
                    <v-app-bar-nav-icon
                        class="theme--light"
                        @click.stop="drawer = !drawer"
                    ></v-app-bar-nav-icon>
                </v-col>

                <v-col xl="11" lg="11" md="11" sm="11" cols="11">
                    <div class="user-profile">
                        <v-menu offset-y>
                            <template v-slot:activator="{ on }">
                                <button class="dashboard_header_chip">
                                    <span class="user">{{admin.data.name}}</span>
                                </button>
                                <v-avatar
                                    color="indigo"
                                    text
                                    v-on="on"
                                    style="cursor: pointer"
                                >
                                    <img
                                        :src="
                                        image_url + 'static/profile/1.png'
                                        "
                                        alt=""
                                    />
                                </v-avatar>
                            </template>
                            <v-list flat>
                                <v-list-item
                                    router
                                    to="#"
                                    active-class="border"
                                >
                                    <v-list-item-title
                                        >Profile</v-list-item-title
                                    >
                                </v-list-item>
                                <v-list-item
                                    @click="logout()"
                                    active-class="border"
                                >
                                    <v-list-item-title
                                        >Logout</v-list-item-title
                                    >
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </div>
                </v-col>
            </v-row>
        </v-app-bar>

        <!-- ====================================== Sidebar Part Start ====================================== -->
        <v-navigation-drawer
            v-model="drawer"
            color="#2a3042"
            app
            class="darken-4 custom__sidebar"
        >
            <v-layout column align-center>
                <div class="sidebar-brand">
                    <div class="sidebar-logo">
                        <img :src="image_url + 'static/profile/1.png'" alt="" />
                    </div>
                    <div class="sidebar-name">
                        <span>Inventory</span>
                    </div>
                </div>
            </v-layout>

            <!-- Sidebar part -->
            <v-list dense>
                <v-list-item class="mb-2">
                    <router-link
                        to="/dashboard"
                        class="custom_router_link"
                    >
                        <span class="sidebar-menu-icon">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        Dashboard
                    </router-link>
                </v-list-item>



                <!-- account module -->
                <v-list-group class="mb-2">
                    <template v-slot:activator>
                        <div class="custom_dropdown_router_link custom_mb_10">
                            <span class="sidebar-menu-icon">
                                <i class="fa-solid fa-trash"></i>
                            </span>
                            Product
                        </div>
                    </template>
                    <router-link :to="{name: 'categories'}" class="custom_router_sub_link">
                        <span class="ml-3">Category</span>
                    </router-link>
                    <!-- <router-link to="#" class="custom_router_sub_link">
                        <span class="ml-3">Expense</span>
                    </router-link> -->
                </v-list-group>
                <!-- Customer -->
                <v-list-group class="mb-2">
                    <template v-slot:activator>
                        <div class="custom_dropdown_router_link custom_mb_10">
                            <span class="sidebar-menu-icon">
                                <i class="fa-solid fa-trash"></i>
                            </span>
                            Customer
                        </div>
                    </template>
                    <router-link :to="{name: 'customer_list'}" class="custom_router_sub_link">
                        <span class="ml-3">List</span>
                    </router-link>
                </v-list-group>
                <!-- account module -->

                <!-- brand -->
                <!-- <v-list-item class="mb-2">
                    <router-link to="#" class="custom_router_link">
                        <span class="sidebar-menu-icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        Brand
                    </router-link>
                </v-list-item> -->
            </v-list>
            <!-- Sidebar part -->
        </v-navigation-drawer>
        <!-- ====================================== Sidebar Part End ====================================== -->
    </nav>
</template>
<script>
export default {
    created() {
        this.$store.dispatch("authenticate_check");
    },

    data() {
        return {
            drawer: true,
            image_url: this.$store.state.image_base_link,
        };
    },
    /* ========================== Methods ========================== */
    methods: {
        logout() {
            axios
                .get("/api/logout")
                .then((resp) => {
                    if (resp.data.status == true) {
                        this.$store.dispatch("admin");
                        this.$toasted.show(
                            "Logout successfully ! you are back soon .",
                            {
                                type: "error",
                                position: "top-center",
                                duration: 10000,
                            }
                        );
                    }
                })
                .catch(() => {
                    this.$toasted.show("some thing want to wrong", {
                        type: "error",
                        position: "top-center",
                        duration: 4000,
                    });
                });
        },
    },

    /* ========================== Computed ========================== */
    computed: {
        admin(){
            return this.$store.getters.admin;
        }
    }

};
</script>
<style scoped>
.border {
    border-left: 4px solid #0ba518;
}

.v-application--is-ltr .v-list-item__action:first-child,
.v-application--is-ltr .v-list-item__icon:first-child {
    margin-right: 10px;
}

.v-list-group__items {
    margin-left: 5px !important;
}
</style>
