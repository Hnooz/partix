<template>
    <layout>
        <h1 class="my-2 text-sm text-gray-500 md:text-base">{{__('dashboard')}}/{{__('suppliers')}}</h1>
        <div class="mt-8 capitalize">
            <div class="flex justify-between">
                <h2 class="text-3xl font-bold text-teal-600">{{__('suppliers')}}</h2>
                <div class="flex">
                    <button type="button" @click="toggleModal = !toggleModal"
                                  class="flex items-center px-20 py-1 text-xs font-medium text-white whitespace-no-wrap bg-teal-800 rounded outline-none focus:outline-none hover:bg-teal-700 md:px-4 md:mx-1 md:py-2 md:text-base">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        {{__('add')}} {{__('supplier')}}
                    </button> 
                    <form @submit.prevent="uploadExcel" class="flex justify-end">
                        <div class="flex justify-end">
                            <base-button class="bg-teal-800 rounded-none hover:bg-teal-700">
                                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            </base-button>
                        </div>
                        <div class="relative">
                            
                            <input id="files" type="file" ref="files" accept="file/*" label="Files" name="files[]" @change="handleFileUpload()" class="absolute block w-full mt-1 opacity-0 cursor-pointer" :error="$page.errors.files" tabindex="7" multiple required>
                            
                            <button type="button" class="px-6 py-3 mx-2 text-white bg-teal-800 rounded-tr outline-none focus:outline-none hover:bg-teal-700 md:mx-0 md:px-2">
                                <span class="whitespace-no-wrap">upload excel</span>                               
                            </button>
                        </div>
                    </form> 
                                      
                </div>
                
            </div>
            <h1 class="text-xs font-medium text-gray-500">
                <span class="font-semibold text-red-400">{{__('hint')}}</span> {{__('double click on name to modify')}}
            </h1>
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
                                <tr class="border-b border-gray-200" v-for="(supplier, index) in suppliers.data" :key="index">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        #{{ index+1 }}
                                    </td>
                                    <td  class="px-6 py-4 whitespace-no-wrap">
                                        <Edit :supplier="supplier" />
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ supplier.id }}
                                    </td>

                                    <td  class="flex px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap">
                                        <button @click="Delete(supplier)" class="outline-none focus:outline-none">
                                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <paginator-component :data="suppliers"></paginator-component>
                </div>
            </div>
        </div>

    <div v-if="toggleModal" class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
        <div class="relative w-auto max-w-6xl mx-auto my-6">        
          <div class="relative flex flex-col w-full outline-none focus:outline-none">               
            <main class="">
                <div class="px-6 py-8 bg-white shadow-lg">
                    <div class="absolute top-0 right-0 mx-3 my-1">
                        <button class="outline-none focus:outline-none" @click="toggleModal = !toggleModal">X</button>
                    </div>                        
                    <div class="">
                        <form class="flex items-end" @submit.prevent="submit">
                            <div class="mx-2">
                                <base-input  name="name" v-model="form.name" :error="$page.errors.name" :placeholder="__('supplier name')" required></base-input>
                            </div>
                            <div class="mx-2">
                                <base-input  name="name_ar" v-model="form.name_ar" :error="$page.errors.name_ar" :placeholder="__('supplier name_ar')" required></base-input>
                            </div>
                            <div>
                                <base-button class="bg-teal-700 hover:bg-teal-600">{{__('create')}}</base-button>
                            </div>
                        </form>                            
                    </div>
                </div>
            </main>                   
          </div>
        </div>
    </div>
    <div v-if="toggleModal" class="fixed inset-0 z-40 bg-black opacity-25"></div>

    </layout>
</template>

<script>
import Layout from '../../../Shared/Layout'
import PaginatorComponent from "../../../components/PaginatorComponent";
import Edit from '../suppliers/Edit'
    export default {
        components: {
            Layout,
            Edit,
            PaginatorComponent,
        },
        props:['suppliers'],
        data() {
            return {
                toggleModal:false,
                files:'',
                id:1,
                   form:{
                        name: '',
                        name_ar: '',
                   }
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/dashboard/suppliers', this.form).then(() => {
                    this.form = '';
                    this.toggleModal = false;
                    location.reload()
                    });

            },
            uploadExcel() 
            {
            const data = new FormData();
            data.append('files', this.files);

            axios.post( '/dashboard/suppliers/import',
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
            Delete(supplier){
                     this.$inertia.delete(`/dashboard/suppliers/${supplier.id}`).then(() => location.reload());
            },
        }
    }
</script>