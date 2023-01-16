import { createRouter, createWebHistory } from 'vue-router'
import Container from "./views/layout/Container.vue";
import ExampleComponent from "./components/ExampleComponent.vue";
const routes = [
    {
        path:"/",
        name:Container,
        component:Container
    }
]
const router = createRouter({
    routes,
    history:createWebHistory(process.env.BASE_URL)
})

export default router
