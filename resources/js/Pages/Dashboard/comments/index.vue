<template>
    <layout>
        <h1 class="my-2 text-gray-500">Dashboard/Comments</h1>
        <div class="mx-5">
            <div class="md:flex justify-between">
                <div class="items-center md:flex">
                    <h2 class="font-bold md:text-3xl text-xl text-teal-600">Comments</h2>
                    <div class="capitalize flex items-center md:mx-16 md:text-base text-gray-500 text-xs whitespace-no-wrap">
                         <h1>1.234 total</h1>
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
                                  class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:mx-1 md:px-4 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add User
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
                                <thead class="bg-gray-100 font-semibold">
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        User
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        Comment
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        Product
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 text-gray-700 uppercase tracking-wider"
                                        style="text-align: start">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-500 text-sm md:text-base">
                                <tr v-for="comment in comments" :key="comment.index">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <label for="">
                                            <input type="checkbox" class="form-checkbox border-2">
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap capitalize">
                                        {{ comment.user }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ comment.comment }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap capitalize"> 
                                        {{ comment.product }}
                                    </td>

                                    <td class="flex px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                                        <a href="#"><svg class="h-6 text-blue-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></a>
                                        <a href="#"><svg v-if="comment.viewed == true" class="w-6 h-6 text-teal-500 mx-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg></a>
                                        <a href="#"><svg v-if="comment.viewed == false" class="w-6 h-6 text-orange-500 mx-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg></a>
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
        components: {Layout},
        data() {
            return {
                comments:[
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:true,},
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:false,},
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:false},
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:false,},
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:false},
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:true,},
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:false},
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:false,},
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:true,},
                    {user:'john doe',comment:'this is test comment',product:'oem',viewed:false}
                ]
            }
        },
    }
</script>
