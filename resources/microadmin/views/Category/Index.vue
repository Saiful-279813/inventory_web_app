<template lang="">
    <div>
        <!-- ============= Section All Form Area Start =============== -->
        <section class="">
            <div class="form-area">
                <div class="section-container">
                    <v-row>
                        <v-col lg="12" xl="12" md="12">
                            <v-row class="align-items-center">
                                <v-col cols="6" md="6" lg="6">
                                    <div class="form-top-title">
                                        <h3>
                                            <i class="fa-solid fa-globe"></i>
                                            Category
                                        </h3>
                                    </div>
                                </v-col>

                                <v-col cols="6" md="6" lg="6" class="">
                                    <div
                                        class="d-flex justify-end align-items-center mt-2"
                                    >
                                        <a @click="openCreateDialog()">
                                            <button class="create__button">
                                                <i class="fa-solid fa-plus"></i>
                                                Create Item
                                            </button>
                                        </a>
                                    </div>
                                </v-col>
                            </v-row>
                            <!-- end Heading -->

                            <!-- Body -->

                            <v-row class="justify-center">
                                <v-col cols="8">
                                    <div class="table-responsive">
                                        <div class="form-body">
                                            <v-row class="justify-end mb-2">
                                                <v-col cols="12" md="4" lg="4">
                                                    <v-text-field
                                                        outlined
                                                        dense
                                                        placeholder="Search..."
                                                        type="text"
                                                        v-model="search"
                                                    ></v-text-field>
                                                </v-col>
                                            </v-row>

                                            <v-data-table
                                                :loading="isLoading"
                                                loading-text="Loading... Please wait"
                                                :headers="headers"
                                                :items="items"
                                                :search="search"
                                                :items-per-page="15"
                                            >
                                                <template
                                                    v-slot:item.sn="{ index }"
                                                >
                                                    {{ index + 1 }}
                                                </template>

                                                <template
                                                    v-slot:item.actions="{
                                                        item,
                                                    }"
                                                >
                                                    <div
                                                        class="d-flex justify-center"
                                                    >
                                                        <span
                                                            class="form-edit-icon bg-success mr-1 ml-1"
                                                            @click="
                                                                editItem(
                                                                    item.id
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fa-solid fa-pen-to-square"
                                                            ></i>
                                                        </span>

                                                        <span
                                                            @click="
                                                                activeInactive(
                                                                    item
                                                                )
                                                            "
                                                            v-if="
                                                                item.status ==
                                                                'inactive'
                                                            "
                                                            class="form-edit-icon bg-primary mr-1 ml-1"
                                                            title="delete"
                                                        >
                                                            <i
                                                                class="fa-solid fa-check"
                                                            ></i>
                                                        </span>

                                                        <span
                                                            @click="
                                                                activeInactive(
                                                                    item
                                                                )
                                                            "
                                                            v-if="
                                                                item.status ==
                                                                'active'
                                                            "
                                                            class="form-edit-icon bg-danger mr-1 ml-1"
                                                            title="delete"
                                                        >
                                                            <i
                                                                class="fa-solid fa-xmark"
                                                            ></i>
                                                        </span>
                                                    </div>
                                                </template>
                                            </v-data-table>
                                        </div>
                                    </div>
                                </v-col>
                            </v-row>
                            <!-- Store & Update -->
                            <v-dialog
                                v-model="create_dialog"
                                persistent
                                max-width="700px"
                            >
                                <v-card class="pt-3 pb-5 pr-3 pl-3">
                                    <v-card-title>
                                        <span class="text-h5"
                                            >{{
                                                item_id == ""
                                                    ? "Create"
                                                    : "Edit"
                                            }}
                                            Category</span
                                        >
                                    </v-card-title>
                                    <form
                                        @submit.prevent="storeUpdate()"
                                        @keydown="form.onKeydown($event)"
                                        enctype="multipart/form-data"
                                        ref="create_dialog"
                                    >
                                        <v-card-text
                                            class="custom_popup_card mb-3"
                                        >
                                            <v-container
                                                class="custom_popup_container"
                                            >
                                                <v-row>
                                                    <v-col cols="12">
                                                        <label
                                                            class="popup_label"
                                                            >Name English
                                                            <span
                                                                class="req_star"
                                                                >*</span
                                                            ></label
                                                        >
                                                        <v-text-field
                                                            v-model="form.name_en"
                                                            dense
                                                            outlined
                                                            required
                                                            placeholder="Name English"
                                                        ></v-text-field>
                                                        <has-error
                                                            :form="form"
                                                            field="name_en"
                                                        ></has-error>
                                                    </v-col>

                                                    <v-col cols="12">
                                                        <label
                                                            class="popup_label"
                                                            >Name Bangla
                                                            <span
                                                                class="req_star"
                                                                >*</span
                                                            ></label
                                                        >
                                                        <v-text-field
                                                            v-model="form.name_bn"
                                                            dense
                                                            outlined
                                                            required
                                                            placeholder="Name Bangla"
                                                        ></v-text-field>
                                                        <has-error
                                                            :form="form"
                                                            field="name_bn"
                                                        ></has-error>
                                                    </v-col>
                                                </v-row>
                                            </v-container>
                                        </v-card-text>
                                        <v-card-actions class="justify-center">
                                            <v-btn
                                                color="blue darken-1"
                                                text
                                                @click="create_dialog = false"
                                            >
                                                Close
                                            </v-btn>
                                            <button
                                                class="create__button ml-2"
                                                type="submit"
                                            >
                                                <v-progress-circular
                                                    v-if="isLoading"
                                                    indeterminate
                                                    color="primary"
                                                    style="
                                                        width: 20px;
                                                        height: 20px;
                                                        margin-right: 10px;
                                                    "
                                                ></v-progress-circular
                                                >Save
                                            </button>
                                        </v-card-actions>
                                    </form>
                                </v-card>
                            </v-dialog>
                            <!-- Store & Update -->
                        </v-col>
                    </v-row>
                </div>
            </div>
        </section>
        <!-- ============= Section All Form Area End =============== -->
    </div>
</template>
<!-- script -->
<script>
import Form from "vform";
import { HasError } from "vform/src/components/bootstrap5";
import axios from "axios";
Vue.component(HasError.name, HasError);
export default {
    data() {
        return {
            create_dialog: false,
            isLoading: false,
            items: [],
            /* Store Data */
            form: new Form({
                name_en: "",
                name_bn: "",
            }),
            item_id: "",
            search: "",
            // header
            headers: [
                { text: "SL No", value: "sn" },
                { text: "Name En", value: "name_en" },
                { text: "Name Bn", value: "name_bn" },
                { text: "Status", value: "status" },
                { text: "Actions", value: "actions", width: "10%" },
            ],
        };
    },

    /* methods */
    methods: {
        openCreateDialog() {
            this.item_id = "";
            this.form.name_en = "";
            this.form.name_bn = "";
            this.create_dialog = true;
        },

        // active inactive
        activeInactive(item) {
            let status = item.status == "active" ? "Inactive" : "Active";
            if (confirm("Are you sure! you want to " + status)) {
                axios
                    .get("/api/category/active-inactive/" + item.id)
                    .then((resp) => {
                        if (resp.data.status == true) {
                            this.getItems();
                            this.$toasted.show(resp.data.message, {
                                type: "success",
                                position: "top-center",
                                duration: 4000,
                            });
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        },

        /* edit */
        editItem(item_id) {
            axios
                .get("/api/categories/" + item_id)
                .then((resp) => {
                    if (resp.data.status == true) {
                        let data = resp.data.item;
                        this.form.name_en = data.name_en;
                        this.form.name_bn = data.name_bn;
                        this.item_id = data.id;
                        this.create_dialog = true;
                    }
                })
                .catch((error) => {
                    console.log(error);
                    this.$toasted.show(error, {
                        type: "error",
                        position: "top-center",
                        duration: 4000,
                    });
                });
        },

        /* Store & Update */
        storeUpdate() {
            // updated Method
            if (this.item_id) {
                this.form
                    .put("/api/categories/" + this.item_id)
                    .then((resp) => {
                        console.log(resp);
                        if (resp.data.status == true) {
                            this.$toasted.show(resp.data.message, {
                                type: "success",
                                position: "top-center",
                                duration: 4000,
                            });
                            this.create_dialog = false;
                            this.getItems();
                            this.$refs.create_dialog.reset();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                        this.error = error;
                    });
            }
            // Store Method
            else {
                this.form
                    .post("/api/categories")
                    .then((resp) => {
                        console.log(resp);
                        if (resp.data.status == true) {
                            this.$toasted.show(resp.data.message, {
                                type: "success",
                                position: "top-center",
                                duration: 4000,
                            });
                            this.create_dialog = false;
                            this.getItems();
                            this.$refs.create_dialog.reset();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                        this.error = error;
                    });
            }
        },

        async getItems() {
            this.isLoading = true;
            await axios
                .get("/api/categories")
                .then((resp) => {
                    if (resp.data.status == true) {
                        this.items = resp.data.items;
                        this.isLoading = false;
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },

    mounted() {
        this.getItems();
    },
};
</script>
<style lang=""></style>
