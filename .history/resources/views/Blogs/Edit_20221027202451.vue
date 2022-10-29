<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    contact: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.contact.id,
    title: props.contact.first_name,
    name: props.contact.name,
    tel: props.contact.tel,
});


const submit = () => {
    form.put(route("contacts.update", props.contact.id));
};
</script>

<template>
    <Head title="contact Edit" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                contact Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="First_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >First_name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.first_name"
                                    name="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.first_name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.first_name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.name"
                                    name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="tel"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Tel</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.tel"
                                    name="tel"
                                    id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.tel"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.tel }}
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
