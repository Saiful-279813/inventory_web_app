<template lang="">
    <div>
        <!-- ============= Section All Form Area Start =============== -->
        <section class="">
            <div class="form-area">
                <div class="section-container">
                    <v-row>
                        <v-col lg="12" xl="12" md="12">
                            <v-row class="align-items-center">
                                <v-col cols="6">
                                    <div class="form-top-title">
                                        <h3>
                                            <i class="fa-solid fa-globe"></i>
                                            Create Customer
                                        </h3>
                                    </div>
                                </v-col>

                                <v-col cols="6">
                                    <div
                                        class="d-flex justify-end align-items-center mt-2"
                                    >
                                        <router-link
                                            :to="{
                                                name: 'customer_list',
                                            }"
                                        >
                                            <button class="create__button">
                                                <i
                                                    class="fa-solid fa-list fa-fade mr-1"
                                                ></i>
                                                Customer List
                                            </button>
                                        </router-link>
                                    </div>
                                </v-col>
                            </v-row>
                            <!-- end Heading -->

                            <!-- Body -->
                            <v-progress-linear
                                indeterminate
                                color="cyan"
                                v-if="loading"
                            ></v-progress-linear>
                            <form
                                @submit.prevent="store()"
                                @keydown="form.onKeydown($event)"
                                enctype="multipart/form-data"
                                v-else
                            >
                                <div class="form-body">
                                    <v-row class="justify-center">
                                        <v-col md="12" cols="12">
                                            <div class="custom__card">
                                                <div class="custom__card_body">
                                                    <v-row
                                                        class="form_custom_row"
                                                    >
                                                        <v-col cols="12" sm="12" md="6" lg="6" class="custom_padding_control">
                                                            <div class="">
                                                                <label for=""
                                                                    >English Name
                                                                    <span
                                                                        class="req_star"
                                                                        >*</span
                                                                    ></label
                                                                >
                                                                <v-text-field
                                                                    outlined
                                                                    dense
                                                                    required
                                                                    v-model="
                                                                        form.name_en
                                                                    "
                                                                    type="text"
                                                                ></v-text-field>
                                                                <has-error
                                                                    :form="form"
                                                                    field="name_en"
                                                                ></has-error>
                                                            </div>
                                                        </v-col>

                                                        <v-col cols="12" sm="12" md="6" lg="6" class="custom_padding_control">
                                                            <div class="">
                                                                <label for=""
                                                                    >Bangla Name
                                                                    <span
                                                                        class="req_star"
                                                                        >*</span
                                                                    ></label
                                                                >
                                                                <v-text-field
                                                                    outlined
                                                                    dense
                                                                    required
                                                                    v-model="
                                                                        form.name_bn
                                                                    "
                                                                    type="text"
                                                                ></v-text-field>
                                                                <has-error
                                                                    :form="form"
                                                                    field="name_bn"
                                                                ></has-error>
                                                            </div>
                                                        </v-col>
                                                        <v-col cols="12" sm="12" md="6" lg="6" class="custom_padding_control">
                                                            <div class="">
                                                                <label for=""
                                                                    >Father English Name (Optional)
                                                                    <span
                                                                        class="req_star"
                                                                        >*</span
                                                                    ></label
                                                                >
                                                                <v-text-field
                                                                    outlined
                                                                    dense
                                                                    required
                                                                    v-model="
                                                                        form.father_name_en
                                                                    "
                                                                    type="text"
                                                                ></v-text-field>
                                                                <has-error
                                                                    :form="form"
                                                                    field="father_name_en"
                                                                ></has-error>
                                                            </div>
                                                        </v-col>
                                                        <v-col cols="12" sm="12" md="6" lg="6" class="custom_padding_control">
                                                            <div class="">
                                                                <label for=""
                                                                    >Father Bangla Name (Optional)
                                                                    <span
                                                                        class="req_star"
                                                                        >*</span
                                                                    ></label
                                                                >
                                                                <v-text-field
                                                                    outlined
                                                                    dense
                                                                    required
                                                                    v-model="
                                                                        form.father_name_en
                                                                    "
                                                                    type="text"
                                                                ></v-text-field>
                                                                <has-error
                                                                    :form="form"
                                                                    field="father_name_en"
                                                                ></has-error>
                                                            </div>
                                                        </v-col>





                                                        <v-col
                                                            cols="12"
                                                            lg="12"
                                                        >

                                                            <div class="mb-2">
                                                                <label for=""
                                                                    >Image
                                                                    <span
                                                                        class="req_star"
                                                                        >*</span
                                                                    ></label
                                                                >
                                                                <div
                                                                    class="image_box_wrapper"
                                                                >
                                                                    <v-text-field
                                                                        label="Select Image"
                                                                        @click="
                                                                            pickFile
                                                                        "
                                                                        v-model="
                                                                            form.imageName
                                                                        "
                                                                        dense
                                                                        outlined
                                                                        prepend-icon="mdi-file-image"
                                                                    ></v-text-field>
                                                                    <input
                                                                        type="file"
                                                                        style="
                                                                            display: none;
                                                                        "
                                                                        ref="image"
                                                                        accept="image/jpeg, image/jpg, image/png"
                                                                        @change="
                                                                            onFilePicked
                                                                        "
                                                                    />
                                                                    <br />
                                                                    <img
                                                                        :src="
                                                                            form.imageUrl
                                                                        "
                                                                        v-if="
                                                                            form.imageUrl
                                                                        "
                                                                        class="preview_image"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </v-col>
                                                    </v-row>
                                                </div>
                                            </div>
                                        </v-col>
                                    </v-row>
                                </div>

                                <div class="text-center pb-5 mt-5">
                                    <button
                                        :disabled="form.busy"
                                        type="submit"
                                        class="create__button submit_button"
                                    >
                                        <i
                                            class="fa fa-spin fa-spinner"
                                            v-if="form.busy"
                                        ></i
                                        >SAVE
                                    </button>
                                </div>
                            </form>
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
import Vue from "vue";
import Form from "vform";
import { HasError } from "vform/src/components/bootstrap5";
Vue.component(HasError.name, HasError);

