import { createRouter, createWebHistory } from "vue-router";
import Restaurant from "../views/Restaurant.vue";
import Location from "../views/Location.vue";
const routes = [
    {
        path: "/",
        name: "Restaurants Map",
        component: Restaurant,
    },
    {
        path: "/search",
        name: "Restaurants Search",
        component: Location,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
