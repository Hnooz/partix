<template>
    <layout>
        <h1 class="my-2 text-gray-500 capitalize">{{__('dashboard')}}/{{__('brands')}}/{{__('cars')}}</h1>
        <div class="mx-5 capitalize">
            <div class="justify-between md:flex">
                <div class="items-center md:flex">
                    <h2 class="font-bold md:text-3xl text-xl text-teal-600">{{__('cars')}}</h2>
                </div>                
                <div class="flex items-center">
                    <inertia-link :href="'/dashboard/brands/'+ brand.id +'/cars/create'"
                                  class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:px-4 md:mx-1 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap capitalize">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        {{__('add')}} {{__('car')}}
                    </inertia-link>
                    <button class="bg-teal-500 focus:outline-none hover:bg-teal-400 md:mx-0 md:px-2 mx-2 outline-none px-6 py-2 rounded text-white" type="submit">
                        <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
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
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        #
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('model')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('engine')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('year')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('created at')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-500 text-sm md:text-base">
                                <tr v-for="car in brand.cars" :key="car.index">
                                    <td class="px-6 py-4 whitespace-no-wrap"> 
                                        {{ id++ }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap capitalize">
                                        {{ car.brand }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ car.model }}
                                    </td>
                                    <td  class="px-6 py-4 whitespace-no-wrap">
                                        {{ car.engine }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                       {{ car.year }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ ago(car) }}
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
    import moment from 'moment';
    export default {
        components: {Layout},
        props:['cars', 'brand'],
        data() {
            return {
                id:1,
            }
        },
        methods:  {
        ago(car) {
            return moment(car.created_at).format('lll');
        }
    },
    }
</script>
