<template>
    <layout>
        <h1 class="my-2 text-gray-500">Dashboard/Category</h1>
        <div class="">
             <div class="justify-between md:flex">
                <div class="items-center md:flex">
                    <h2 class="font-bold md:text-3xl text-xl text-teal-600">Categories</h2>
                   
                </div>
                

                <div class="flex items-center">
                    <inertia-link href="/dashboard/categories/create"
                                  class="bg-teal-800 flex font-medium hover:bg-teal-700 items-center md:px-4 md:mx-1 md:py-2 md:text-base  px-20 py-1 rounded text-white text-xs whitespace-no-wrap">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add Category
                    </inertia-link>
                    
                </div>
            </div>
           <p class="text-teal-700 mx-5 my-5 text-sm md:text-base"><span class="font-semibold">Note: </span>click on the category name to modify</p>
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div v-for="super_category in super_categories" :key="super_category.id" class="mx-5">
                    <h1 class="bg-teal-600 px-4 py-3 text-white">
                        {{ super_category.name }}
                    </h1>
                    <ul class="bg-teal-100 capitalize mt-2 px-4 py-2 text-teal-800">
                        <li class="flex justify-between" v-for="category in categories" :key="category.index" >
                            <h1  v-if="category.super_category_id == super_category.id" class="flex">
                                <svg  class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                <span>{{ category.name }}</span>
                            </h1>
                            <div  v-if="category.super_category_id == super_category.id" class="flex">
                                <inertia-link :href="'/dashboard/categories/'+category.id+'/edit'"><svg class="h-6 text-blue-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg></inertia-link>
                                <button @click="Delete(category)">
                                    <svg class="h-6 text-red-500 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                </button>
                            </div>
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
         props: ['categories','super_categories'],
          methods: {
            Delete(category) {
                this.$inertia.delete(`/dashboard/categories/${category.id}`);
            }
          }
    }
</script>
