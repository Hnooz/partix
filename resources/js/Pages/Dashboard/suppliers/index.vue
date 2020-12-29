<template>
    <layout>
        <h1 class="md:text-base my-2 text-gray-500 text-sm">{{__('dashboard')}}/{{__('suppliers')}}</h1>
        <div class="mt-8 capitalize">
            <div class="flex justify-between">
                <h2 class="text-3xl text-teal-600 font-bold">{{__('suppliers')}}</h2>
                <div>
                    <form @submit.prevent="uploadExcel" class="flex justify-end">
                        <div class="flex justify-end">
                            <base-button class="bg-teal-700 hover:bg-teal-600 rounded-none">
                                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            </base-button>
                        </div>
                        <div class="relative">
                            
                            <input id="files" type="file" ref="files" accept="file/*" label="Files" name="files[]" @change="handleFileUpload()" class="mt-1 block w-full cursor-pointer absolute opacity-0" :error="$page.errors.files" tabindex="7" multiple required>
                            
                            <button type="button" class="bg-teal-700 focus:outline-none hover:bg-teal-600 md:mx-0 md:px-2 mx-2 outline-none px-6 py-2 rounded-tr text-white">
                                <span class="whitespace-no-wrap">upload excel</span>
                                <!-- <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg> -->
                            </button>
                        </div>
                    </form>
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
            <h1 class="font-medium text-gray-500 text-xs">
                <span class="font-semibold text-red-400">{{__('hint')}}</span> {{__('double click on name to modify')}}
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
                                        {{__('name')}}
                                    </th>

                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-700">
                                <tr class="border-b border-gray-200" v-for="(supplier, index) in suppliers" :key="index">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ supplier.id }}
                                    </td>

                                    <td  class="px-6 py-4 whitespace-no-wrap">
                                        <Edit :supplier="supplier" />
                                    </td>

                                    <td  class="flex px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                                        <button @click="Delete(supplier)" class="focus:outline-none outline-none">
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
import Edit from '../suppliers/Edit'
    export default {
        components: {Layout,Edit},
        props:['suppliers'],
        data() {
            return {
                files:'',
                   form:{
                        name: '',
                        name_ar: '',
                   }
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/dashboard/suppliers', this.form).then(() => location.reload());

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