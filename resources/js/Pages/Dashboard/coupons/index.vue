<template>
    <layout>
        <h1 class="my-2 text-gray-500">{{__('dashboard')}}/{{__('coupon code')}}</h1>
        <div class="mx-5">
            <div class="justify-between">
                <div class="flex items-center justify-between">
                    <h2 class="md:text-3xl text-xl text-teal-600 font-bold">{{__('coupon code')}}</h2>
                    <div class="flex items-center capitalize">
                        <inertia-link href="/dashboard/coupons/create"
                                    class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:px-4 md:mx-1 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            {{__('add')}} {{__('coupon')}}
                        </inertia-link>
                        
                    </div>
                </div>
                
                
                   
            </div>
            <div class="mt-4 capitalize">
                <div class="flex flex-col">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="text-teal-700 font-semibold">
                                <tr>
                                    <!-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    </th> -->
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('name')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('discount type')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('value')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('created at')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('expiration date')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('used')}}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        {{__('action')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-500">
                                <tr v-for="coupon in coupons.data" :key="coupon.index" :class="coupon.used == 0 ? 'hover:bg-red-300 hover:text-white' : 'hover:bg-teal-200 hover:text-white'">
                                    <td class="px-6 py-4 whitespace-no-wrap capitalize">
                                        {{ coupon.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap capitalize">
                                        {{coupon.descount_type.name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                        {{ coupon.value }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ ago(coupon) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ coupon.expiration_at }}
                                    </td>
                                     <td  class="px-6 py-4 whitespace-no-wrap">
                                         <svg v-if="coupon.used == 0" class="text-red-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                         <svg v-if="coupon.used == 1" class="text-teal-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                    </td>
                                    <td class="flex px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                                        <inertia-link :href="'/dashboard/coupons/'+coupon.id+'/edit'"><svg class="h-6 text-blue-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
                                        <button @click="Delete(coupon)"><svg class="h-6 text-red-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <paginator-component :data="coupons"></paginator-component>
                </div>
            </div>
        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";
    import PaginatorComponent from "../../../components/PaginatorComponent";
    import moment from 'moment';

    export default {
        props:[
                'coupons',
                'descountType'
            ],
        components: {
            Layout,
            PaginatorComponent,
        },
        data() {
            return {
                form: {
                    value: '',
                    expiration_at: '',
                    descount_type_id: '',
                },
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/dashboard/coupons', this.form);
                this.form = '';
            },
            Delete(coupon) {
                this.$inertia.delete(`/dashboard/coupons/${coupon.id}`);
            },
             ago(order) {
            
            return moment(order.created_at).format('lll');
        }
        }
    }
</script>
