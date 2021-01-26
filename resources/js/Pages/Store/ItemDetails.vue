<template>
    <store-layout>
    <BaseNav 
        :cartItemQuantity="cartQuantity" :cartItem="cartCollection" 
        :cartTotalPrice="cartTotalPrice" :wishlistQuantity="wishlistQuantity" 
        :wishlistContent="wishlistContent"/>
    <!-- <SelectSection /> -->
         <!-- filter search -->
    <div class="bg-teal-800 py-5 hidden md:block">
        <div class="capitalize container flex font-semibold items-center justify-between mx-auto px-16 text-white">
            <div class="flex">
                <h1 v-if="part.category != null">{{$page.locale == 'en' ? part.category.super_category.name : part.category.super_category.name_ar}} |</h1>
                <a :href="'/store/items/'+part.category_id" class="font-normal capitalize" v-if="part.category != null">&nbsp;{{$page.locale == 'en' ? part.category.name : part.category.name_ar}}&nbsp;</a> 
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

    <div class="container max-w-6xl mb-20 md:mx-auto mt-16 py-4 hidden md:block">
        <div class="flex justify-between">
            <div>
                <div class="flex">
                    <div>
                        <div class="bg-white flex h-70 items-center justify-center w-70">
                            <img class="h-full object-center object-cover w-full" :src="img" alt="">
                        </div>
                       <div class="flex justify-around mt-6">
                        <slide-image class="max-w-xs" :arrows="true" :slidesToShow=2>
                            <div class="flex justify-center bg-white mx-2" v-for="url in part.url" :key="url.index">
                                <img class="h-12 mx-auto my-2 object-center object-cover w-12" :src="url" alt="" @click="changImage(url)">
                            </div>
                        </slide-image> 
                       </div>
                    </div>
                    <div class="mx-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="capitalize font-semibold text-3xl text-teal-700">{{$page.locale == 'en' ? part.name : part.name_ar}}</p>                              
                                <p class="capitalize font-medium text-teal-400 text-xl" v-if="part.cars.length > 0">{{$page.locale == 'en' ? part.cars[0].brand : part.cars[0].brand_ar}}</p>                            
                            </div>
                        </div>
                        <div class="">
                            <p class="bg-blue-100 my-5 p-5 text-gray-600 text-sm">
                                {{$page.locale == 'en' ? part.description : part.description_ar}}
                            </p>
                        </div>
                        <div>
                            <h1 v-if="part.cars.length > 0">
                                <span class="bg-white leading-10 mx-1 px-3 py-2 rounded-full text-gray-600" v-for="car in part.cars" :key="car.id">{{$page.locale == 'en' ? car.brand : car.brand_ar}}</span>
                            </h1>
                        </div>
                        <form @submit.prevent="submit">
                            <div class="my-4">
                                <h1 class="text-red-500 text-sm"><span class="capitalize text-base text-gray-600">{{__('hint')}}:</span> {{__('you can order directly if part type price = 0')}}</h1>
                                <h1 class="capitalize my-3 text-gray-600">{{__('chose type')}} :</h1>
                                <button type="button" @click="oem()" class="border-2 border-gray-800 capitalize focus:outline-none hover:bg-gray-800 hover:text-white outline-none px-3 py-1 rounded-lg text-gray-800">oem {{part.oem_price}}$</button>
                                <button type="button" @click="aftermark()" class="border-2 border-gray-800 capitalize focus:outline-none hover:bg-gray-800 hover:text-white outline-none my-3 px-3 py-1 rounded-lg text-gray-800">aftermarket {{part.aftermarket_price}}$</button>
                                <button type="button" @click="used()" class="border-2 border-gray-800 capitalize focus:outline-none hover:bg-gray-800 hover:text-white outline-none px-3 py-1 rounded-lg text-gray-800">used {{part.used_price}}$</button>
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
            <div class="my-3">
                <span class="bg-blue-100 leading-10 mx-1 px-3 py-2 rounded-full text-sm text-gray-600" v-for="car in part.cars" :key="car.id">{{$page.locale == 'en' ? car.brand : car.brand_ar}}</span>
            </div>                           
            <p class="font-semibold md:text-xl text-gray-800 text-xs" v-if="form.part_type_id == 1">
                {{calcOemPrice}} <span class="text-gray-500 text-xs">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="line-through px-2 text-gray-500 text-xs">{{part.oem_price}} {{__('QAR')}}</span> 
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
            <h1 class="text-red-500 text-xs"><span class="capitalize text-sm text-gray-600">{{__('hint')}}:</span> {{__('you can order directly if part type price = 0')}}</h1>
            <h1 class="capitalize text-gray-600 text-sm">{{__('chose type')}} :</h1>
            <button type="button" @click="oem()" class="border-2 border-gray-800 capitalize focus:outline-none hover:bg-gray-800 hover:text-white outline-none px-3 py-1 rounded-lg text-gray-800 text-xs">oem {{part.oem_price}}$</button>
            <button type="button" @click="aftermark()" class="border-2 border-gray-800 capitalize focus:outline-none hover:bg-gray-800 hover:text-white outline-none my-2 px-3 py-1 rounded-lg text-gray-800 text-xs">aftermarket {{part.aftermarket_price}}$</button>
            <button type="button" @click="used()" class="block border-2 border-gray-800 capitalize focus:outline-none hover:bg-gray-800 hover:text-white outline-none px-3 py-1 rounded-lg text-gray-800 text-xs">used {{part.used_price}}$</button>
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

         <div class="flex items-center justify-between md:hidden px-4 py-4">
             <a href="/store" class="flex focus:outline-none font-medium hover:underline items-center rounded text-sm text-teal-700 whitespace-no-wrap">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                <span class="mx-2">{{__('Back To Shop')}}</span>
            </a>
            <button @click="addCart(part)" class="capitalize flex focus:outline-none font-medium items-center justify-center outline-none rounded text-sm text-teal-700">
               {{__('add to cart')}}
                <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-6">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                </svg>                
            </button>
        </div>
    </form>
    </div>

   <div v-if="toggleModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
        <div class="max-w-sm mx-auto my-6 relative w-full">        
          <div class="relative flex flex-col w-full outline-none focus:outline-none">          
            <div class="-m-10 p-6 flex-auto">            
                <div class="">
                    <div>
                        <main class="">
                            <div class="bg-white mt-16 px-6 py-8 shadow-lg">
                                <div class="flex justify-between">
                                    <h3 class="text-teal-800 text-2xl font-medium">{{__('Checkout')}}</h3>
                                    <button class="focus:outline-none outline-none" @click="toggleModal = !toggleModal">X</button>
                                </div>   
                                <div>
                                    <div>
                                   <form class="mt-8 pb-4" @submit.prevent="submit">
                                        <div class="mt-8">
                                            <h4 class="text-sm text-teal-700 font-medium">{{__('name')}}</h4>
                                            <div class="mt-6 flex">
                                                <label class="block flex-1">
                                                    <input type="text" name="customer_name" v-model="modelForm.customer_name" :error="$page.errors.customer_name" class="form-input mt-1 block w-full text-gray-700" :placeholder="__('name')" required>
                                                    <span class="text-red-500 text-xs mt-4" v-if="$page.errors.customer_name">{{ $page.errors.customer_name[0] }}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mt-8">
                                            <h4 class="text-sm text-teal-700 font-medium">{{__('Delivery address')}}</h4>
                                            <div class="mt-6 flex">
                                                <label class="block flex-1">
                                                    <input type="text" name="customer_address" v-model="modelForm.customer_address" :error="$page.errors.customer_address" class="form-input mt-1 block w-full text-gray-700" :placeholder="__('Address')" required>
                                                    <span class="text-red-500 text-xs mt-4" v-if="$page.errors.customer_address">{{ $page.errors.customer_address[0] }}</span>
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
                                                    <span class="text-red-500 text-xs mt-4" v-if="$page.errors.customer_phone">{{ $page.errors.customer_phone[0] }}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mt-8">
                                            <h4 class="text-sm text-teal-700 font-medium capitalize">{{__('coupon code')}}</h4>
                                            <div class="mt-6 flex">
                                                <label class="block flex-1">
                                                    <input type="text" name="coupon" v-model="modelForm.coupon" :error="$page.errors.coupon" class="form-input mt-1 block w-full text-gray-700" :placeholder="__('add promocode')">
                                                    <span class="text-red-500 text-xs mt-4" v-if="$page.errors.coupon">{{ $page.errors.coupon[0] }}</span>
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