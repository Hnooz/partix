<template>
    <layout>
        <h1 class="my-2 text-gray-500">Dashboard/Orders</h1>
        <div class="mx-5">
            <div class="justify-between md:flex">
                <div class="items-center md:flex">
                    <h2 class="font-bold md:text-3xl text-xl text-teal-600">Orders</h2>
                    <div class="capitalize flex items-center md:mx-16 md:text-base text-gray-500 text-xs whitespace-no-wrap">
                         <h1>{{this.$page.order.total}} total</h1>
                         <div class="flex items-center mx-8">
                             <h1>sort by :</h1>
                             <label for="">
                                 <select class="bg-transparent border-0 capitalize font-medium form-select text-gray-600 text-xs md:text-base">
                                     <option>date created</option>
                                 </select>
                             </label>
                         </div>
                    </div>
                </div>
                

                <div class="flex items-center">
                    <inertia-link href="#"
                                  class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:px-4 md:mx-1 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add Order
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
                                <tbody class="bg-white text-gray-500 text-sm md:text-base">
                                <tr v-for="order in orders" :key="order.index">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <label for="">
                                            <input type="checkbox" class="form-checkbox border-2">
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap capitalize">
                                        <h1 >{{ order.address }}</h1>
                                        <!-- <h1 class="block">{{ order.id }}</h1> -->
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                        {{ order.customer_phone }}
                                    </td>
                                    <!-- <td class="px-6 py-4 whitespace-no-wrap"> 
                                        {{ order.price }}
                                    </td> -->
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <span v-if="order.order_status_id == 2" class="bg-teal-300 capitalize px-2 py-1 rounded text-sm text-white">{{ order.status.name }}</span>
                                        <span v-if="order.order_status_id == 3" class="bg-orange-500 px-2 py-1 rounded text-sm text-white">{{ order.status.name }}</span>
                                        <span v-if="order.order_status_id == 1" class="bg-gray-500 capitalize px-2 py-1 rounded text-sm text-white">{{ order.status.name }}</span>
                                        <span v-if="order.order_status_id == 4" class="bg-red-500 capitalize px-2 py-1 rounded text-sm text-white">{{ order.status.name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ ago(order) }}
                                    </td>

                                    <!-- <td>
                                        
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    </td> -->

                                    <td class="flex px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                                        <inertia-link :href="'/dashboard/orders/'+order.id+'/edit'"><svg class="h-6 text-blue-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
                                        <a href="#"><svg class="h-6 text-red-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></a>
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
    // import moment from 'moment';
    import moment from 'moment';
    export default {
        components: {Layout},
        props:['orders'],
        data() {
            return {
               
            }
        },
        methods:  {
        ago(order) {
            
            return moment(order.created_at).format('lll');
        }
    },
    }
</script>
