<template>
    <div :dir="this.$page.locale == 'ar' ? 'rtl' : 'ltr'">
        <store-layout>
        <BaseNav 
            :cartItemQuantity="cartQuantity" :cartItem="cartCollection" 
            :cartTotalPrice="cartTotalPrice" 
            :wishlistQuantity="wishlistQuantity" 
            :wishlistContent="wishlistContent"/>
        <SelectSection/>

         <!-- filter search -->
        <div class="bg-teal-700 py-5">
            <h1 class="capitalize text-2xl sm:text-4xl text-center text-white font-medium">
                {{__('car parts catalogue')}}
            </h1>
        </div>

        <div class="flex overflow-x-auto">
            <Multislide class="max-w-xs md:max-w-6xl mx-auto" :super_category="super_category" :categories="categories">
                <template v-slot="slotProps">
                    <div class="md:max-w-2xl mx-auto">
                        <Slide  class="my-12" :slidesToShow="3" :arrows="true" :categories="categories" :super_category="slotProps.super_id" />
                    </div>
                </template>
            </Multislide>
        </div>
            
        <div class="bg-teal-700 py-5">
            <div class="capitalize container sm:flex font-semibold items-center justify-between mx-auto px-10 text-white">
                <h1>{{__('home')}}</h1>

                <form class="mt-2 sm:mt-0">
                    <div class="relative">
                        <span class="absolute inset-y-0  flex items-center px-2">
                            <button type="submit" class="p-1 focus:outline-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </span>
                        <input type="search" v-model="search" class="w-full bg-teal-900 focus:outline-none px-10 placeholder-gray-400 py-2 rounded-md text-sm text-white" :placeholder="__('search')" autocomplete="off">
                    </div>
                </form>
            </div>
        </div>

        <div class="max-w-6xl container mx-auto mt-10 overflow-auto whitespace-no-wrap">
            <div class="bg-white rounded-t-lg shadow-lg max-w-xs w-full inline-block overflow-hidden mx-4" v-for="(part, index) in filteredList" :key="index">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="pb-12" >
                        <button type="button" @click="addWishlist(part)" class="float-left px-2 py-3 h-12 w-12 focus:outline-none outline-none">
                            <svg  :class="wishlist ? 'text-red-600' : 'text-gray-600'" class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor" />
                            </svg>
                        </button>
                        <p v-if="part.sale > 0" class="float-right bg-teal-400 font-semibold h-12 md:px-1 md:rounded-none px-2 py-3 rounded-br-lg shadow-lg text-sm text-white w-12">-{{part.sale}}%</p>
                    </div>
                    
                    <a :href="'/store/details/' + part.id">
                        <img v-if="!part.url[0]" class="h-24 mt-12 mx-auto object-cover object-center w-24" src="../../images/oops-404-error-with-a-broken-robot-animate.svg" alt="noo">
                        <img v-else class="h-24 mt-12 mx-auto object-cover object-center w-24" :src="part.url[0]">
                    </a>

                    <div class="px-4 py-2">
                        <a :href="'/store/details/' + part.id" class="font-bold text-teal-500 uppercase">{{$page.locale == 'en' ? part.name : part.name_ar}}</a>
                        <p class="break-all font-medium text-gray-600 text-xs">{{$page.locale == 'en' ? part.cars[0].brand : part.cars[0].brand_ar}}</p>
                        <p class="break-all font-medium text-gray-600 text-xs "><span dir="auto">{{__('number')}}:</span>{{part.number}}</p>
                        <div class="flex items-center">
                            <p class="text-gray-800 text-xl font-semibold">{{calcOemPrice[0]}}<span class="px-2 text-gray-500 text-sm">{{__('QAR')}}</span></p>
                            <p v-if="part.sale > 0" class="line-through  text-gray-600">{{part.oem_price}} <span>{{__('QAR')}}</span> </p>
                        </div>
                    </div>
                    <input type="text" name="supplier_id"  hidden>
                    <div class="bg-teal-700 py-2">
                        <button type="button" @click="addCart(part)" class="flex focus:outline-none font-semibold items-center justify-around outline-none px-2 py-1 rounded text-white text-xs uppercase w-full">
                            {{__('Buy')}}
                        </button>
                    </div>
                </form>
               

            </div>
        </div>

        <div class="mt-8 container flex justify-center">
            <a class="bg-teal-400 capitalize font-semibold mb-10 px-10 py-2 text-white z-10 overflow-visible" href="/store/items">
                {{__('show all')}}
            </a>
        </div>

        <BaseFooter/>
        </store-layout>
    </div>
</template>

<script>
import BaseNav from "../../components/UI/BaseNav";
import SelectSection from '../../components/UI/SelectSection'
import Slide from '../../components/UI/Slide'
import BaseFooter from '../../components/UI/BaseFooter'
import Multislide from '../../components/UI/Multislide'
import StoreLayout from '../../Shared/StoreLayout.vue'

export default {
    components: {
        BaseNav,
        SelectSection,
        Slide,
        Multislide,
        BaseFooter,
        StoreLayout
        },
        props:[
            'parts', 'cartQuantity', 'cartCollection',
            'cartTotalPrice', 'categories', 
            'super_category','wishlistQuantity',
            'wishlistContent'
        ],
    data() {
    return {
        search:'',
        wishlist:false,
    }
},


computed: {
    filteredList() {
      return this.parts.filter(part => {
        return part.name.toLowerCase().includes(this.search.toLowerCase()) || part.number.includes(this.search) || part.name_ar.includes(this.search);
      })
    },
    calcOemPrice()
    {
        return this.parts.map(part => {
            if (part.sale) {                    
            return  (part.oem_price - ((part.sale / 100) * part.oem_price)).toFixed();
            }
            return  (part.oem_price - (part.category.sale / 100) * part.oem_price).toFixed();
        })
    },
  },
methods: {
    addCart(part) 
    {
        this.$inertia.post('/store/carts', part);
    },
    addWishlist(part) 
    {
        this.$inertia.post('/store/wishlist', part);
    },
  },
}

</script>

<style >  
 .slick-slide{
  margin-left:5px;
  margin-right: 5px;
}
</style>