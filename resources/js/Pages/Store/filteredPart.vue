<template>
    <store-layout>
    <BaseNav :cartItemQuantity="cartQuantity" :cartItem="cartCollection" />

    <SelectSection :carItem="cars"/>

    <!-- filter search -->
    <div class="bg-teal-700 py-5 hidden md:block">
        <div class="capitalize container flex font-semibold items-center justify-between mx-auto px-10 text-white">
            <div>
                <h1>{{__('filters')}} | <span class="font-normal lowercase" dir="auto">{{__('oil filters')}}</span></h1>
                
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
            <div class="flex justify-between">

                <!-- <svg @click="fave(item)" v-if="item.fav == false" class="h-6 m-2 md:mx-4 text-gray-400 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor" />
                </svg>

                <svg @click="fave(item)" v-if="item.fav == true" class="h-6 m-2 md:mx-4 text-red-600 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                </svg> -->

                <p class="bg-teal-400 font-semibold h-12 md:px-1 md:rounded-none px-2 py-3 rounded-bl-full shadow-lg text-sm text-white w-12">-26%</p>
            </div>
            
            <a :href="`/details/${part.id}`">
                <img class="h-20 md:h-24 md:mt-12 mx-auto object-center object-cover w-20 md:w-24" src="../../images/10102.png" alt="item name">
            </a>

            <div class="px-4 py-2">
                <a :href="`/details/${part.id}`" class="font-bold text-sm md:text-base text-teal-500 uppercase">{{part.name}}</a>
                <p class="break-all font-medium text-gray-600 text-xs">{{__('item number')}}:{{part.number}}</p>
                <p class="text-gray-800 md:text-xl font-semibold">{{part.price}}&nbsp;<span class="px-2 text-gray-500 text-sm">QAR</span></p>
                <!-- <p class="text-gray-600 text-xs">incl. 20% VAT, <span class="text-gray-800 underline">delivery.</span> from &euro;8,45</p> -->
            </div>

            <div class="bg-teal-700 py-2">
                <button type="button" @click="addCart(part)" class="flex md:hidden focus:outline-none font-semibold items-center justify-around outline-none px-2 py-1 rounded text-white md:text-xs uppercase w-full">
                    {{__('Buy')}}
                </button>

                <button type="submit" @click="addCart(part)" class="md:flex hidden focus:outline-none font-semibold items-center justify-around outline-none px-2 py-1 rounded text-white text-xs uppercase w-full">
                    {{__('add to cart')}}
                    <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-6">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                </button>
            </div>
        </div>
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
    props:['parts', 'cars', 'cartQuantity', 'cartCollection'],
    data() {
        return {
            search:'',
            items:[
                {name:'test1',fav:true},
                {name:'test2',fav:false},{name:'test2',fav:false},
                {name:'test3',fav:true},{name:'test1',fav:false},
                {name:'test1',fav:true},{name:'test1',fav:true},
            ]
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
        this.$inertia.post('/carts', part);
        },
    },
}
</script>
