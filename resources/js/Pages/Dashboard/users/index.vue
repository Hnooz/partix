<template>
    <layout>
        <h1 class="md:text-base my-2 text-gray-500 text-sm">{{__('dashboard')}}/{{__('users')}}</h1>
        <div class="mx-5">
            <div class="justify-between md:flex">
                <div class="items-center md:flex">
                    <h2 class="font-bold md:text-3xl text-xl text-teal-600">{{__('users')}}</h2>
                </div>
                

                <div class="flex items-center">
                    <inertia-link href="/dashboard/users/create"
                                  class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:px-4 md:mx-1 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        {{__('add')}} {{__('user')}}
                    </inertia-link>
                    <button class="bg-teal-500 focus:outline-none hover:bg-teal-400 md:mx-0 md:px-2 mx-2 outline-none px-6 py-2 rounded text-white" type="submit">
                        <a href="/dashboard/users/export"><svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg></a>
                    </button>
                    
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
                                    <!-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    </th> -->
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        #ID
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('email')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('type')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('action')}}
                                    </th>
            
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-500 text-sm md:text-base">
                                <tr v-for="user in users.data" :key="user.index">
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ user.id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ user.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ user.email }}
                                    </td>
                                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span v-if="user.is_admin == 0 && user.is_delivery == 1">delivery</span>
                                        <span v-else>admin</span>
                                    </td>
                                    <td class="flex px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        <inertia-link :href="'/dashboard/users/'+user.id+'/edit'" ><svg class="h-6 text-blue-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
                                        <button @click="Delete(user)"><svg class="h-6 text-red-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <paginator-component :data="users"></paginator-component>
                </div>
            </div>
        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";
    import PaginatorComponent from "../../../components/PaginatorComponent";
    export default {
        components: {
            Layout,
            PaginatorComponent
        },
         props: ['users'],
            methods: {
            Delete(user) {
                this.$inertia.delete(`/dashboard/users/${user.id}`);
            },
            Edit(user){
                this.$inertia.get(`/dashboard/users/${user.id}/edit`);
            }
            }
       
    }
</script>
