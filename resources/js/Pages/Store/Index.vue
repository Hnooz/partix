<template>
    <div :dir="this.$page.locale == 'ar' ? 'rtl' : 'ltr'">
        <store-layout>
        <BaseNav />
        <SelectSection/>

         <!-- filter search -->
        <div class="py-5 bg-teal-700">
            <h1 class="text-2xl font-medium text-center text-white capitalize sm:text-4xl">
                {{__('car parts catalogue')}}
            </h1>
        </div>
        <div class="flex overflow-x-auto">
            <Multislide class="max-w-xs mx-auto md:max-w-6xl" :super_category="super_category" :categories="categories">
                <template v-slot="slotProps">
                    <div class="mx-auto md:max-w-2xl">
                        <Slide  class="my-12" :slidesToShow="3" :arrows="true" :categories="categories" :super_category="slotProps.super_id" />
                    </div>
                </template>
            </Multislide>
        </div>
            
        <div class="py-5 bg-teal-700">
            <div class="container items-center justify-between px-10 mx-auto font-semibold text-white capitalize sm:flex">
                <h1>{{__('home')}}</h1>

                <form class="mt-2 sm:mt-0">
                    <div class="relative">
                        <span class="absolute inset-y-0 flex items-center px-2">
                            <button type="submit" class="p-1 text-gray-400 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </span>
                        <input type="search" v-model="search" class="w-full px-10 py-2 text-sm text-white placeholder-gray-400 bg-teal-900 rounded-md focus:outline-none" :placeholder="__('search')" autocomplete="off">
                    </div>
                </form>
            </div>
        </div>

        <div class="container max-w-6xl mx-auto mt-10 overflow-auto whitespace-no-wrap">
            <div class="inline-block w-full max-w-xs mx-4 overflow-hidden bg-white rounded-t-lg shadow-lg" v-for="(part, index) in filteredList" :key="index">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="pb-12" >
                        <button type="button" @click="addWishlist(part)"  class="float-left w-12 h-12 px-2 py-3 outline-none focus:outline-none">
                            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                        </button>
                        <p v-if="part.sale > 0" class="float-right w-12 h-12 px-2 py-3 text-sm font-semibold text-white bg-teal-400 rounded-br-lg shadow-lg md:px-1 md:rounded-none">-{{part.sale}}%</p>
                    </div>                    
                    <a :href="'/store/details/' + part.id" class="h-24">
                        <img v-if="!part.url[0]" class="object-contain h-24 px-16 mt-12" src="../../images/LOGO-1.png" alt="noo">
                        <img v-else class="object-cover object-center w-24 h-24 mx-auto mt-12" :src="part.url[0]">
                    </a>
                    <div class="px-4 py-2">
                        <a :href="'/store/details/' + part.id" class="font-bold text-teal-500 uppercase">{{$page.locale == 'en' ? part.name : part.name_ar}}</a>                    
                        <p class="text-xs font-medium text-gray-600 break-all "><span dir="auto">{{__('number')}}:</span>{{part.number}}</p>
                        <div class="flex items-center">                           
                            <p v-if="part.part_type_id == '1'" class="text-gray-600">{{part.oem_price}} <span>{{__('QAR')}}</span> </p>
                            <p v-if="part.part_type_id == '2'" class="text-gray-600">{{part.aftermarket_price}} <span>{{__('QAR')}}</span> </p>
                            <p v-if="part.part_type_id == '3'" class="text-gray-600">{{part.used_price}} <span>{{__('QAR')}}</span> </p>
                        </div>
                    </div>
                    <input type="text" name="supplier_id"  hidden>
                    <div class="py-2 bg-teal-700">
                        <button type="button" @click="addCart(part)" class="flex items-center justify-around w-full px-2 py-1 text-xs font-semibold text-white uppercase rounded outline-none focus:outline-none">
                            {{__('Buy')}}
                        </button>
                    </div>
                </form>               
            </div>
        </div>
        <div class="container flex justify-center mt-8">
            <a class="z-10 px-10 py-2 mb-10 overflow-visible font-semibold text-white capitalize bg-teal-400" href="/store/items">
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
            'parts',
            'categories', 
            'super_category',
        ],
    data() {
    return {
        search:'',
    }
},


computed: {
    filteredList() {
      return this.parts.filter(part => {
        return part.name.toLowerCase().includes(this.search.toLowerCase()) || part.number.includes(this.search) || part.name_ar.includes(this.search);
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