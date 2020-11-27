<template>
    <layout>
        <h1 class="my-2 text-gray-500">Dashboard/Coupon Code</h1>
        <div class="mx-5">
            <div class="justify-between">
                <div class="flex items-center">
                    <h2 class="md:text-3xl text-xl text-teal-600 font-bold">Coupon Code</h2>
                </div>
                

                <div class="flex items-center justify-center my-6 uppercase font-medium text-sm">
                    <form class="md:grid md:grid-cols-3" @submit.prevent="submit">
                        <div class="text-teal-600">
                            <label >
                                Discount Type
                            </label>
                            <label class="block mt-3">
                                <select name="descount_type_id" class="form-select text-gray-500 w-full"  v-model="form.descount_type_id" :error="$page.errors.descount_type_id" required>
                                    <option value="">e.g Fixed or Percentage</option>
                                    <option v-for="type in descountType" :key="type.index" :value="type.id">{{type.name}}</option>
                                </select>
                            </label>
                        </div>
                        <div class="my-5 md:my-0 md:mx-10 text-teal-600">
                            <label for="value">value</label>
                            <label class="block mt-3 text-gray-500">
                                <input type="text" name="value" class="form-input"  v-model="form.value" :error="$page.errors.value" placeholder="e.g 200 QAR or 20%"  required>
                            </label> 
                        </div>
                        <div class="text-teal-600">
                            <label for="code Expiration date">
                                code Expiration date
                            </label>
                            <label class="block mt-3 text-gray-500">
                                <input type="date" name="expiration_at" class="form-input w-full"  v-model="form.expiration_at" :error="$page.errors.expiration_at" placeholder="12/3/2020" required>
                            </label>
                        </div> 
                            <div class="my-6">
                                <base-button
                                            class="bg-teal-800 flex items-center font-medium hover:bg-teal-700 mx-1 px-4 py-2 rounded text-white">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Add Coupon
                                </base-button>
                            </div>                   
                    </form>                
                </div>
                
                   
            </div>
            <div class="mt-4">
                <div class="flex flex-col">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="text-teal-700 font-semibold">
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 uppercase tracking-wider"
                                        style="text-align: start">
                                        Discount Type
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        Value
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        Creation Date
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        Expiration Date
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        Used
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4  uppercase tracking-wider"
                                        style="text-align: start">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-500">
                                <tr v-for="coupon in coupons" :key="coupon.index" :class="coupon.used == 0 ? 'hover:bg-red-300 hover:text-white' : 'hover:bg-teal-200 hover:text-white'">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <label for="">
                                            <input type="checkbox" class="form-checkbox border-2">
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap capitalize">
                                        {{coupon.descount_type_id}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                        {{ coupon.value }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap"> 
                                        {{ coupon.created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ coupon.expiration_at }}
                                    </td>
                                     <td  class="px-6 py-4 whitespace-no-wrap">
                                         <svg v-if="coupon.used == 0" class="text-red-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                         <svg v-if="coupon.used == 1" class="text-teal-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                    </td>
                                    <td class="flex px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                                        <a href="#"><svg class="w-6 h-6 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></a>
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

    export default {
        props:[
                'coupons',
                'descountType'
            ],
        components: {Layout},
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
            }
        }
    }
</script>
