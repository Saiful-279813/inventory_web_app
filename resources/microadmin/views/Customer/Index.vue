<template lang="">
    <div>
        <!-- ============= Section All Form Area Start =============== -->
        <section class="">
            <div class="form-area">
                <div class="section-container">
                    <v-row>
                        <v-col lg="12" xl="12" md="12">
                            <v-row class="align-items-center">
                                <v-col>
                                    <div class="form-top-title">
                                        <h3>
                                            <i class="fa-solid fa-globe"></i>
                                            Customer List
                                        </h3>
                                    </div>
                                </v-col>

                                <v-col
                                >
                                    <div
                                        class="d-flex justify-end align-items-center mt-2"
                                    >
                                        <router-link
                                            :to="{
                                                name: 'customer_create',
                                            }"
                                        >
                                            <button class="create__button">
                                                <i class="fa-solid fa-plus"></i>
                                                Create Item
                                            </button>
                                        </router-link>
                                        <div class="text-center">
                                            <v-menu offset-y>
                                                <template
                                                    v-slot:activator="{
                                                        on,
                                                        attrs,
                                                    }"
                                                >
                                                    <button
                                                        class="header__list__button"
                                                        v-bind="attrs"
                                                        v-on="on"
                                                    >
                                                        <i
                                                            class="fa-solid fa-ellipsis"
                                                        ></i>
                                                    </button>
                                                </template>
                                                <v-list>
                                                    <router-link
                                                        :to="{
                                                            name: 'int_employee_create',
                                                        }"
                                                        class="table_heading__button"
                                                        >Create</router-link
                                                    >
                                                </v-list>
                                            </v-menu>
                                        </div>
                                    </div>
                                </v-col>
                            </v-row>
                            <!-- end Heading -->

                            <!-- Body -->
                            <div class="table-responsive">
                                <div class="form-body">
                                    <v-row class="mb-2 justify-content-end">
                                        <v-col
                                            cols="12"
                                            sm="12"
                                            md="12"
                                            lg="12"
                                        >
                                            <div
                                                class="d-flex align-items-center"
                                            >
                                                <v-text-field
                                                    v-model="search"
                                                    outlined
                                                    placeholder="Search by Employee"
                                                    dense
                                                    @keyup="getSearchItem()"
                                                ></v-text-field>
                                            </div>
                                        </v-col>
                                    </v-row>
                                    <v-data-table
                                        :headers="headers"
                                        :items="desserts.data"
                                        hide-default-footer
                                        :loading="isLoading"
                                        loading-text="Loading... please wait"
                                        class="elevation-1"
                                    >
                                        <template
                                            v-slot:item.basic_info="{ item }"
                                        >
                                            <section class="mt-2 mb-2">
                                                <img
                                                    v-if="item.image"
                                                    :src="base_url + item.image"
                                                    class="table-image mt-2 mb-1"
                                                />
                                                <p class="mb-1">
                                                    {{ item.name }} <br />
                                                    <span
                                                        class="btn btn-success"
                                                        >{{ item.status }}</span
                                                    >
                                                </p>
                                            </section>
                                        </template>

                                        <template
                                            v-slot:item.email_value="{ item }"
                                        >
                                            <section class="mt-2 mb-2">
                                                <p>
                                                    {{
                                                        item.email == null
                                                            ? "--------"
                                                            : item.email
                                                    }}
                                                </p>
                                            </section>
                                        </template>

                                        <template
                                            v-slot:item.actions="{ item }"
                                        >
                                            <div class="d-flex justify-center">
                                                <router-link
                                                    :to="{
                                                        name: 'int_employee_details',
                                                        params: { id: item.id },
                                                    }"
                                                    class="form-edit-icon bg-success mr-1 ml-1"
                                                    title="Details"
                                                >
                                                    <i
                                                        class="fa-solid fa-eye fa-beat"
                                                    ></i>
                                                </router-link>

                                                <router-link
                                                    :to="{
                                                        name: 'int_employee_edit',
                                                        params: { id: item.id },
                                                    }"
                                                    class="form-edit-icon bg-primary mr-1 ml-1"
                                                    title="edit"
                                                    ><i
                                                        class="fa-solid fa-pen-to-square fa-beat"
                                                    ></i
                                                ></router-link>
                                            </div>
                                        </template>
                                    </v-data-table>

                                    <!-- Pagination -->
                                    <v-row class="mt-3">
                                        <v-col cols="1">
                                            <v-select
                                                dense
                                                v-model="pageSize"
                                                item-text="name"
                                                item-value="id"
                                                item-key="id"
                                                @change="getItems()"
                                                :items="perPageData"
                                            >
                                            </v-select>
                                        </v-col>
                                        <v-col cols="5">
                                            <div class="pagination__wrapper">
                                                <v-pagination
                                                    v-model="pageNumber"
                                                    :length="pageItem"
                                                    :total-visible="5"
                                                    @input="getItems()"
                                                    circle
                                                ></v-pagination>
                                            </div>
                                        </v-col>
                                        <v-col cols="6" class="text-right">
                                            <small>
                                                Total Items
                                                {{ totalItems }}</small
                                            >
                                        </v-col>
                                    </v-row>
                                    <!-- Pagination -->
                                </div>
                            </div>
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
export default {
    data() {
        return {
            isLoading: false,
            search: "",
            base_url: this.$store.state.image_base_link,
            headers: [
                { text: "ID NO", value: "id_no", width: "7%", align: "center" },
                {
                    text: "Customer",
                    value: "basic_info",
                    width: "20%",
                    align: "start",
                },
                {
                    text: "Phone",
                    value: "phone",
                    align: "start",
                },
                {
                    text: "Trade",
                    value: "trade_name_en",
                    align: "center",
                },
                {
                    text: "Address",
                    value: "address",
                    align: "center",
                },
                {
                    text: "Create By",
                    value: "address",
                    align: "center",
                },
                {
                    text: "Update By",
                    value: "address",
                    align: "center",
                },
                {
                    text: "Actions",
                    value: "actions",
                    width: "15%",
                    align: "center",
                },
            ],
            desserts: "",
            /* pagination */
            totalItems: 0,
            pageNumber: 1,
            pageSize: 10,
            pageItem: 0,
            perPageData: this.$store.state.perPageData,
            /* pagination */
            timeout: "",
            delay: 1000,
            /* keyup handler */
        };
    },

    /* methods */
    methods: {
        getItems() {
            (this.isLoading = true),
                axios
                    .get("/api/customers", {
                        params: {
                            search: this.search,
                            page: this.pageNumber,
                            perPage: this.pageSize,
                        },
                    })
                    .then((resp) => {
                        console.log(resp);

                        if (resp.data.status == true) {
                            this.desserts = resp.data.customer_list;
                            this.totalItems = resp.data.customer_list.total;
                            this.pageItem = resp.data.customer_list.last_page;
                            this.isLoading = false;
                        }
                    })
                    .catch((error) => {
                        this.$toastr.e(error.response.data.message);
                    });
        },

        getSearchItem() {
            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => {
                this.getItems();
            }, this.delay);
        },
    },

    created() {
        this.getItems();
    },
};
</script>
<style scoped>
span.btn.btn-success {
    padding: 2px 10px;
    display: inline-block;
    border-radius: 5px;
    color: #fff;
}
</style>
