<template>
    <layout>
        <h1 class="my-2 text-sm text-gray-500 capitalize md:text-base">{{__('dashboard')}}/{{__('brands')}}</h1>
        <div class="mx-5">
            <div class="justify-between md:flex">
                <div class="items-center md:flex">
                    <h2 v-if="hideTable" class="text-xl font-bold text-teal-600 capitalize md:text-3xl">{{__('brands')}}</h2>
                    <h2 v-if="!hideTable" class="text-xl font-bold text-teal-600 capitalize md:text-3xl">{{ brand +'/'+__('cars')}}</h2>
                </div>
                <div class="flex items-center">
                    <inertia-link v-if="hideTable" href="/dashboard/cars/"
                                  class="flex items-center px-20 py-1 text-xs font-medium text-white capitalize whitespace-no-wrap bg-teal-800 rounded hover:bg-teal-700 md:px-4 md:mx-1 md:py-2 md:text-base">
                        {{__('all cars')}}
                    </inertia-link>
                    <inertia-link v-if="hideTable" href="/dashboard/brands/create"
                                  class="flex items-center px-20 py-1 text-xs font-medium text-white capitalize whitespace-no-wrap bg-teal-800 rounded hover:bg-teal-700 md:px-4 md:mx-1 md:py-2 md:text-base">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        {{__('add')}} {{__('brand')}}
                    </inertia-link>
                    <form v-if="hideTable" @submit.prevent="uploadExcel" class="flex justify-end">
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
                     <inertia-link v-if="!hideTable" :href="'/dashboard/brands/'+id+'/cars/create'"
                                  class="flex items-center px-20 py-1 text-xs font-medium text-white capitalize whitespace-no-wrap bg-teal-800 rounded hover:bg-teal-700 md:px-4 md:mx-1 md:py-2 md:text-base">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        {{__('add')}} {{__('car')}}
                    </inertia-link>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex flex-col">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full" v-if="hideTable">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        +
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        #ID
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('cars')}}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                         {{__('action')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="text-sm text-gray-500 bg-white md:text-base">
                                    <tr v-for="brand in brands.data" :key="brand.index">
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <button @click="showCars(brand)" class="outline-none focus:outline-none">+</button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{brand.id}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{brand.name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <h1 @click="showCars(brand)">cars belongs to brand</h1>
                                        </td>
                                        <td class="flex px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                            <inertia-link :href="'/dashboard/brands/'+brand.id+'/edit'" ><svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
                                            <button @click="Delete(brand)"><svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <table class="min-w-full" v-else>
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        <button @click="hideTable = !hideTable" class="outline-none focus:outline-none">-</button>
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        #
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('brand')}}
                                    </th>
                                     <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('model')}}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('engien')}}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('year')}}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                         {{__('action')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="text-sm text-gray-500 bg-white md:text-base">
                                    <tr v-for="car in carsBelongsToBrand" :key="car.index">
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <button @click="hideTable = !hideTable" class="outline-none focus:outline-none">-</button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ car.id }}
                                        </td>
                                         <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{brand}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{car.brand }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{car.model}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{car.engine }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{car.year}}
                                        </td>
                                        <td class="flex px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                            <inertia-link :href="'/dashboard/cars/'+car.id+'/edit'" ><svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
                                            <button @click="Delete(car)"><svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    <paginator-component :data="brands"></paginator-component>
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
         props: ['brands'],
         data() {
             return {
                 files:'',
                 id:'',
                 hideTable:true,
                 carsBelongsToBrand:[],
                 brand:'',
             }
         },
            methods: {
                showCars(brand)
                {
                    this.id = brand.id;
                    this.brand = brand.name;
                    this.carsBelongsToBrand = brand.cars;
                    this.hideTable = !this.hideTable;
                },
            uploadExcel() 
            {
            const data = new FormData();
            data.append('files', this.files);

            axios.post( '/dashboard/brands/import',
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
            Delete(brand) {
                this.$inertia.delete(`/dashboard/brands/${brand.id}`);
            },
            Edit(car){
                this.$inertia.get(`/dashboard/brands/${brand.id}/edit`);
            }
            }
       
    }
</script>
