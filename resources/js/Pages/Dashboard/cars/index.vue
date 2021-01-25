<template>
    <layout>
        <h1 class="md:text-base my-2 text-gray-500 text-sm capitalize">{{__('dashboard')}}/{{__('cars')}}</h1>
        <div class="mx-5">
            <div class="justify-between md:flex">
                <div class="items-center md:flex">
                    <h2 class="font-bold md:text-3xl text-xl text-teal-600 capitalize">{{__('cars')}}</h2>
                </div>                
                <div class="flex items-center">
                    <inertia-link href="/dashboard/cars/create"
                                  class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:px-4 md:mx-1 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap capitalize">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        {{__('add')}} {{__('car')}}
                    </inertia-link>
                    <!-- <form @submit.prevent="submit"> -->
                        <form @submit.prevent="uploadExcel" class="flex justify-end">
                        <div class="flex justify-end">
                            <base-button class="bg-teal-800 hover:bg-teal-700 rounded-none">
                                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            </base-button>
                        </div>
                        <div class="relative">
                            
                            <input id="files" type="file" ref="files" accept="file/*" label="Files" name="files[]" @change="handleFileUpload()" class="mt-1 block w-full cursor-pointer absolute opacity-0" :error="$page.errors.files" tabindex="7" multiple required>
                            
                            <button type="button" class="bg-teal-800 focus:outline-none hover:bg-teal-700 md:mx-0 md:px-2 mx-2 outline-none px-6 py-3 rounded-tr text-white">
                                <span class="whitespace-no-wrap">upload excel</span>                               
                            </button>
                        </div>
                    </form>
                    <!-- </form> -->
                    
                    
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
                                        {{__('brand')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('model')}}
                                    </th>
                                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('engine')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('year')}}
                                    </th>

                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                         {{__('action')}}
                                    </th>
                                    <!-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th> -->
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-500 text-sm md:text-base">
                                <tr v-for="car in cars" :key="car.index">
                                    <!-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <label for="">
                                            <input type="checkbox" class="form-checkbox border-2">
                                        </label>
                                    </td> -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ id++ }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ car.brands.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ car.brand }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ car.model }}
                                    </td>
                                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ car.engine }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ car.year }}
                                    </td>

                                    <!-- <td>
                                        
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    </td> -->

                                    <td class="flex px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        <inertia-link :href="'/dashboard/cars/'+car.id+'/edit'" ><svg class="h-6 text-blue-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
                                        <button @click="Delete(car)"><svg class="h-6 text-red-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>
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
    import Layout from "../../../Shared/Layout";

    export default {
        components: {Layout},
         props: ['cars'],
         data() {
             return {
                 files:'',
                 id:1,

             }
         },
            methods: {
            uploadExcel() 
            {
            const data = new FormData();
            data.append('files', this.files);

            axios.post( '/dashboard/cars/import',
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
            Delete(car) {
                this.$inertia.delete(`/dashboard/cars/${car.id}`);
            },
            Edit(car){
                this.$inertia.get(`/dashboard/cars/${car.id}/edit`);
            }
            }
       
    }
</script>
