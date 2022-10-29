<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    contacts: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm();

function destroy(id) {
    if (confirm("Vous êtes sur de vouloir supprimer")) {
        form.delete(route('contacts.destroy', id));
    }
}
</script>

<template>

  <Head title="contacts" />

<BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                contacts Index
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    v-if="$page.props.flash.message"
                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert"
                >
                    <span class="font-medium">
                        {{ $page.props.flash.message }}
                    </span>
                </div>
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       <div class="mb-2">
                            <Link :href="route('contacts.create')">
                                <BreezeButton>Ajouter Un Contact</BreezeButton></Link
                            >
                        </div>
                         <div
                            class="relative overflow-x-auto shadow-md sm:rounded-lg"
                        >
                            <table
                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                            >
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            first_name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Edit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="contact in contacts"
                                        :key="contact.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                        >
                                            {{ contact.id }}
                                        </th>
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                        >
                                            {{ contact.first_name  }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ contact.name }}
                                        </td>


                                        <td class="px-6 py-4">
                                            <Link
                                                :href="
                                                    route(
                                                        'contacts.edit',
                                                        contact.id
                                                    )
                                                "
                                                class="px-4 py-2 text-white bg-blue-600 rounded-lg" >Edit</Link
                                            >
                                        </td>
                                        <td class="px-6 py-4">
                                            <BreezeButton
                                                class="bg-red-700"
                                                @click="destroy(contact.id)"
                                            >
                                                Delete
                                            </BreezeButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </BreezeAuthenticatedLayout>
</template>