export default {
    data() {
        return {
            form: new Form({
                name_en: "",
                name_bn: "",
                father_name_en: "",
                father_name_bn: "",
                phone: "",
                trade_name_en: "",
                trade_name_bn: "",
                address: "",
                customer_type_id: "",
                division_id: "",
                district_id: "",
                upazila_id: "",

                imageUrl: "",
                imageFile: null,
                imageName: "",
            }),

            base_url: this.$store.state.image_base_link,
            /* Loading Property */
            loading: true,
            // customer type
            customer_type: [
                { id: 1, name: 'Regular Customer' },
                { id: 2, name: 'Normal Customer' },
            ],
            division_list: [],
            district_list: [],
            upazila_list: [],
        };
    },

    methods: {
        store() {
            this.form
                .post("/api/inventory/employees")
                .then((resp) => {
                    console.log(resp);
                    if (resp.data.status == true) {
                        this.$toasted.show(resp.data.message, {
                            type: "success",
                            position: "top-center",
                            duration: 4000,
                        });
                        this.$router.push({ name: "int_employee_list" });
                    }
                })
                .catch((error) => {
                    console.log(error);
                    this.error = error;
                });
        },

        /* Division */
        getDivision() {
            axios
                .get("/api/division/list")
                .then((resp) => {
                    console.log(resp);
                    if (resp.data.status == true) {
                        this.division_list = resp.data.divisions;
                    }
                })
                .catch((error) => {
                    this.$toastr.e(error.response.data.message);
                });
        },

        /* District */
        getDistrict() {
            axios
                .get("/api/division/wise/district/list/" + this.form.division_id)
                .then((resp) => {
                    console.log(resp);
                    if (resp.data.status == true) {
                        this.district_list = resp.data.districts;
                    }
                })
                .catch((error) => {
                    this.$toastr.e(error.response.data.message);
                });
        },

        /* Upazila */
        getUpazila() {
            axios
                .get("/api/district/wise/upazila/list/" + this.form.district_id)
                .then((resp) => {
                    console.log(resp);
                    if (resp.data.status == true) {
                        this.upazila_list = resp.data.upazilas;
                    }
                })
                .catch((error) => {
                    this.$toastr.e(error.response.data.message);
                });
        },

        /* Image Upload */
        pickFile() {
            this.$refs.image.click();
        },

        onFilePicked(e) {
            const files = e.target.files;
            if (files[0] !== undefined) {
                this.form.imageName = files[0].name;
                if (this.form.imageName.lastIndexOf(".") <= 0) {
                    return;
                }
                const fr = new FileReader();
                fr.readAsDataURL(files[0]);
                fr.addEventListener("load", () => {
                    this.form.imageUrl = fr.result;
                    this.form.imageFile = files[0];
                });
            } else {
                this.form.imageName = "";
                this.form.imageFile = "";
                this.form.imageUrl = "";
            }
        },
        /* Image Upload */
    },

    created() {
        this.getDivision();
        setTimeout(() => {
            this.loading = false;
        }, 500);
    },
};
</script>
<style lang="scss" scoped>
input.p_img_upload_field {
    display: none;
}

img.plus_img {
    width: 100px;
}

.v_check {
    display: inline-block;
    margin: 0px 10px 5px;
    padding: 3px;
}
</style>
