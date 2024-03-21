<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const { data, post } = usePage().props;

const form = useForm({
    name: '',
    description: '',
    due_date: '',
    priority: ''
});


const errors = ref({});

const submitForm = async () => {
    try {
        const response = await axios.post('/api/task', form);
        if (response.status === 422) {
            errors.value = response.data.errors;
        } else {
            form.reset();
        }
    } catch (error) {
        console.error('Error submitting form:', 'sss');
    }
};

</script>


<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Task</h2>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">

                        <form @submit.prevent="submitForm" class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                                <input name="name" type="text" v-model="form.name" id="name"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <span v-if="errors.name" class="text-red-500 text-sm">{{ errors.name[0] }}</span>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                                <textarea v-model="form.description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                <span v-if="errors.description" class="text-red-500 text-sm">{{ errors.description }}</span>
                            </div>

                            <div>
                                <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date:</label>
                                <input type="date" v-model="form.due_date" id="due_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <span v-if="errors.due_date" class="text-red-500 text-sm">{{ errors.due_date }}</span>
                            </div>

                            <div>
                                <label for="priority" class="block text-sm font-medium text-gray-700">Priority:</label>
                                <select v-model="form.priority" id="priority" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                                <span v-if="errors.priority" class="text-red-500 text-sm">{{ errors.priority }}</span>
                            </div>

                            <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
