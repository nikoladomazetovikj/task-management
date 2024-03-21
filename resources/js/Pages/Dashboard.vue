<script setup>
import { ref, onMounted } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const { data, get } = usePage().props;
const tasks = ref([]);


onMounted(async () => {
    try {
        const response = await axios.get('/api/task');
        if (response.status === 200) {
            tasks.value = response.data.data || [];
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

const deleteTask = async (task) => {
    try {
        const response = await axios.delete(`/api/task/${task.id}`);
        if (response.status === 204) {
            tasks.value = tasks.value.filter(t => t.id !== task.id);
        } else {
            console.error('Failed to delete task', response);
        }
    } catch (error) {
        console.error('Error deleting task:', error);
    }
};

const changeStatus = async (task) => {
    try {
        const response = await axios.put(`/api/task/${task.id}`, { status: true });
        if (response.status === 200) {
            task.status = true;
        } else {
            console.error('Failed to update task status:', response);
        }
    } catch (error) {
        console.error('Error updating task status:', error);
    }
};

const priorityColor = (priority) => {
    switch (priority.toLowerCase()) {
        case 'low':
            return 'bg-yellow-500';
        case 'medium':
            return 'bg-blue-500';
        case 'high':
            return 'bg-red-500';
        default:
            return 'bg-gray-500';
    }
};

</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template v-if="tasks.length">
                        <div v-for="task in tasks" :key="task.id">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 flex flex-col h-full">
                                    <h3 class="text-lg font-semibold">{{ task.name }}</h3>
                                    <p class="text-gray-500">{{ task.description }}</p>
                                    <p class="text-gray-500">Due Date: <b>{{ task.due_date }}</b></p>
                                    <p class="text-gray-500">
                                        Priority:
                                        <span :class="priorityColor(task.priority)" class="inline-block px-2 py-1 rounded-full text-sm font-semibold text-white">{{ task.priority }}</span>
                                    </p>
                                    <p :class="task.status ? 'text-green-500' : 'text-red-500'">
                                        Status: {{ task.status ? 'Completed' : 'Not Completed' }}
                                    </p>
                                    <hr>
                                    <div class="mt-4 flex justify-between items-center">
                                        <button @click="editTask(task)" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                        <button @click="deleteTask(task)" class="text-red-600 hover:text-red-900">Delete</button>
                                        <button v-if="!task.status" @click="changeStatus(task)" class="text-green-600 hover:text-green-900">Mark Done</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="text-gray-900">No tasks available</div>
                    </template>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
