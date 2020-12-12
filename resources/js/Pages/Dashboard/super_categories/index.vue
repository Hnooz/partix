<template>
    <layout>
        <h1 class="md:text-base my-2 text-gray-500 text-sm">Dashboard/Super Category</h1>
        <div class="mt-8">
            <div class="flex justify-between">
                <h2 class="text-3xl text-teal-600 font-bold">Super Category</h2>
                <!-- <div>
                    <form class="flex items-end" @submit.prevent="submit">
                        <div class="mx-2">
                            <base-input  name="name" v-model="form.name" :error="$page.errors.name" placeholder="Supplier name" required></base-input>
                        </div>
                        <div>
                            <base-button class="bg-teal-700 hover:bg-teal-600">Create</base-button>
                        </div>
                    </form>
                </div> -->
            <div class="flex items-center">
                    <inertia-link href="/dashboard/super_categories/create"
                                  class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:px-4 md:mx-1 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add Super
                    </inertia-link>
            </div>
            </div>
            <h1 class="font-medium text-gray-500 text-xs">
                <span class="font-semibold text-red-400">Hint</span> double click on name to modify
            </h1>
            <div class="mt-4">
                <div class="flex flex-col">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        #ID
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        Name
                                    </th>

                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-700">
                                <tr class="border-b border-gray-200" v-for="(super_category, index) in super_categories" :key="index">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ super_category.id }}
                                    </td>

                                    <td  class="px-6 py-4 whitespace-no-wrap">
                                        <Edit :super_category="super_category" />
                                    </td>

                                    <td  class="flex px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                                        <!-- <svg @click="showInput(category)" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> -->
                                        <button @click="Delete(super_category)" class="focus:outline-none outline-none">
                                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </layout>
</template>

<script>
import Layout from '../../../Shared/Layout'
import Edit from '../super_categories/Edit'
    export default {
        components: {Layout,Edit},
        props:['super_categories'],
        data() {
            return {
                // show:0,
                form: {
                    name: '',
                },
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/dashboard/super_categories', this.form);
                this.form = '';
            },
            Delete(super_category){
                     this.$inertia.delete(`/dashboard/super_categories/${super_category.id}`);
            },
            // showInput(category){
            //     this.show = category.id
            // }
        }
    }
</script>