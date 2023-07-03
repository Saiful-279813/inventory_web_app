<template>
    <div>
        <section>
            <div class="auth-area">
                <v-container>
                    <v-row
                        style="
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                        "
                    >
                        <v-col cols="12" lg="5" xl="5" md="6">
                            <v-card class="card auth-card">
                                <div class="auth-head">
                                    <v-row>
                                        <v-col
                                            cols="7"
                                            class="auth-phone-width-text"
                                        >
                                            <div
                                                color="blue-darken-3"
                                                class="py-6 px-6"
                                            >
                                                <h5
                                                    class="auth-main-title text-primary"
                                                >
                                                    Welcome Back !
                                                </h5>
                                                <p class="auth-pra">
                                                    Sign in to continue to MIT.
                                                </p>
                                            </div>
                                        </v-col>
                                        <v-col
                                            cols="5"
                                            class="align-self-end auth-phone-width-img"
                                        >
                                            <img
                                                :src="
                                                image_url +
                                                    'profile/1.png'
                                                "
                                                alt=""
                                                class="img-fluid"
                                            />
                                        </v-col>
                                    </v-row>
                                </div>
                                <div class="card-body py-6 px-6">
                                    <div class="auth-logo">
                                        <a href="index.html">
                                            <img
                                                :src="
                                                image_url +
                                                    'images/user.png'
                                                "
                                                alt=""
                                            />
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <form
                                            @submit.prevent="login"
                                            @keydown="form.onKeydown($event)"
                                        >
                                            <div
                                                class="form-group-content mb-3"
                                            >
                                                <label class="form-group-label"
                                                    >Phone</label
                                                >
                                                <input
                                                    class="form-group-input"
                                                    type="text"
                                                    v-model="form.phone"
                                                    placeholder="Enter Phone Number"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="phone"
                                                ></has-error>
                                            </div>

                                            <div class="form-group-content">
                                                <label class="form-group-label"
                                                    >Password</label
                                                >
                                                <input
                                                    class="form-group-input"
                                                    type="password"
                                                    v-model="form.password"
                                                    placeholder="********"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="password"
                                                ></has-error>
                                            </div>

                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="remember-check"
                                                />
                                                <label
                                                    class="form-check-label"
                                                    for="remember-check"
                                                >
                                                    Remember me
                                                </label>
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button
                                                    class="login__button"
                                                    type="submit"
                                                >
                                                    <v-progress-circular
                                                        v-if="loading"
                                                        indeterminate
                                                        color="primary"
                                                        style="
                                                            width: 20px;
                                                            height: 20px;
                                                            margin-right: 10px;
                                                        "
                                                    ></v-progress-circular
                                                    >Log In
                                                </button>
                                            </div>

                                            <!-- <div class="mt-4 text-center">
                                                <a
                                                    href="#"
                                                    class="auth-forget-password"
                                                    ><i
                                                        class="fa-solid fa-lock"
                                                    ></i>
                                                    Forgot your password?</a
                                                >
                                            </div> -->
                                        </form>
                                    </div>
                                </div>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </div>
        </section>
    </div>
</template>

<script>
import Form from "vform";
import { HasError } from "vform/src/components/bootstrap5";
Vue.component(HasError.name, HasError);

export default {
    data() {
        return {
            image_url: this.$store.state.image_base_link,
            valid: true,
            form: new Form({
                phone: "",
                password: "",
            }),
            loading: false,
        };
    },

    methods: {
        login() {
            this.loading = true;
            this.form
                .post("/api/login")
                .then((resp) => {
                    if (resp.data.status == true) {
                        this.$store.dispatch("admin");
                        this.$toasted.show(resp.data.message, {
                            type: "success",
                            position: "top-right",
                            duration: 2000,
                        });
                        this.loading = false;
                    } else {
                        this.$toasted.show(
                            "Your given credential don not match our records",
                            {
                                type: "error",
                                position: "top-right",
                                duration: 2000,
                            }
                        );
                        this.loading = false;
                    }
                })
                .catch((error) => {
                    console.log(error);
                    this.$toasted.show(error, {
                        type: "error",
                        position: "top-right",
                        duration: 2000,
                    });
                    this.loading = false;
                });
        },
    },
};
</script>
<style scoped>
.v-card {
    padding: 30px !important;
}

.invalid-feedback.d-block {
    display: block;
    text-align: left;
    font-size: 13px;
    color: red;
    font-weight: 500;
    font-style: italic;
    margin-left: 5px;
}
</style>
