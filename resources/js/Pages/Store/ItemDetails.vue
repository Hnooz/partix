<template>
    <store-layout>
    <BaseNav 
        :cartItemQuantity="cartQuantity" :cartItem="cartCollection" 
        :cartTotalPrice="cartTotalPrice" :wishlistQuantity="wishlistQuantity" 
        :wishlistContent="wishlistContent"/>
    <SelectSection />
         <!-- filter search -->
    <div class="bg-teal-700 py-5 hidden md:block">
        <div class="capitalize container flex font-semibold items-center justify-between mx-auto px-16 text-white">
            <div class="flex">
                <h1>{{$page.locale == 'en' ? part.category.super_category.name : part.category.super_category.name_ar}} |</h1>
                <a :href="'/store/items/'+part.category_id" class="font-normal capitalize">&nbsp;{{$page.locale == 'en' ? part.category.name : part.category.name_ar}}&nbsp;</a> 
                <span class="font-normal capitalize"> | {{ $page.locale == 'en' ? part.name : part.name_ar}}</span>
            </div>
            <div class="flex items-center">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <button class="bg-white flex focus:outline-none outline-none h-8 items-center justify-center rounded-full w-8" type="button">
                    <svg class="text-teal-800 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </button>
                
            </div>
        </div>
    </div>

    <!-- mobile view search -->
    <div class="md:hidden">
        <form class="bg-teal-500 px-8 py-3">
            <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <button type="submit" class="focus:outline-none p-1 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </span>
            <input type="search" class="bg-transparent border-b focus:outline-none placeholder-white px-10 py-2 text-sm text-white w-full" placeholder="Search..." autocomplete="off">
            </div>
        </form>
    </div>

    <div class="container max-w-6xl mb-20 md:mx-auto mt-16 py-4 hidden md:block">
        <div class="flex justify-between">
            <div>
                <div class="flex">
                    <div>
                        <div class="bg-white flex h-70 items-center justify-center w-70">
                            <img class="h-40 object-center object-cover w-40" :src="part.url[0]" alt="">
                        </div>
                       <div class="flex justify-around mt-6">
                        <slide-image class="max-w-xs" :arrows="true" :slidesToShow=2>
                            <div class="flex justify-center bg-white mx-2" v-for="url in part.url" :key="url.index">
                                <img class="h-12 mx-auto my-2 object-center object-cover w-12" :src="url" alt="">
                            </div>
                        </slide-image> 
                       </div>
                    </div>
                    <div class="mx-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="capitalize font-semibold text-3xl text-teal-700">{{$page.locale == 'en' ? part.name : part.name_ar}}</p>
                                <!-- <p v-else class="capitalize font-semibold text-3xl text-teal-700">{{part.name_ar}}</p> -->
                                <p class="capitalize font-medium text-teal-400 text-xl">{{$page.locale == 'en' ? part.cars[0].brand : part.cars[0].brand_ar}}</p>
                                <!-- <p v-else class="capitalize font-medium text-teal-400 text-xl">{{part.cars[0].brand_ar}}</p> -->
                                
                            </div>
                        </div>
                        <div class="">
                            <p class="bg-blue-100 my-5 p-5 text-gray-600 text-sm">
                                {{$page.locale == 'en' ? part.description : part.description_ar}}
                            </p>
                        </div>
                        <div>
                            <span class="bg-white mx-1 px-3 py-2 rounded-full text-gray-600" v-for="car in part.cars" :key="car.id">{{car.brand}}</span>
                        </div>
                        <form @submit.prevent="submit">
                            <div class="my-4">
                                <h1 class="text-red-500 text-sm"><span class="capitalize text-base text-gray-600">hint:</span> you can order directly if part type price = 0</h1>
                                <h1 class="capitalize my-3 text-gray-600">chose type :</h1>
                                <button type="button" @click="oem()" class="bg-gray-800 capitalize focus:outline-none outline-none px-3 py-1 rounded-lg text-white">oem {{part.oem_price}}$</button>
                                <button type="button" @click="aftermark()" class="bg-gray-800 capitalize focus:outline-none my-2 outline-none px-3 py-1 rounded-lg text-white">aftermarket {{part.aftermarket_price}}$</button>
                                <button type="button" @click="used()" class="bg-gray-800 block capitalize focus:outline-none outline-none px-3 py-1 rounded-lg text-white">used {{part.used_price}}$</button>
                            </div>

                            <div class="flex items-center">
                                <h1 class="capitalize text-teal-900">{{__('quantity')}}:</h1>
                                <button type="button" @click="increment()" class="bg-teal-500 mx-2 my-2 text-white">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                </button>
                                
                                <span class="bg-white flex items-center mx-2 px-4 py-2">{{calcQuantity}}</span>
                                <input type="text" v-model="quantity" hidden >

                                <button type="button" @click="decrement()" class="bg-teal-500 mx-2 my-2 text-white" :disabled="calcQuantity == 1">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                </button>
                            </div>

                            <div class="capitalize my-8">
                                <button  @click="addCart(part)" class="bg-teal-800 flex font-semibold focus:outline-none outline-none py-3 text-white whitespace-no-wrap" type="button">
                                    <span class="mx-12 capitalize">{{__('add to cart')}}</span> 
                                    <svg class="h-6 mx-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        <div class="flex">
                            <a href="#" class="bg-blue-700 flex items-center p-2 rounded text-white"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.19795 21.5H13.198V13.4901H16.8021L17.198 9.50977H13.198V7.5C13.198 6.94772 13.6457 6.5 14.198 6.5H17.198V2.5H14.198C11.4365 2.5 9.19795 4.73858 9.19795 7.5V9.50977H7.19795L6.80206 13.4901H9.19795V21.5Z" fill="currentColor" /></svg></a>
                            <a href="#" class="bg-blue-400 flex items-center mx-1 p-2 rounded text-white"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 3C9.10457 3 10 3.89543 10 5V8H16C17.1046 8 18 8.89543 18 10C18 11.1046 17.1046 12 16 12H10V14C10 15.6569 11.3431 17 13 17H16C17.1046 17 18 17.8954 18 19C18 20.1046 17.1046 21 16 21H13C9.13401 21 6 17.866 6 14V5C6 3.89543 6.89543 3 8 3Z" fill="currentColor" /></svg></a>
                            <a href="#" class="bg-green-500 p-2 rounded"><svg class="h-6 w-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 418.135 418.135" style="enable-background:new 0 0 418.135 418.135;" xml:space="preserve"><g>	<path style="fill:#fff;" d="M198.929,0.242C88.5,5.5,1.356,97.466,1.691,208.02c0.102,33.672,8.231,65.454,22.571,93.536L2.245,408.429c-1.191,5.781,4.023,10.843,9.766,9.483l104.723-24.811c26.905,13.402,57.125,21.143,89.108,21.631c112.869,1.724,206.982-87.897,210.5-200.724C420.113,93.065,320.295-5.538,198.929,0.242z M323.886,322.197c-30.669,30.669-71.446,47.559-114.818,47.559c-25.396,0-49.71-5.698-72.269-16.935l-14.584-7.265l-64.206,15.212l13.515-65.607l-7.185-14.07c-11.711-22.935-17.649-47.736-17.649-73.713c0-43.373,16.89-84.149,47.559-114.819c30.395-30.395,71.837-47.56,114.822-47.56C252.443,45,293.218,61.89,323.887,92.558c30.669,30.669,47.559,71.445,47.56,114.817C371.446,250.361,354.281,291.803,323.886,322.197z"/><path style="fill:#fff;" d="M309.712,252.351l-40.169-11.534c-5.281-1.516-10.968-0.018-14.816,3.903l-9.823,10.008c-4.142,4.22-10.427,5.576-15.909,3.358c-19.002-7.69-58.974-43.23-69.182-61.007c-2.945-5.128-2.458-11.539,1.158-16.218l8.576-11.095c3.36-4.347,4.069-10.185,1.847-15.21l-16.9-38.223c-4.048-9.155-15.747-11.82-23.39-5.356c-11.211,9.482-24.513,23.891-26.13,39.854c-2.851,28.144,9.219,63.622,54.862,106.222c52.73,49.215,94.956,55.717,122.449,49.057c15.594-3.777,28.056-18.919,35.921-31.317C323.568,266.34,319.334,255.114,309.712,252.351z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></a>
                            <a href="#" class="bg-red-600 flex items-center mx-1 p-2 rounded text-white"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5 7H19C19.5523 7 20 7.44771 20 8V16C20 16.5523 19.5523 17 19 17H5C4.44772 17 4 16.5523 4 16V8C4 7.44772 4.44772 7 5 7ZM2 8C2 6.34315 3.34315 5 5 5H19C20.6569 5 22 6.34315 22 8V16C22 17.6569 20.6569 19 19 19H5C3.34315 19 2 17.6569 2 16V8ZM10 9L14 12L10 15V9Z" fill="currentColor" /></svg></a>
                        </div>
                    </div>
                    
                </div>
                
                <div>
                    <h1 class="capitalize font-semibold mb-6 text-2xl text-teal-700">{{__('other categories')}}
                        <span class="absolute block bg-teal-700 h-1 w-24"></span>
                    </h1>
                    <div class="flex">
                        <a class="" href="#" v-for="latest in latest_category" :key="latest.index">
                            <img :src="latest.url[0]" alt="" class="h-40 object-center object-cover w-40">
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex">
               
                <div class="mx-2" v-if="form.part_type_id == 1">
                    <p class="font-semibold text-3xl text-gray-900">{{calcOemPrice}} <span class="font-hairline text-gray-700 text-xl">{{__('QAR')}}</span> </p>
                    <p v-if="part.sale > 0" class="line-through text-center text-gray-600">{{part.oem_price}} <span>{{__('QAR')}}</span> </p>
                </div>
                <div class="mx-2" v-if="form.part_type_id == 2">
                    <p class="font-semibold text-3xl text-gray-900">{{calcAftermarketPrice}} <span class="font-hairline text-gray-700 text-xl">{{__('QAR')}}</span> </p>
                    <p v-if="part.sale > 0" class="line-through text-center text-gray-600">{{part.aftermarket_price}} <span>{{__('QAR')}}</span> </p>
                </div>
                <div class="mx-2" v-if="form.part_type_id == 3">
                    <p class="font-semibold text-3xl text-gray-900">{{calcUsedPrice}} <span class="font-hairline text-gray-700 text-xl">{{__('QAR')}}</span> </p>
                    <p v-if="part.sale > 0" class="line-through text-center text-gray-600">{{part.used_price}} <span>{{__('QAR')}}</span> </p>
                </div>
                <img src="../../images/1223/rightimage.png" class="h-72 object-center object-cover w-5/12">
            </div>
        </div>
       
        

    </div>
     <!-- mobile views -->
    <div class="bg-white md:hidden md:rounded-tr-lg mx-6 mt-8 overflow-hidden rounded-t-lg shadow-lg">
        <div class="flex justify-between">

            <p class="flex justify-center bg-teal-400 font-semibold h-10 w-10 md:h-12 md:px-1 md:rounded-none px-1 py-3 rounded-br-lg shadow-lg text-sm text-white md:w-12">{{part.sale}}%</p>
        </div>
        <div class="flex items-center justify-center">
            <a class="-mt-10 px-10" href="#">
                <img class="h-24 md:h-24 md:mt-12 md:w-24 mx-auto object-center object-cover w-24" :src="part.url[0]" :alt="part.name.slice(0,5)">
            </a>
            <div>
                <a href="#">
                <img class="border border-teal-400 h-12 md:h-24 md:mt-12 md:w-24 mx-auto my-1 object-center object-cover w-12" :src="part.url[1]" :alt="part.name.slice(0,5)">
            </a>
            <a href="#">
                <img class="border border-teal-400 h-12 md:h-24 md:mt-12 md:w-24 mx-auto object-center object-cover w-12" :src="part.url[2]" :alt="part.name.slice(0,5)">
            </a>
            </div>
        </div>
        
        <form @submit.prevent="submit">
        <div class="px-4">
            <a href="#" class="font-bold  text-xs md:text-base text-teal-500 capitalize">{{$page.locale == 'en' ? part.name : part.name_ar}}</a>
            <!-- <p class="break-all font-medium text-gray-600 text-xs">{{part.brands.name}}</p> -->
            <p class="font-semibold md:text-xl text-gray-800 text-xs" v-if="form.part_type_id == 1">
                {{calcOemPrice}}<span class="text-gray-500 text-xs">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="line-through px-2 text-gray-500 text-xs">{{part.oem_price}}{{__('QAR')}}</span> 
            </p>

            <p class="font-semibold md:text-xl text-gray-800 text-xs" v-if="form.part_type_id == 2">
                {{calcAftermarketPrice}}<span class="text-gray-500 text-xs">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="line-through px-2 text-gray-500 text-xs">{{part.aftermarket_price}}{{__('QAR')}}</span> 
            </p>

            <p class="font-semibold md:text-xl text-gray-800 text-xs" v-if="form.part_type_id == 3">
                {{calcUsedPrice}}<span class="text-gray-500 text-xs">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="line-through px-2 text-gray-500 text-xs">{{part.used_price}}{{__('QAR')}}</span> 
            </p>
        </div>

        <div class="px-4">
            <h1 class="text-red-500 text-xs"><span class="capitalize text-sm text-gray-600">hint:</span> you can order directly if part type price = 0</h1>
            <h1 class="capitalize text-gray-600 text-sm">chose type :</h1>
            <button type="button" @click="oem()" class="bg-gray-800 capitalize focus:outline-none outline-none px-3 py-1 rounded-lg text-white text-xs">oem {{part.oem_price}}$</button>
            <button type="button" @click="aftermark()" class="bg-gray-800 capitalize focus:outline-none my-2 outline-none px-3 py-1 rounded-lg text-white text-xs">aftermarket {{part.aftermarket_price}}$</button>
            <button type="button" @click="used()" class="bg-gray-800 block capitalize focus:outline-none outline-none px-3 py-1 rounded-lg text-white text-xs">used {{part.used_price}}$</button>
        </div>

        <div class="flex items-center px-4">
            <h1 class="text-teal-900 text-sm">{{__('quantity')}}:</h1>
            <button type="button" @click="increment()" class="bg-teal-500 text-white">
                <svg class="w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
            </button>

            <span class="bg-white flex items-center mx-2 py-2">{{calcQuantity}}</span>
            <input type="text" v-model="quantity" hidden >

            <button type="button" @click="decrement()" class="bg-teal-500 my-2 text-white" :disabled="calcQuantity == 1">
                <svg class="w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">    
                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        
        <p class="px-4 py-5 text-gray-600 text-xs">{{$page.locale == 'en' ? part.description : part.description_ar}}</p>

         <div class="bg-teal-500 py-4 md:hidden">
        <button @click="addCart(part)" class="flex focus:outline-none font-semibold items-center justify-center outline-none px-2 py-1 rounded text-white uppercase w-full">
            <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-6">
                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
            </svg>
            {{__('add to cart')}}
        </button>
    </div>
    </form>
    </div>

   <div v-if="toggleModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
        <div class="relative w-auto my-6 mx-auto max-w-6xl">        
          <div class="relative flex flex-col w-full outline-none focus:outline-none">          
            <div class="-m-10 p-6 flex-auto">            
                <div class="">
                    <div x-data="{ cartOpen: false , isOpen: false }">
                        <main class="">
                            <div class="bg-white mt-16 px-6 py-8 shadow-lg">
                                <div class="flex justify-between">
                                    <h3 class="text-teal-800 text-2xl font-medium">{{__('Checkout')}}</h3>
                                    <button class="focus:outline-none outline-none" @click="toggleModal = !toggleModal">X</button>
                                </div>
                                
                                <div class="">
                                    <div class="">
                                        <form class="mt-8 pb-4" @submit.prevent="submit">
                                            <div class="mt-8">
                                                <h4 class="text-sm text-teal-700 font-medium">{{__('name')}}</h4>
                                                <div class="mt-6 flex">
                                                    <label class="block flex-1">
                                                        <input type="text" name="customer_name" v-model="modelForm.customer_name" :error="$page.errors.customer_name" class="form-input mt-1 block w-full text-gray-700" :placeholder="__('name')" required>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mt-8">
                                                <h4 class="text-sm text-teal-700 font-medium">{{__('Delivery address')}}</h4>
                                                <div class="mt-6 flex">
                                                    <label class="block flex-1">
                                                        <input type="text" name="customer_address" v-model="modelForm.customer_address" :error="$page.errors.customer_address" class="form-input mt-1 block w-full text-gray-700" :placeholder="__('Address')" required>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mt-8">
                                                <h4 class="text-sm text-teal-700 font-medium">{{__('Phone')}}</h4>
                                                <div class="mt-6 flex">
                                                    <label class="block w-3/12">
                                                        <select class="form-select text-gray-700 mt-1 block w-full">
                                                            <option>+974</option>
                                                        </select>
                                                    </label>
                                                    <label class="block flex-1 ml-3">
                                                        <input type="number" name="customer_phone" v-model="modelForm.customer_phone" :error="$page.errors.customer_phone" class="form-input mt-1 block w-full text-gray-700" placeholder="your number" required>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mt-8">
                                                <h4 class="text-sm text-teal-700 font-medium capitalize">{{__('coupon code')}}</h4>
                                                <div class="mt-6 flex">
                                                    <label class="block flex-1">
                                                        <input type="text" name="coupon" v-model="modelForm.coupon" :error="$page.errors.coupon" class="form-input mt-1 block w-full text-gray-700" :placeholder="__('add promocode')">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between mt-8">
                                                <a href="/store" class="flex items-center text-teal-700 text-sm font-medium rounded hover:underline focus:outline-none">
                                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                                                    <span class="mx-2">{{__('Back To Shop')}}</span>
                                                </a>
                                                <button class="flex items-center px-3 py-2 bg-teal-800 text-white text-sm font-medium rounded-md hover:bg-teal-700 focus:outline-none focus:bg-teal-700">
                                                    <span>{{__('Payment')}}</span>
                                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div v-if="toggleModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    
    <BaseFooter/>
    </store-layout>
