<template>
    <div :dir="this.$page.locale == 'ar' ? 'rtl' : 'ltr'">
        <BaseNav :cartItemQuantity="cartQuantity" :cartItem="cartCollection" :cartTotalPrice="cartTotalPrice" />
        <SelectSection :carItem="cars"/>

         <!-- filter search -->
        <div class="bg-teal-700 py-5">
            <h1 class="capitalize text-2xl sm:text-4xl text-center text-white">
                {{__('car parts')}} <span class="font-semibold">{{__('catalogue')}}</span> 
            </h1>
        </div>

        <div class="flex overflow-x-auto">
            <Multislide class="max-w-5xl mx-auto" :super_category="super_category" :categories="categories">
                <!-- <div class="flex justify-center my-6">
                    <Slide class="max-w-sm" :arrows="true" :slidesToShow=3>
                        <div class="flex justify-center bg-white mx-2" v-for="category in categories" :key="category.index">
                            <img class="h-12 mx-auto my-2 object-center object-cover w-12" :src="category.url[0]" alt=""></div>
                        <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-2.png" alt=""></div>
                        <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-3.png" alt=""></div>
                        <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-2.png" alt=""></div>
                        <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-3.png" alt=""></div>      
                    </Slide> 
                </div> -->
            </Multislide>
        </div>
            
        <div class="bg-teal-700 py-5">
            <div class="capitalize container sm:flex font-semibold items-center justify-between mx-auto px-10 text-white">
                <h1>{{__('Home')}}</h1>

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
                     <div class="flex justify-between">

                    <p class="bg-teal-400  font-semibold h-12 px-1 py-3 shadow-lg text-white w-12">-26%</p>
                    </div>
                    
                    <a :href="'/details/' + part.id">
                        <img class="h-24 mt-12 mx-auto object-cover object-center w-24" :src="part.url[0]" alt="item name">
                    </a>

                    <div class="px-4 py-2">
                        <a :href="'/details/' + part.id" class="font-bold text-teal-500 uppercase">{{part.name}}</a>
                        <p class="break-all font-medium text-gray-600 text-xs "><span dir="auto">{{__('item number')}}</span>{{part.number}}</p>
                        <p class="text-gray-800 text-xl font-semibold">{{part.price}}<span class="px-2 text-gray-500 text-sm">QAR</span></p>
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
            <a class="bg-teal-400 capitalize font-semibold mb-10 px-10 py-2 text-white z-10 overflow-visible" href="/items">
                {{__('show all')}}
            </a>
        </div>

        <BaseFooter/>
    </div>
</template>

<script>
import BaseNav from "../../components/UI/BaseNav";
import SelectSection from '../../components/UI/SelectSection'
import Slide from '../../components/UI/Slide'
import BaseFooter from '../../components/UI/BaseFooter'
import Multislide from '../../components/UI/Multislide'
import ToggleMenu from "../../components/UI/ToggleMenu";

export default {
    components: {
        BaseNav,
        SelectSection,
        Slide,
        Multislide,
        BaseFooter,
        ToggleMenu
        },
        props:['parts', 'cars', 'cartQuantity', 'cartCollection','cartTotalPrice', 'categories', 'super_category'],
    data() {
    return {
        search:'',
        showModal: false,
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
        // console.log(true);
        this.$inertia.post('/carts', part);
    },
    toggleModal(){
      this.showModal = !this.showModal;
    },
    closeModal(){
      this.showModal = !this.showModal;
    },
    // fave(item){
    //         item.fav = !item.fav
    //     }
  },
}

</script>

<style >
.itemImage{
    background-image: url('../../images/car.jpeg');
}   
 .slick-slide{
  margin-left:5px;
  margin-right: 5px;
}
</style>