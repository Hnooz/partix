<template>
    <layout>
        <h1 class="my-2 text-sm text-gray-500 capitalize md:text-base">{{__('dashboard')}}/{{__('super categories')}}</h1>
        <div class="mt-8 capitalize">
            <div class="flex justify-between">
                <h2 class="font-bold text-teal-600 md:text-3xl">{{__('super categories')}}</h2>
            <div class="flex items-center">
                    <inertia-link href="/dashboard/super_categories/create"
                                  class="flex items-center px-20 py-1 text-xs font-medium text-white whitespace-no-wrap bg-teal-800 rounded hover:bg-teal-700 md:px-4 md:mx-1 md:py-2 md:text-base">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        {{__('add')}} {{__('super')}}
                    </inertia-link>
            </div>
            </div>
            <div class="mt-4">
                <div class="flex flex-col">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        #ID
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                     <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        ID
                                    </th>

                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-700 bg-white">
                                <tr class="border-b border-gray-200" v-for="(super_category, index) in super_categories" :key="index">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        #{{ index+1 }}
                                    </td>

                                    <td  class="px-6 py-4 whitespace-no-wrap">
                                        {{ super_category.name}}
                                    </td>
                                     <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ super_category.id }}
                                    </td>                                    
                                    <td  class="flex px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap">
                                       <inertia-link :href="'/dashboard/super_categories/'+super_category.id+'/edit'" ><svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
                                        <button @click="Delete(super_category)" class="outline-none focus:outline-none">
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
                id:1,
            }
        },
        methods: {
            Delete(super_category){
                     this.$inertia.delete(`/dashboard/super_categories/${super_category.id}`);
            },
        }
    }
</script>