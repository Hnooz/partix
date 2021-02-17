<template>
    <store-layout>
    <BaseNav />

    <div class="hidden py-5 bg-teal-800 md:block">
        <div class="container flex items-center justify-between px-16 mx-auto font-semibold text-white capitalize">
            <div class="flex">
                <h1 v-if="part.category.super_category">{{$page.locale == 'en' ? part.category.super_category.name : part.category.super_category.name_ar}} |</h1>
                <a :href="'/store/items/'+part.category_id" class="font-normal capitalize" v-if="part.category != null">&nbsp;{{$page.locale == 'en' ? part.category.name : part.category.name_ar}}&nbsp;</a> 
                <span class="font-normal capitalize"> | {{ $page.locale == 'en' ? part.name : part.name_ar}}</span>
            </div>
            <div class="flex items-center">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <button class="flex items-center justify-center w-8 h-8 bg-white rounded-full outline-none focus:outline-none" type="button">
                    <svg class="w-4 text-teal-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </button>
                
            </div>
        </div>
    </div>

    <div class="container hidden max-w-6xl py-4 mt-16 mb-20 md:mx-auto md:block">
        <div class="flex justify-between">
            <div>
                <div class="flex">
                    <div>
                        <div class="flex items-center justify-center bg-white h-70 w-70">
                            <img class="object-cover object-center w-full h-full" :src="img" alt="">
                        </div>
                       <div class="flex justify-around mt-6">
                        <slide-image class="max-w-xs" :arrows="true" :slidesToShow=2>
                            <div class="flex justify-center mx-2 bg-white" v-for="url in part.url" :key="url.index">
                                <img class="object-cover object-center w-12 h-12 mx-auto my-2" :src="url" alt="" @click="changImage(url)">
                            </div>
                        </slide-image> 
                       </div>
                    </div>
                    <div class="mx-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-3xl font-semibold text-teal-700 capitalize">{{$page.locale == 'en' ? part.name : part.name_ar}}</p>                              
                                <p class="text-xl font-medium text-teal-400 capitalize" v-if="part.cars.length > 0">{{$page.locale == 'en' ? part.cars[0].brand : part.cars[0].brand_ar}}</p>                            
                            </div>
                        </div>
                        <div class="">
                            <p class="p-5 my-5 text-sm text-gray-600 bg-blue-100">
                                {{$page.locale == 'en' ? part.description : part.description_ar}}
                            </p>
                        </div>
                        <div>
                            <h1 v-if="part.cars.length > 0">
                                <span class="px-3 py-2 mx-1 leading-10 text-gray-600 bg-white rounded-full" v-for="car in part.cars" :key="car.id">{{$page.locale == 'en' ? car.brand : car.brand_ar}}</span>
                            </h1>
                        </div>
                        <form @submit.prevent="submit">
                            <div class="my-4">
                                <h1 class="text-sm text-red-500"><span class="text-base text-gray-600 capitalize">{{__('hint')}}:</span> {{__('you can order directly if part type price = 0')}}</h1>
                                <h1 class="my-3 text-gray-600 capitalize">{{__('chose type')}} :</h1>
                                
                                <button type="button" @click="oem()" class="relative px-5 py-3 text-white capitalize bg-teal-700 outline-none hover:bg-teal-600 focus:outline-none">
                                    oem
                                    <span class="absolute top-0 mx-1 -mt-3 text-green-400 bg-white rounded-full" v-if="form.part_type_id == 1">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    </span>
                                </button>

                                <button type="button" @click="aftermark()" class="relative px-5 py-3 mx-2 text-white capitalize bg-teal-700 outline-none hover:bg-teal-600 focus:outline-none">
                                    aftermarket
                                    <span class="absolute top-0 mx-1 -mt-3 text-green-400 bg-white rounded-full" v-if="form.part_type_id == 2">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    </span>
                                </button>
                                
                                <button type="button" @click="used()" class="relative px-5 py-3 text-white capitalize bg-teal-700 outline-none hover:bg-teal-600 focus:outline-none">
                                    used 
                                    <span class="absolute top-0 mx-1 -mt-3 text-green-400 bg-white rounded-full" v-if="form.part_type_id == 3">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    </span>
                                </button>
                                
                            </div>
                            <div class="flex items-center">
                                <h1 class="text-teal-900 capitalize">{{__('quantity')}}:</h1>
                                <button type="button" @click="increment()" class="mx-2 my-2 text-white bg-teal-500">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                </button>
                                <span class="flex items-center px-4 py-2 mx-2 bg-white">{{calcQuantity}}</span>
                                <input type="text" v-model="quantity" hidden >

                                <button type="button" @click="decrement()" class="mx-2 my-2 text-white bg-teal-500" :disabled="calcQuantity == 1">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                </button>
                            </div>

                            <div class="my-8 capitalize">
                                <button  @click="addCart(part)" class="flex py-3 font-semibold text-white whitespace-no-wrap bg-teal-800 outline-none focus:outline-none" type="button">
                                    <span class="mx-12 capitalize">{{__('add to cart')}}</span> 
                                    <svg class="w-6 h-6 mx-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        
                    </div>
                    
                </div>
                
                <div>
                    <h1 class="mb-6 text-2xl font-semibold text-teal-700 capitalize">{{__('other categories')}}
                        <span class="absolute block w-24 h-1 bg-teal-700"></span>
                    </h1>
                    <div class="flex">
                        <a class="" href="#" v-for="latest in latest_category" :key="latest.index">
                            <img :src="latest.url[0]" alt="" class="object-cover object-center w-40 h-40">
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex">
               
                <div class="mx-2" v-if="form.part_type_id == 1">
                    <p class="text-3xl font-semibold text-gray-900">{{calcOemPrice}} <span class="text-xl font-hairline text-gray-700">{{__('QAR')}}</span> </p>
                    <p v-if="part.sale > 0" class="text-center text-gray-600 line-through">{{part.oem_price}} <span>{{__('QAR')}}</span> </p>
                </div>
                <div class="mx-2" v-if="form.part_type_id == 2">
                    <p class="text-3xl font-semibold text-gray-900">{{calcAftermarketPrice}} <span class="text-xl font-hairline text-gray-700">{{__('QAR')}}</span> </p>
                    <p v-if="part.sale > 0" class="text-center text-gray-600 line-through">{{part.aftermarket_price}} <span>{{__('QAR')}}</span> </p>
                </div>
                <div class="mx-2" v-if="form.part_type_id == 3">
                    <p class="text-3xl font-semibold text-gray-900">{{calcUsedPrice}} <span class="text-xl font-hairline text-gray-700">{{__('QAR')}}</span> </p>
                    <p v-if="part.sale > 0" class="text-center text-gray-600 line-through">{{part.used_price}} <span>{{__('QAR')}}</span> </p>
                </div>
                <img src="../../images/1223/rightimage.png" class="object-cover object-center w-5/12 h-72">
            </div>
        </div>
    </div>
     <!-- mobile views -->
    <div class="mx-6 mt-8 overflow-hidden bg-white rounded-t-lg shadow-lg md:hidden md:rounded-tr-lg">
        <div class="flex justify-between">
            <p class="flex justify-center w-10 h-10 px-1 py-3 text-sm font-semibold text-white bg-teal-400 rounded-br-lg shadow-lg md:h-12 md:px-1 md:rounded-none md:w-12">{{part.sale}}%</p>
        </div>
        <div class="flex items-center justify-center h-64 w-70">
            <div class="w-64 h-48" href="#">
                <img class="object-cover object-center w-full h-full mx-auto md:h-24 md:mt-12 md:w-24" :src="img" :alt="part.name.slice(0,5)">
            </div>
            <div>
                <img class="object-cover object-center w-12 h-12 mx-auto my-1 border border-teal-400 md:h-24 md:mt-12 md:w-24" :src="part.url[0]" @click="changImage(part.url[0])" :alt="part.name.slice(0,5)">
                <img class="object-cover object-center w-12 h-12 mx-auto my-1 border border-teal-400 md:h-24 md:mt-12 md:w-24" :src="part.url[1]" @click="changImage(part.url[1])" :alt="part.name.slice(0,5)">
           
                <img class="object-cover object-center w-12 h-12 mx-auto border border-teal-400 md:h-24 md:mt-12 md:w-24" :src="part.url[2]" @click="changImage(part.url[2])" :alt="part.name.slice(0,5)">
           
            </div>
        </div>
        
        <form @submit.prevent="submit">
        <div class="px-4">
            <a href="#" class="text-xs font-bold text-teal-500 capitalize md:text-base">{{$page.locale == 'en' ? part.name : part.name_ar}}</a>
            <div class="my-3">
                <span class="px-3 py-2 mx-1 text-sm leading-10 text-gray-600 bg-blue-100 rounded-full" v-for="car in part.cars" :key="car.id">{{$page.locale == 'en' ? car.brand : car.brand_ar}}</span>
            </div>                           
            <p class="text-xs font-semibold text-gray-800 md:text-xl" v-if="form.part_type_id == 1">
                {{calcOemPrice}} <span class="text-xs text-gray-500">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="px-2 text-xs text-gray-500 line-through">{{part.oem_price}} {{__('QAR')}}</span> 
            </p>

            <p class="text-xs font-semibold text-gray-800 md:text-xl" v-if="form.part_type_id == 2">
                {{calcAftermarketPrice}}<span class="text-xs text-gray-500">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="px-2 text-xs text-gray-500 line-through">{{part.aftermarket_price}}{{__('QAR')}}</span> 
            </p>

            <p class="text-xs font-semibold text-gray-800 md:text-xl" v-if="form.part_type_id == 3">
                {{calcUsedPrice}}<span class="text-xs text-gray-500">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="px-2 text-xs text-gray-500 line-through">{{part.used_price}}{{__('QAR')}}</span> 
            </p>
        </div>

        <div class="px-4">
            <h1 class="text-xs text-red-500"><span class="text-sm text-gray-600 capitalize">{{__('hint')}}:</span> {{__('you can order directly if part type price = 0')}}</h1>
            <h1 class="my-5 text-sm text-gray-600 capitalize">{{__('chose type')}} :</h1>
            <!-- relative px-5 py-3 mx-2 text-white capitalize  outline-none hover:bg-teal-600 focus:outline-none -->
            <button type="button" @click="oem()" class="relative px-4 py-2 text-xs text-white capitalize bg-teal-700 outline-none focus:outline-none hover:bg-teal-600">
                oem 
                 <span class="absolute top-0 mx-1 -mt-3 text-green-400 bg-white rounded-full" v-if="form.part_type_id == 1">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                </span>
            </button>
            <button type="button" @click="aftermark()" class="relative px-4 py-2 mx-2 text-xs text-white capitalize bg-teal-700 outline-none focus:outline-none hover:bg-teal-600">
                aftermarket
                <span class="absolute top-0 mx-1 -mt-3 text-green-400 bg-white rounded-full" v-if="form.part_type_id == 2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                </span>
            </button>
            <button type="button" @click="used()" class="relative px-4 py-2 text-xs text-white capitalize bg-teal-700 outline-none focus:outline-none hover:bg-teal-600">
                used    
                <span class="absolute top-0 mx-1 -mt-3 text-green-400 bg-white rounded-full" v-if="form.part_type_id == 3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                </span>            
            </button>
        </div>

        <div class="flex items-center px-4">
            <h1 class="text-sm text-teal-900">{{__('quantity')}}:</h1>
            <button type="button" @click="increment()" class="text-white bg-teal-500">
                <svg class="w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
            </button>

            <span class="flex items-center py-2 mx-2 bg-white">{{calcQuantity}}</span>
            <input type="text" v-model="quantity" hidden >

            <button type="button" @click="decrement()" class="my-2 text-white bg-teal-500" :disabled="calcQuantity == 1">
                <svg class="w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">    
                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        
        <p class="px-4 py-5 text-xs text-gray-600">{{$page.locale == 'en' ? part.description : part.description_ar}}</p>

         <div class="flex items-center justify-between px-4 py-4 md:hidden">
             <a href="/store" class="flex items-center text-sm font-medium text-teal-700 whitespace-no-wrap rounded focus:outline-none hover:underline">
                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                <span class="mx-2">{{__('Back To Shop')}}</span>
            </a>
            <button @click="addCart(part)" class="flex items-center justify-center text-sm font-medium text-teal-700 capitalize rounded outline-none focus:outline-none">
               {{__('add to cart')}}
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 shopping-cart">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                </svg>                
            </button>
        </div>
    </form>
    </div>

   <div v-if="toggleModal" class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
        <div class="relative w-full max-w-sm mx-auto my-6">        
          <div class="relative flex flex-col w-full outline-none focus:outline-none">          
            <div class="flex-auto p-6 -m-10">            
                <div class="">
                    <div>
                        <main class="">
                            <div class="px-6 py-8 mt-16 bg-white shadow-lg">
                                <div class="flex justify-between">
                                    <h3 class="text-2xl font-medium text-teal-800">{{__('Checkout')}}</h3>
                                    <button class="outline-none focus:outline-none" @click="toggleModal = !toggleModal">X</button>
                                </div>   
                                <div>
                                    <div>
                                   <form class="pb-4 mt-8" @submit.prevent="submit">
                                        <div class="mt-8">
                                            <h4 class="text-sm font-medium text-teal-700">{{__('name')}}</h4>
                                            <div class="flex mt-6">
                                                <label class="flex-1 block">
                                                    <input type="text" name="customer_name" v-model="modelForm.customer_name" :error="$page.errors.customer_name" class="block w-full mt-1 text-gray-700 form-input" :placeholder="__('name')" required>
                                                    <span class="mt-4 text-xs text-red-500" v-if="$page.errors.customer_name">{{ $page.errors.customer_name[0] }}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mt-8">
                                            <h4 class="text-sm font-medium text-teal-700">{{__('Delivery address')}}</h4>
                                            <div class="flex mt-6">
                                                <label class="flex-1 block">
                                                    <input type="text" name="customer_address" v-model="modelForm.customer_address" :error="$page.errors.customer_address" class="block w-full mt-1 text-gray-700 form-input" :placeholder="__('Address')" required>
                                                    <span class="mt-4 text-xs text-red-500" v-if="$page.errors.customer_address">{{ $page.errors.customer_address[0] }}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mt-8">
                                            <h4 class="text-sm font-medium text-teal-700">{{__('Phone')}}</h4>
                                            <div class="flex mt-6">
                                                <label class="block w-3/12">
                                                    <select class="block w-full mt-1 text-gray-700 form-select">
                                                        <option>+974</option>
                                                    </select>
                                                </label>
                                                <label class="flex-1 block ml-3">
                                                    <input type="number" name="customer_phone" v-model="modelForm.customer_phone" :error="$page.errors.customer_phone" class="block w-full mt-1 text-gray-700 form-input" placeholder="your number" required>
                                                    <span class="mt-4 text-xs text-red-500" v-if="$page.errors.customer_phone">{{ $page.errors.customer_phone[0] }}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between mt-8">
                                            <a href="/store" class="flex items-center text-sm font-medium text-teal-700 rounded hover:underline focus:outline-none">
                                                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                                                <span class="mx-2">{{__('Back To Shop')}}</span>
                                            </a>
                                            <button class="flex items-center px-3 py-2 text-sm font-medium text-white bg-teal-800 rounded-md hover:bg-teal-700 focus:outline-none focus:bg-teal-700">
                                                <span>{{__('Payment')}}</span>
                                                <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
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
    <div v-if="toggleModal" class="fixed inset-0 z-40 bg-black opacity-25"></div>
    
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
            'cartItem',
            'latest_category',
            ],
        data() {
            return {
                img:'',
                toggleModal:false,
                quantity:1,                
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
            this.img = this.part.url[0]
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
                this.$inertia.post('/store/orders/zeroprice', both);
            },
            
        addCart() {
            const form =this.form;
            
            const item = this.cartItem;

            const both = Object.assign(form , item);

            if (this.cartItem != null && this.cartItem.attributes['part_type_id'] == this.form.part_type_id) {
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
        },
        changImage(url)
        {
            this.img = url
        }
    },
    }
</script>

<style>
#st-1{
    z-index: 0;
}

</style>