</template>

<script>
import BaseNav from '../../components/UI/BaseNav'
import BaseInput from '../../components/UI/BaseInput'
import SelectSection from '../../components/UI/SelectSection'
import SlideImage from '../../components/UI/SlideImage'
import BaseFooter from '../../components/UI/BaseFooter'
import StoreLayout from '../../Shared/StoreLayout.vue'


    export default {
        components:{
            StoreLayout,
            BaseNav,
            BaseInput,
            SelectSection,
            SlideImage,
            BaseFooter,
        },
        props:[
            'part','category', 
            'cartQuantity', 
            'cartCollection' ,
            'cartItem',
            'part_type',
            'latest_category',
            'cartTotalPrice',
            'wishlistQuantity',
            'wishlistContent'
            ],
        data() {
            return {
                toggleModal:false,
                quantity:1,
                // pr:'',
                form: {
                    name:        '',  name_ar:'',          
                    number:      '',  description:'', 
                    oem_price:   '',  aftermarket_price:'', 
                    used_price:  '',  slug: '',
                    supplier_id: '',  category_id:'', 
                    part_type_id:'',
                },
                modelForm:{
                    customer_name:'',
                    customer_phone:'',
                    customer_address:'',
                    coupon:''
                }
            }
        },
        created() {
            this.form = this.part;
        },
        computed: {
            calcOemPrice()
            {
                if (this.part.sale) {                    
                    return  (this.form.oem_price - ((this.part.sale / 100) * this.form.oem_price)).toFixed();
                }
              return  (this.part.oem_price - (this.part.category.sale / 100) * this.part.oem_price).toFixed();
            },
            calcAftermarketPrice()
            {
                if (this.part.sale) {                    
                    return  (this.form.aftermarket_price - ((this.part.sale / 100) * this.form.aftermarket_price)).toFixed();
                }
              return  (this.part.aftermarket_price - (this.part.category.sale / 100) * this.part.aftermarket_price).toFixed();
            },
            calcUsedPrice(){
                if (this.part.sale) {                    
                    return  (this.form.used_price - ((this.part.sale / 100) * this.form.used_price)).toFixed();
                }
                return  (this.part.used_price - (this.part.category.sale / 100) * this.part.used_price).toFixed();
            },
            calcQuantity()
            {
                if (this.cartItem == null) {
                    return this.quantity
                } else {
                    return this.cartItem.quantity
                }
            }
        },
        methods: {
            submit()
            {
                const form =this.form;
            
                const formItem = this.modelForm;

                const both = Object.assign(form , formItem);
                this.$inertia.post('/store/orders/zeroprice', both).then(() => {
                    this.toggleModal = false;
                    this.modelForm = '';
                    location.reload();
                });
            },
            
        addCart() {
            const form =this.form;
            
            const item = this.cartItem;

            const both = Object.assign(form , item);

            if (this.cartItem != null) {
                this.$inertia.put(`/store/cart/${this.cartItem.id}`, both);
            } else {
                const newadd = this.form;
                newadd.quantity = this.quantity;
                this.$inertia.post('/store/carts', newadd).then(() => location.reload());
            }            
        },
         increment(){
             if (this.cartItem == null) {
                 this.quantity++ ; 
             } else {
                 this.cartItem.quantity++;  
             }
                      
        },
        decrement(){
          if (this.cartItem == null) {
                 this.quantity-- ; 
             } else {
                  this.cartItem.quantity--; 
             }
                        
        },
        oem()
        {         
            if (this.form.oem_price == 0) {
                this.toggleModal = true;
            }   
            
            this.form.part_type_id = 1;
        },
        aftermark()
        {            
            if (this.form.aftermarket_price == 0) {
                this.toggleModal = true;
            }
            this.form.part_type_id = 2;
        },
        used()
        {     
            if (this.form.used_price == 0) {
                this.toggleModal = true;
            }       
            this.form.part_type_id = 3;
        }


    },
    }
</script>

<style>
#st-1{
    z-index: 0;
}

</style>