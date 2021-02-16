<template>
    <store-layout>
    <BaseNav />

    <SelectSection />

    <!-- filter search -->
    <div class="hidden py-5 bg-teal-700 md:block">
        <div class="container flex items-center justify-between px-10 mx-auto font-semibold text-white capitalize">
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
                        <button type="submit" class="p-1 text-gray-400 focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </span>
                    <input type="search" v-model="search" class="px-10 py-2 text-sm text-white placeholder-gray-400 bg-teal-900 rounded-md focus:outline-none" :placeholder="__('search')" autocomplete="off">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- mobile view search -->
    <div class="md:hidden">
        <form class="px-8 py-3 bg-teal-500">
            <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <button type="submit" class="p-1 text-white focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </span>
            <input type="search" v-model="search" class="w-full px-10 py-2 text-sm text-white placeholder-white bg-transparent border-b focus:outline-none" :placeholder="__('search')" autocomplete="off">
            </div>
        </form>
    </div>
        <!-- main section -->
    <div class="container grid grid-cols-2 py-10 mx-auto md:grid-cols-4 md:px-16">
        <div class="mx-3 mb-10 overflow-hidden bg-white rounded-lg shadow-lg md:rounded-tr-lg" v-for="(part, index) in filteredList" :key="index">
            <div class="pb-12" >
                <button type="button" @click="addWishlist(part)"  class="float-left w-12 h-12 px-2 py-3 outline-none focus:outline-none">
                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                </button>
                <p v-if="part.sale > 0" class="float-right w-12 h-12 px-2 py-3 text-sm font-semibold text-white bg-teal-400 rounded-br-lg shadow-lg md:px-1 md:rounded-none">-{{part.sale}}%</p>
            </div>
            
            <a :href="`/store/details/${part.id}`" class="h-24">
                <img v-if="!part.url[0]" class="object-contain h-24 px-16 mt-12" src="../../images/LOGO-1.png" alt="noo">
                <img v-else class="object-cover object-center w-20 h-20 mx-auto md:h-24 md:mt-12 md:w-24" :src="part.url[0]">
            </a>

           <div class="px-4 py-2">
                <a :href="`/store/details/${part.id}`" class="text-xs font-bold text-teal-500 capitalize md:text-base">{{$page.locale == 'en' ? part.name : part.name_ar}}</a>                
                <p class="text-xs font-medium text-gray-600 break-all "><span dir="auto">{{__('number')}}:</span>{{part.number}}</p>
                 <div class="flex items-center">
                    <p v-if="part.part_type_id == '1'" class="text-gray-600">{{part.oem_price}} <span>{{__('QAR')}}</span> </p>
                    <p v-if="part.part_type_id == '2'" class="text-gray-600">{{part.aftermarket_price}} <span>{{__('QAR')}}</span> </p>
                    <p v-if="part.part_type_id == '3'" class="text-gray-600">{{part.used_price}} <span>{{__('QAR')}}</span> </p>
                </div>
            </div>

            <div class="py-2 bg-teal-700">
                <button type="button" @click="addCart(part)" class="flex items-center justify-around w-full px-2 py-1 text-xs font-semibold text-white capitalize rounded outline-none md:hidden focus:outline-none">
                    {{__('Buy')}}
                </button>

                <button type="button" @click="addCart(part)" class="items-center justify-around hidden w-full px-2 py-1 text-xs font-semibold text-white uppercase rounded outline-none md:flex focus:outline-none">
                    {{__('add to cart')}}
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 shopping-cart">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <paginator-component :data="parts"></paginator-component>

    <p v-if="parts.data.length == 0" class="text-2xl text-center text-teal-500 capitalize tran">{{__('there is no parts in this category')}}~_~!
         <br>
    please order directly from <a href="https://thepartix.com/" class="underline">partixq</a>
    </p>
    <div v-if="parts.data.length == 0" class="flex justify-center mb-10">
        <img class="w-70 h-70" src="../../images/empty-animate.svg" alt="">
    </div>

<BaseFooter/>
    </store-layout>
</template>

<script>
import StoreLayout from '../../Shared/StoreLayout'
import BaseNav from "../../components/UI/BaseNav";
import PaginatorComponent from "../../components/PaginatorComponent";
import SelectSection from '../../components/UI/SelectSection'
import BaseFooter from '../../components/UI/BaseFooter'
export default {
    components: {
        StoreLayout,
        BaseNav,
        PaginatorComponent,
        SelectSection,
        BaseFooter,
        
    },
    props:['parts', 'category',],
    data() {
        return {
            search:'',
        }
    },

    computed: {
        filteredList() {
            return this.parts.data.filter(part => {
                return part.name.toLowerCase().includes(this.search.toLowerCase())
            })
        },
    },

    methods: {
        addCart(part) {
            this.$inertia.post('/store/carts', part);
        },
        addWishlist(part) 
        {            
            this.$inertia.post('/store/wishlist', part);
        },
    },
}
</script>
