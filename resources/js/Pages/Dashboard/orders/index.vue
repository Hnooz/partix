<template>
    <layout>
        <h1 class="my-2 text-gray-500 capitalize">{{__('dashboard')}}/{{__('orders')}}</h1>
        <div class="mx-5 capitalize">
            <div class="justify-between flex">
                <div class="items-center flex">
                    <h2 class="font-bold md:text-3xl text-xl text-teal-600">{{__('orders')}}</h2>
                    <div class="capitalize flex items-center mx-3 md:mx-16 md:text-base text-gray-500 text-xs whitespace-no-wrap">
                         <h1>{{this.$page.order.total}} {{__('order')}}</h1>
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
                                        <a href="/dashboard/orders?1" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{__('pending')}}</a>
                                        <a href="/dashboard/orders?2" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{__('delivered')}}</a>
                                        <a href="/dashboard/orders?3" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{__('awaiting')}}</a>
                                        <a href="/dashboard/orders?4" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{__('rejected')}}</a>
                                    </div>
                                </div>
                                </div>
                             </label>
                         </div>
                    </div>
                </div>
                

                <div class="flex items-center">
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
                                    <!-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    </th> -->
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        #
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('customer address')}} 
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('customer phone')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('total')}} {{__('price')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('order status')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('created at')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('action')}}
                                    </th>
                                    <!-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th> -->
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-500 text-sm md:text-base">
                                <tr v-for="order in orders" :key="order.index">
                                    <!-- <td class="px-6 py-4 whitespace-no-wrap">
                                        <label for="">
                                            <input type="checkbox" class="form-checkbox border-2">
                                        </label>
                                    </td> -->
                                    <td class="px-6 py-4 whitespace-no-wrap"> 
                                        {{ order.id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap capitalize">
                                        <h1 >{{ order.address }}</h1>
                                        <!-- <h1 class="block">{{ order.id }}</h1> -->
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                        {{ order.customer_phone }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                        {{ order.price}}
                                    </td>
                                
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <span v-if="order.order_status_id == 2" class="bg-teal-300 capitalize px-2 py-1 rounded text-sm text-white">{{ order.status.name }}</span>
                                        <span v-if="order.order_status_id == 3" class="bg-orange-500 px-2 py-1 rounded text-sm text-white">{{ order.status.name }}</span>
                                        <span v-if="order.order_status_id == 1" class="bg-gray-500 capitalize px-2 py-1 rounded text-sm text-white">{{ order.status.name }}</span>
                                        <span v-if="order.order_status_id == 4" class="bg-red-500 capitalize px-2 py-1 rounded text-sm text-white">{{ order.status.name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ ago(order) }}
                                    </td>

                                    <td class="flex px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                                        <inertia-link :href="'/dashboard/orders/'+order.id+'/edit'" class="h-6 text-blue-500 w-6">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                                        </inertia-link>
                                        <inertia-link :href="'/dashboard/orders/'+order.id">
                                            <svg class="h-6 text-yellow-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                        </inertia-link>
                                        <a href="#">
                                            <svg class="h-6 text-red-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        </a>
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
               isOpen:false
            }
        },
        methods:  {
        ago(order) {
            
            return moment(order.created_at).format('lll');
        }
    },
    }
</script>
