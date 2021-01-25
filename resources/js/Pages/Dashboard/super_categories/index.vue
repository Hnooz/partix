<template>
    <layout>
        <h1 class="md:text-base my-2 text-gray-500 text-sm capitalize">{{__('dashboard')}}/{{__('super categories')}}</h1>
        <div class="mt-8 capitalize">
            <div class="flex justify-between">
                <h2 class="md:text-3xl text-teal-600 font-bold">{{__('super categories')}}</h2>
            <div class="flex items-center">
                    <inertia-link href="/dashboard/super_categories/create"
                                  class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:px-4 md:mx-1 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        {{__('add')}} {{__('super')}}
                    </inertia-link>
            </div>
            </div>
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
                                        {{__('name')}}
                                    </th>

                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-700">
                                <tr class="border-b border-gray-200" v-for="(super_category, index) in super_categories" :key="index">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ id++ }}
                                    </td>

                                    <td  class="px-6 py-4 whitespace-no-wrap">
                                        {{super_category.name}}
                                    </td>

                                    <td  class="flex px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                                       <inertia-link :href="'/dashboard/super_categories/'+super_category.id+'/edit'" ><svg class="h-6 text-blue-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
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
    export default {
        components: {Layout},
        props:['super_categories'],
        data() {
            return {
                // show:0,
                form: {
                    name: '',
                    id:1,
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