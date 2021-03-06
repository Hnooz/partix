<template>
    <layout>
        <h1 class="my-2 text-gray-500 capitalize">{{__('dashboard')}}/{{__('orders')}}</h1>
        <div class="mx-5">
            <div class="flex justify-between">
                <div class="flex items-center">
                    <h2 class="text-xl font-bold text-teal-600 md:text-3xl">{{__('orders')}}</h2>
                    <div class="flex items-center mx-3 text-xs text-gray-500 capitalize whitespace-no-wrap md:mx-16 md:text-base">
                         <h1>{{$page.order.total}} {{__('order')}}</h1>
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
                                        <a href="/dashboard/orders?pending" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{__('pending')}}</a>
                                        <a href="/dashboard/orders?delivered" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{__('delivered')}}</a>
                                        <a href="/dashboard/orders?awaiting" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{__('awaiting')}}</a>
                                        <a href="/dashboard/orders?rejected" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{__('rejected')}}</a>
                                    </div>
                                </div>
                                </div>
                             </label>
                         </div>
                    </div>
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
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        #ID
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('name')}} 
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('address')}} 
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('phone')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('total')}} {{__('price')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('coupon value')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('order status')}}
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-700 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        {{__('action')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="text-sm text-gray-500 bg-white md:text-base">
                                <tr v-for="(order, index) in orders.data" :key="index">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <h1>#{{ index+1 }}</h1>                                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <h1>{{ order.customer_name }}</h1>                                        
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap">
                                        <h1 >{{ order.customer_address }}</h1>                                        
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap">
                                        {{ order.customer_phone }}
                                    </td>

                                    <td class="px-3 py-4 whitespace-no-wrap">
                                        {{ order.price}}
                                    </td>
                                    <td class="px-3 py-4 whitespace-no-wrap">
                                        {{ order.coupon ?  order.coupon.value : "0"}}
                                    </td>
                                
                                    <td class="px-3 py-4 whitespace-no-wrap">
                                        <span v-if="order.order_status_id == 2" class="px-2 py-1 text-sm text-white capitalize bg-teal-300 rounded">{{ order.status.name }}</span>
                                        <span v-if="order.order_status_id == 3" class="px-2 py-1 text-sm text-white bg-orange-500 rounded">{{ order.status.name }}</span>
                                        <span v-if="order.order_status_id == 1" class="px-2 py-1 text-sm text-white capitalize bg-gray-500 rounded">{{ order.status.name }}</span>
                                        <span v-if="order.order_status_id == 4" class="px-2 py-1 text-sm text-white capitalize bg-red-500 rounded">{{ order.status.name }}</span>
                                    </td>
                                    
                                    <td class="flex px-3 py-4 text-sm font-medium leading-5 whitespace-no-wrap">
                                        <inertia-link :href="'/dashboard/orders/'+order.id+'/edit'" class="w-6 h-6 text-blue-500">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                                        </inertia-link>
                                        <inertia-link :href="'/dashboard/orders/'+order.id">
                                            <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                        </inertia-link>
                                        <button @click="Delete(order)"><svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <paginator-component :data="orders"></paginator-component>
                </div>
            </div>
        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";
    import PaginatorComponent from '../../../components/PaginatorComponent';
    import moment from 'moment';
    export default {
        components: {
            Layout,
            PaginatorComponent
        },
        props:['orders'],
        data() {
            return {
               isOpen:false
            }
        },
        methods:  {
        ago(order) {            
            return moment(order.created_at).format('Y-M-D');
        },
        Delete(order) {
                this.$inertia.delete(`/dashboard/orders/${order.id}`);
            },
    },
    }
</script>
