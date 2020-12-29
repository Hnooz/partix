<template>
    <store-layout>
    <BaseNav :cartItemQuantity="cartQuantity" :cartItem="cartCollection" :cartTotalPrice="cartTotalPrice" />

    <SelectSection />

    <!-- filter search -->
    <div class="bg-teal-700 py-5 hidden md:block">
        <div class="capitalize container flex font-semibold items-center justify-between mx-auto px-10 text-white">
            <div>
                <div class="flex">
                
                <span class="font-normal capitalize">&nbsp;{{$page.locale == 'en' ? category.super_category.name : category.super_category.name_ar}}&nbsp;</span> 
                <span lass="font-normal capitalize"> | {{$page.locale == 'en' ? category.name : category.name_ar}}</span>
            </div>
                
            </div>
            <div>
                <form>
                    <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </span>
                    <input type="search" v-model="search" class="bg-teal-900 focus:outline-none px-10 placeholder-gray-400 py-2 rounded-md text-sm text-white" :placeholder="__('search')" autocomplete="off">
                    </div>
                </form>
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
            <input type="search" v-model="search" class="bg-transparent border-b focus:outline-none placeholder-white px-10 py-2 text-sm text-white w-full" :placeholder="__('search')" autocomplete="off">
            </div>
        </form>
    </div>
        <!-- main section -->
    <div class="container grid grid-cols-2 md:grid-cols-4 md:px-16 mx-auto py-10">            
        <div class="bg-white mb-10 mx-3 overflow-hidden md:rounded-tr-lg shadow-lg rounded-lg" v-for="(part, index) in filteredList" :key="index">
            <div class="flex justify-between" :class="part.sale > 0 ? '':'pt-12'">

                <p v-if="part.sale > 0" class="bg-teal-400 font-semibold h-12 md:px-1 md:rounded-none px-2 py-3 rounded-bl-full shadow-lg text-sm text-white w-12">-{{part.sale}}%</p>
            </div>
            
            <a :href="`/store/details/${part.id}`">
                <img v-if="!part.url[0]" class="h-24 mt-12 mx-auto object-cover object-center w-24" src="../../images/oops-404-error-with-a-broken-robot-animate.svg" alt="noo">
                <img v-else class="h-24 mt-12 mx-auto object-cover object-center w-24" :src="part.url[0]">
            </a>

            <div class="px-4 py-2">
                <a :href="`/store/details/${part.id}`" class="font-bold text-sm md:text-base text-teal-500 uppercase">{{$page.locale == 'en' ?  part.name : part.name_ar}}</a>
                <!-- <p class="break-all font-medium text-gray-600 text-xs">{{part.brands.name}}</p> -->
                <p class="text-gray-800 md:text-xl font-semibold">{{part.price}}&nbsp;<span class="px-2 text-gray-500 text-sm">{{__('QAR')}}</span></p>
            </div>

            <div class="bg-teal-700 py-2">
                <button type="button" @click="addCart(part)" class="flex md:hidden focus:outline-none font-semibold items-center justify-around outline-none px-2 py-1 rounded text-white md:text-xs uppercase w-full">
                    {{__('Buy')}}
                </button>

                <button type="button" @click="addCart(part)" class="md:flex hidden focus:outline-none font-semibold items-center justify-around outline-none px-2 py-1 rounded text-white text-xs uppercase w-full">
                    {{__('add to cart')}}
                    <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-6">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                </button>
            </div>
        </div>
        
    </div>

        <p v-if="parts.length == 0" class="capitalize text-2xl text-center text-teal-500 tran">{{__('there is no parts in this category')}}~_~!</p>
        <div v-if="parts.length == 0" class="flex justify-center mb-10">
            <img class="w-70 h-70" src="../../images/empty-animate.svg" alt="">
        </div>

<BaseFooter/>
    </store-layout>
</template>

<script>
import StoreLayout from '../../Shared/StoreLayout'
import BaseNav from "../../components/UI/BaseNav";
import SelectSection from '../../components/UI/SelectSection'
import BaseFooter from '../../components/UI/BaseFooter'
export default {
    components: {
        StoreLayout,
        BaseNav,
        SelectSection,
        BaseFooter,
        
    },
    props:['parts', 'category', 'cartQuantity', 'cartCollection', 'cartTotalPrice'],
    data() {
        return {
            search:'',
        }
    },

    computed: {
    filteredList() {
      return this.parts.filter(part => {
        return part.name.toLowerCase().includes(this.search.toLowerCase())
      })
    }
  },

    methods: {
        addCart(part) {
        this.$inertia.post('/store/carts', part);
        },

    },
}
</script>
