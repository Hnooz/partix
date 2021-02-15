<template>
    <layout>
        <div class="flex justify-between px-5">
            <h1 class="my-2 text-sm text-gray-500 capitalize md:text-base">{{__('dashboard')}}/{{__('parts')}}</h1>
            <form @submit.prevent="submit" class="flex">
            <div class="flex justify-end">
                <base-button class="bg-teal-800 rounded-none hover:bg-teal-700">
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </base-button>
                </div>
                <div class="relative">                    
                    <input id="files" type="file" ref="files" accept="file/*" label="Files" name="files[]" @change="handleFileUpload()" class="absolute block w-full mt-1 opacity-0 cursor-pointer" :error="$page.errors.files" tabindex="7" multiple required>                    
                    <button type="button" class="px-6 py-2 mx-2 text-white bg-teal-800 rounded-tr outline-none focus:outline-none hover:bg-teal-700 md:mx-0 md:px-2">
                        <span class="whitespace-no-wrap">upload excel</span>                        
                    </button>
                </div>
            </form>
        </div>
        <div class="mx-5">
            <div class="items-center justify-between md:flex">
                <div class="items-center md:flex">
                    <h2 class="text-xl font-bold text-teal-600 capitalize md:text-3xl">{{__('parts')}}</h2>
                    <div class="flex items-center text-xs text-gray-500 capitalize whitespace-no-wrap md:mx-10 md:text-base">
                         <h1>123 {{__('part')}}</h1>
                         <div class="flex items-center mx-8">
                             <label for="">
                                <div class="relative inline-block text-left">
                                <div>
                                    <button @click="isOpen = !isOpen" type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 capitalize bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true">
                                    {{__('sort by')}}
                                    <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                    </button>
                                </div>
                                <div v-if="isOpen" :class="isOpen ? 'transition ease-out duration-100':'transition ease-in duration-75'" class="absolute right-0 w-32 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    <a href="/dashboard/parts?latest" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Latest</a>
                                    <a href="/dashboard/parts?oldest" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Oldest</a>
                                    <a href="/dashboard/parts?a" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">A-Z</a>
                                    <a href="/dashboard/parts?z" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Z-A</a>
                                    </div>
                                </div>
                                </div>
                             </label>
                         </div>
                    </div>
                </div>
                
                <div class="flex">

                <form>
                    <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 text-gray-400 focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </span>
                    <input type="search" v-model="search" class="px-5 py-2 pl-10 text-sm text-gray-600 placeholder-gray-400 rounded-md shadow-md focus:outline-none" autocomplete="off">
                    </div>
                </form>

                <div class="flex items-center capitalize">
                <inertia-link href="/dashboard/parts/create"
                                class="flex items-center px-4 py-1 text-xs font-medium text-white whitespace-no-wrap bg-teal-800 rounded hover:bg-teal-700 md:px-4 md:mx-1 md:py-2 md:text-base">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    {{__('add part')}}
                </inertia-link>
                <button class="px-6 py-2 text-white bg-teal-800 rounded outline-none focus:outline-none hover:bg-teal-700 md:px-2" type="submit">
                        <a href="/dashboard/parts/export">
                            <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg> 
                        </a>
                    </button>
            </div>
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
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        #ID
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                     {{__('number')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('price')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('category')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('type')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('action')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="text-sm text-gray-500 bg-white md:text-base">
                                <tr v-for="part in filteredList" :key="part.index">                                
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ part.id }}
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ part.name }}
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ part.number }}
                                    </td>
                                     <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ part.oem_price }}  || {{ part.aftermarket_price }} || {{ part.used_price }}

                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200" v-if="part.category">
                                        {{ part.category.name }}
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200" v-else>
                                        <span class="text-red-600">no category</span>
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ part.type.name }}
                                    </td>
                                    <td class="flex px-3 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                        <inertia-link :href="'/dashboard/parts/'+part.id+'/edit'"><svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></inertia-link>
                                        <inertia-link :href="'/dashboard/parts/'+part.slug"><svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>                                        
                                        <button @click="Delete(part)"><svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <paginator-component :data="parts"></paginator-component>
                </div>
            </div>
        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";
    import PaginatorComponent from '../../../components/PaginatorComponent';
    export default {
        components: {
            Layout,
            PaginatorComponent,
        },
        props: ['parts'],
        data() {
            return {
                files:'',
                isOpen:false,
                search:'',
                // id:1,
            }
        },

        computed: {
            filteredList() {
                return this.parts.data.filter(part => {
                    return part.name.toLowerCase().includes(this.search.toLowerCase())
                });
            }
        },
        methods: {
            submit() {
            
            const data = new FormData();

            data.append('files', this.files);

            axios.post( '/dashboard/parts/import',
                data,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            ).then(function(response){
               const status = JSON.parse(response.status);

                    if (status == '200') {
                        
                        window.location.pathname = response.data.redirect;
                    }
            })
            .catch(function(){
            console.log('FAILURE!!');
            });

            },

            handleFileUpload(){
                this.files = this.$refs.files.files[0];
            },
            Delete(part) {
                this.$inertia.delete(`/dashboard/parts/${part.id}`);
            },
            Edit(part){
                this.$inertia.get(`/dashboard/parts/${part.id}/edit`);
            },
        },
       
    }
</script>
