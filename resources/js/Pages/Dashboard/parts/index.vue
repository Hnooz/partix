<template>
    <layout>
        <h1 class="my-2 text-gray-500">Dashboard/Category</h1>
        <div class="">
            <div class="mx-5">
                <div class="flex items-center">
                    <h2 class="md:text-3xl text-xl text-teal-600 font-bold">Category</h2>
                </div>
                
                <p class="my-3 text-sm md:text-base text-teal-700"><span class="font-semibold text-teal-700">Note: </span>if the new category is a parent, please leave (Parent Category = Select)</p>
                <div class="flex items-center my-6 uppercase font-medium text-sm">
                    
                    <form class="">
                        <div class="md:flex">
                            <div class="text-teal-600">
                                <label for="value">Name</label>
                                <label class="block mt-3 text-gray-500">
                                    <input type="text" class="form-input" placeholder="name">
                                </label> 
                            </div>

                            <div class="text-teal-600 my-5 md:mx-5 md:my-0 ">
                                <label >
                                    Parent Category
                                </label>
                                <label class="block mt-3">
                                    <select class="form-select text-gray-500 md:w-64 w-full">
                                        <option>select</option>
                                    </select>
                                </label>
                            </div>
                            <div class="text-teal-600">
                                <label>
                                    Slug
                                </label>
                                <label class="block mt-3 text-gray-500">
                                    <input type="text" class="form-input " placeholder="slug">
                                </label>
                            </div> 
                        </div>
                        <div class="md:flex items-center mt-5">
                            <div class="text-teal-600">
                                <label class="block">
                                    Description
                                </label>
                                <label>
                                    <textarea class="form-textarea mt-3 hidden md:block" cols="50" rows="5" placeholder="type description of this category"></textarea>
                                    <textarea class="form-textarea mt-3 md:hidden" cols="24" rows="3" placeholder="type description of this category"></textarea>
                                </label>
                            </div>
                            <div class="md:flex justify-center my-6 md:mx-5">
                                <inertia-link href="/dashboard/users/create"
                                            class="bg-teal-800 flex items-center hover:bg-teal-700 font-medium md:mx-1 px-4 py-2 rounded text-white">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Add Category
                                </inertia-link>
                            </div> 
                        </div>
                                              
                    </form>                
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
                
            }
        },
    }
</script>