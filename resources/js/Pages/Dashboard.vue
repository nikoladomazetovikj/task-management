<script setup>
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const { data, get } = usePage().props;
const tasks = ref([]);


onMounted(async () => {
    try {
        const response = await axios.get('/api/task');
        if (response.status === 200) {
            tasks.value = response.data.tasks || [];
        } else {
            console.error('Failed to fetch tasks:', response);
        }
    } catch (error) {
        console.error('Error fetching tasks:', error);
    }
});

const editTask = (task) => {
    // TODO:
};

const deleteTask = (task) => {
    // TODO:
};

const changeStatus = (task) => {
    // TODO:
};

</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-if="tasks.length" class="p-6 text-gray-900">
                        <ul>
                            <li v-for="task in tasks" :key="task.id">
                                {{ task.title }}
                                <button @click="editTask(task)">Edit</button>
                                <button @click="deleteTask(task)">Delete</button>
                                <button @click="changeStatus(task)">Change Status</button>
                            </li>
                        </ul>
                    </div>
                    <div v-else class="p-6 text-gray-900">No tasks available</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
