<template>
    <section>
        <div class="service-area">
            <div class="section-container">
                <v-row>
                    <v-col class="mt-4" xl="3" lg="3" md="4" sm="6" cols="12">
                        <div class="single-service">
                            <div class="service-content">
                                <div class="service-after-icon">
                                    <i
                                        class="fa-solid fa-info"
                                        title="Total number of completed sales"
                                    ></i>
                                </div>
                                <div class="service-left-icon-one">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>
                                <div class="service-title-order">
                                    <span class="service-title"
                                        >Total Order</span
                                    >
                                    <span class="service-number">0</span>
                                </div>
                            </div>
                        </div>
                    </v-col>
                    <v-col class="mt-4" xl="3" lg="3" md="4" sm="6" cols="12">
                        <div class="single-service">
                            <div class="service-content">
                                <div class="service-after-icon">
                                    <i
                                        class="fa-solid fa-info"
                                        title="Total number of completed sales"
                                    ></i>
                                </div>
                                <div class="service-left-icon-two">
                                    <i class="fa-solid fa-box-archive"></i>
                                </div>
                                <div class="service-title-order">
                                    <span class="service-title"
                                        >Total Order</span
                                    >
                                    <span class="service-number">0</span>
                                </div>
                            </div>
                        </div>
                    </v-col>
                    <v-col class="mt-4" xl="3" lg="3" md="4" sm="6" cols="12">
                        <div class="single-service">
                            <div class="service-content">
                                <div class="service-after-icon">
                                    <i
                                        class="fa-solid fa-info"
                                        title="Total number of completed sales"
                                    ></i>
                                </div>
                                <div class="service-left-icon-three">
                                    <i class="fa-solid fa-ticket"></i>
                                </div>
                                <div class="service-title-order">
                                    <span class="service-title"
                                        >Total Order</span
                                    >
                                    <span class="service-number">0</span>
                                </div>
                            </div>
                        </div>
                    </v-col>
                    <v-col class="mt-4" xl="3" lg="3" md="4" sm="6" cols="12">
                        <div class="single-service">
                            <div class="service-content">
                                <div class="service-after-icon">
                                    <i
                                        class="fa-solid fa-info"
                                        title="Total number of completed sales"
                                    ></i>
                                </div>
                                <div class="service-left-icon-four">
                                    <i class="fa-brands fa-jedi-order"></i>
                                </div>
                                <div class="service-title-order">
                                    <span class="service-title"
                                        >Total Order</span
                                    >
                                    <span class="service-number">0</span>
                                </div>
                            </div>
                        </div>
                    </v-col>
                </v-row>
            </div>
        </div>
    </section>
</template>

<script>
// @ is an alias to /src

export default {
    name: "team",
    components: {},
    data: () => ({
        team: [
            { name: "Iyad", role: "web developer", avatar: "/img1.png" },
            { name: "Reda", role: "Graphic designer", avatar: "/img2.png" },
            { name: "Zineb", role: "web developer", avatar: "/img3.png" },
            {
                name: "Hu TechGroup",
                role: "Desktop developer",
                avatar: "/img4.png",
            },
        ],
    }),
};
</script>
