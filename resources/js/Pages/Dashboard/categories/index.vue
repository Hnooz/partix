<template>
    <layout>
        <h1 class="my-2 text-gray-500">Dashboard/Category</h1>
        <div class="">
            <div class="justify-between mx-5">
                <div class="flex items-center">
                    <h2 class="text-3xl text-teal-500 font-bold">Category</h2>
                </div>
                
                <p class="my-3 text-teal-700"><span class="font-semibold text-teal-700">Note: </span>if the new category is a parent, please leave (Parent Category = Select)</p>
                <div class="flex items-center my-6 uppercase font-medium text-sm">
                    
                    <form class="">
                        <div class="flex">
                            <div class="text-teal-600">
                                <label for="value">Name</label>
                                <label class="block mt-3 text-gray-500">
                                    <input type="text" class="form-input" placeholder="name">
                                </label> 
                            </div>

                            <div class="text-teal-600 mx-5">
                                <label >
                                    Parent Category
                                </label>
                                <label class="block mt-3">
                                    <select class="form-select text-gray-500 w-64">
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
                        <div class="flex items-center mt-5">
                            <div class="text-teal-600">
                                <label class="block">
                                    Description
                                </label>
                                <label>
                                    <textarea class="form-textarea mt-3" cols="50" rows="4" placeholder="type description of this category"></textarea>
                                </label>
                            </div>
                            <div class="flex justify-center my-6 mx-5">
                                <inertia-link href="/dashboard/users/create"
                                            class="bg-teal-600 font-medium hover:bg-teal-500 mx-1 px-4 py-2 rounded text-white">
                                    Add Category
                                </inertia-link>
                            </div> 
                        </div>
                                              
                    </form>                
                </div>
                
                   
            </div>  
            <p class="text-teal-700 mx-5 my-5"><span class="font-semibold">Note: </span>click on the category name to modify</p>
            <div class="grid grid-cols-3">
                <div class="mx-5">
                    <h1 class="bg-teal-600 px-4 py-3 text-white">category name</h1>
                    <ul class="bg-teal-100 capitalize mt-2 px-4 py-2 text-teal-800">
                        <li class="flex">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            name
                        </li>
                        <li class="flex"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                    </ul>
                </div>
                <div class="mx-5">
                    <h1 class="bg-teal-600 px-4 py-3 text-white">category name</h1>
                    <ul class="bg-teal-100 capitalize mt-2 px-4 py-2 text-teal-800">
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                    </ul>
                </div>
                <div class="mx-5">
                    <h1 class="bg-teal-600 px-4 py-3 text-white">category name</h1>
                    <ul class="bg-teal-100 capitalize mt-2 px-4 py-2 text-teal-800">
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                        <li class="flex"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        name
                        </li>
                    </ul>
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
                
            }
        },
    }
</script>
