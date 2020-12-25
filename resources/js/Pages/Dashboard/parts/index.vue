<template>
    <layout>
        <h1 class="md:text-base my-2 text-gray-500 text-sm capitalize">{{__('dashboard')}}/{{__('parts')}}</h1>
        <div class="mx-5">
            <div class="justify-between items-center md:flex">
                <div class="items-center md:flex">
                    <h2 class="font-bold md:text-3xl text-xl text-teal-600 capitalize">{{__('parts')}}</h2>
                    <div class="capitalize flex items-center md:mx-10 md:text-base text-gray-500 text-xs whitespace-no-wrap">
                         <h1>123 {{__('part')}}</h1>
                         <div class="flex items-center mx-8">
                             <label for="">
                                <div class="relative inline-block text-left">
                                <div>
                                    <button @click="isOpen = !isOpen" type="button" class="capitalize inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true">
                                    {{__('sort by')}}
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                    </button>
                                </div>
                                <div v-if="isOpen" :class="isOpen ? 'transition ease-out duration-100':'transition ease-in duration-75'" class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    <a href="/dashboard/sorts/parts?latest" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Latest</a>
                                    <a href="/dashboard/sorts/parts?oldest" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Oldest</a>
                                    <a href="/dashboard/sorts/parts?a" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">A-Z</a>
                                    <a href="/dashboard/sorts/parts?z" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Z-A</a>
                                    </div>
                                </div>
                                </div>
                             </label>
                         </div>
                    </div>
                </div>
                
                <div>
                <form>
                    <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </span>
                    <input type="search" v-model="search" class="focus:outline-none px-10 placeholder-gray-400 py-2 shadow-md rounded-md text-sm text-gray-600" :placeholder="__('search')" autocomplete="off">
                    </div>
                </form>
            </div>

                <div class="flex items-center capitalize">
                    <inertia-link href="/dashboard/parts/create"
                                    class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:px-4 md:mx-1 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        {{__('add part')}}
                    </inertia-link>
                    <form @submit.prevent="submit" class="flex">
                        <button class="bg-teal-500 focus:outline-none hover:bg-teal-400 md:px-2 mx-2 outline-none px-6 py-2 rounded text-white" type="submit">
                            <a href="/dashboard/parts/export">
                                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg> 
                            </a>
                        </button>
                
                        <div class="relative">
                            
                            <input id="files" type="file" ref="files" accept="file/*" label="Files" name="files[]" @change="handleFileUpload()" class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full cursor-pointer absolute opacity-0 pin-r pin-t" :error="$page.errors.files" tabindex="7" multiple required>
                            
                            <button type="button" class="bg-teal-500 focus:outline-none hover:bg-teal-400 md:mx-0 md:px-2 mx-2 outline-none px-6 py-2 rounded text-white">
                                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            </button>
                        </div>

                        <div class="flex justify-end">
                            <base-button class="bg-teal-700">
                                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            </base-button>
                        </div>
                    </form>
                    
                    
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
                                    <!-- <th class="px-3 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    </th> -->
                                    <th class="px-3 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        #ID
                                    </th>
                                    <th class="px-3  py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                    <th class="px-3  py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                     {{__('number')}}
                                    </th>
                                    <th class="px-3  py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('price')}}
                                    </th>
                                    <th class="px-3  py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('category')}}
                                    </th>
                                    <th class="px-3  py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('type')}}
                                    </th>
                                    <th class="px-3  py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('action')}}
                                    </th>
                                    <!-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th> -->
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-500 text-sm md:text-base">
                                <tr v-for="part in filteredList" :key="part.index">
                                    <!-- <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <label for="">
                                            <input type="checkbox" class="form-checkbox border-2">
                                        </label>
                                    </td> -->
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
                                        {{ part.price.slice(0,part.price.length - 3) }}  || {{ part.second_price.slice(0,part.second_price.length - 3) }}

                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ part.category.name }}
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ part.type.name }}
                                    </td>
                                    <td class="flex px-3 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        <inertia-link :href="'/dashboard/parts/'+part.id+'/edit'"><svg class="h-6 text-blue-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
                                        <button @click="Delete(part)"><svg class="h-6 text-red-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>
                                    </td>
                                </tr>
                                </tbody>
                                <!-- <pagination :data="laravelData" @pagination-change-page="getResults"></pagination> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";

    export default {
        components: {Layout},
        props: ['parts'],
        data() {
            return {
                files:'',
                isOpen:false,
                search:'',
                laravelData: {},
            }
        },
        computed: {
        filteredList() {
        return this.parts.filter(part => {
            return part.name.toLowerCase().includes(this.search.toLowerCase())
        })
        }
    },
    // created() {
    //         this.getResults();
    //     },
        methods: {
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
      
                this.$http.get('/dashboard/parts?page=' + page)
                    .then(response => {
                    
                        return response.json();
                    }).then(data => {
                        this.laravelData = data;
                    });
            },
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
