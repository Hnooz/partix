<template>
    <layout>
        <h1 class="my-2 text-gray-500 capitalize">{{__('dashboard')}}/{{__('order details')}}</h1>
        <div class="mx-5 capitalize">
            <div class="justify-between md:flex">
                <div class="items-center md:flex">
                    <h2 class="text-xl font-bold text-teal-600 md:text-3xl">{{__('order details')}}</h2>
                </div>

                <div class="flex items-center">
                    <button class="px-6 py-2 mx-2 text-white bg-teal-500 rounded outline-none focus:outline-none hover:bg-teal-400 md:mx-0 md:px-2" type="submit">
                        <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    </button>
                    
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
                                        #
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('car')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('type')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('price')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('total')}} {{__('price')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('quantity')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('created at')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="text-sm text-gray-500 bg-white md:text-base">
                                <tr v-for="details in order.order_details" :key="details.index">
                                    <td class="px-3 py-4 whitespace-no-wrap"> 
                                        {{ details.id }}
                                    </td>
                                    <td class="px-3 py-4 capitalize whitespace-no-wrap">
                                        <a  v-if="details.part != null" :href="'/dashboard/parts/' + details.part.slug" >{{ details.part.name }}</a>
                                    </td>
                                    <td class="px-3 py-4 capitalize whitespace-no-wrap">                                        
                                            <span v-if="details.part != null">{{details.part.cars[0].brand }} </span>                                                                                  
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap">
                                        {{ details.part_type }}
                                    </td>
                                    <td  class="px-3 py-4 whitespace-no-wrap">
                                        <span v-if="details.price">{{ details.price }}</span>
                                        <span v-else>no price</span>
                                    </td>
                                   
                                    <td class="px-3 py-4 whitespace-no-wrap">
                                        <span v-if="details.price">{{ details.price * details.quantity }}</span>
                                        <span v-else>no price</span>
                                    </td>
                                    <td class="px-3 py-4 uppercase whitespace-no-wrap">
                                        {{ details.quantity }}
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap">
                                        {{ ago(details) }}
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
        props:['order'],
        methods:  {
        ago(details) {
            return moment(details.created_at).format('lll');
        }
    },
    }
</script>
