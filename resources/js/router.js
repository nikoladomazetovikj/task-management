import { createMemoryHistory, createRouter } from 'vue-router'
import CreateTask from "@/Pages/Task/CreateTask.vue";


const routes = [
    { path: '/create-task', component: CreateTask },
]

const router = createRouter({
    history: createMemoryHistory(),
    routes,
})

export default router;
