<template>
    <div :dir="this.$page.locale == 'ar' ? 'rtl' : 'ltr'">
        <BaseNav/>
        <SelectSection/>

         <!-- filter search -->
        <div class="bg-teal-700 py-5">
            <h1 class="capitalize text-2xl sm:text-4xl text-center text-white">
                {{__('car parts')}} <span class="font-semibold">{{__('catalogue')}}</span> 
            </h1>
        </div>

        <div class="flex overflow-x-auto">
            <Multislide class="max-w-5xl mx-auto">
                <div class="flex my-6">
                    <Slide class="max-w-sm" :arrows="true" :slidesToShow=3>
                        <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-1.png" alt=""></div>
                        <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-2.png" alt=""></div>
                        <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-3.png" alt=""></div>
                        <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-2.png" alt=""></div>
                        <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-3.png" alt=""></div>      
                    </Slide> 
                </div>
            </Multislide>
        </div>
            
        <div class="bg-teal-700 py-5">
            <div class="capitalize container sm:flex font-semibold items-center justify-between mx-auto px-10 text-white">
                <h1>{{__('filters')}} | <span class="font-normal lowercase" dir="auto">{{__('oil filters')}}</span></h1>

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
            <div class="bg-white rounded-t-lg shadow-lg max-w-xs w-full inline-block overflow-hidden mx-4" v-for="(item, index) in filteredList" :key="index">
                <div class="flex justify-between">

                    <svg @click="fave(item)" v-if="item.fav == false" class="h-6 m-2 mx-4 text-gray-400 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor" />
                    </svg>

                    <svg @click="fave(item)" v-if="item.fav == true" class="h-6 m-2 mx-4 text-red-600 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                    </svg>

                    <p class="bg-teal-400  font-semibold h-12 px-1 py-3 shadow-lg text-white w-12">-26%</p>
                </div>
                
                <a href="/details">
                    <img class="h-24 mt-12 mx-auto object-cover object-center w-24" src="../../images/10102.png" alt="item name">
                </a>

                <div class="px-4 py-2">
                    <a href="/details" class="font-bold text-teal-500 uppercase">Oil Test</a>
                    <p class="break-all font-medium text-gray-600 text-xs "><span dir="auto">{{__('item number')}}</span>:&nbsp;245166h</p>
                    <p class="text-gray-800 text-xl font-semibold">3.800&nbsp;<span class="px-2 text-gray-500 text-sm">QAR</span></p>
                </div>

                <div class="bg-teal-700 py-2">
                    <a href="#" class="flex focus:outline-none font-semibold items-center justify-around outline-none px-2 py-1 rounded text-white text-xs uppercase w-full">
                        {{__('Buy')}}
                    </a>
                </div>
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
    data() {
    return {
        search:'',
        showModal: false,
        items:[
                {name:'test1',fav:true},
                {name:'test2',fav:false},{name:'test2',fav:false},
                {name:'test3',fav:true},{name:'test1',fav:false},
                {name:'test1',fav:true},{name:'test1',fav:true},
            ],
       categories:[
            {
            img:require('../../images/10102.png'), name:'break system',
            sideCategory:[
                {name:'test 1', img:require('../../images/10102.png')},
                {name:'test 1', img:require('../../images/10102.png')},
                {name:'test 1', img:require('../../images/10102.png')},
                {name:'test 1', img:require('../../images/10102.png')}
            ]
            },

            {
            img:require('../../images/10102.png'), name:'oil system',
            sideCategory:[
                {name:'test 9', img:require('../../images/10102.png')},
                {name:'test 9', img:require('../../images/10102.png')},
                {name:'test 9', img:require('../../images/10102.png')},
                {name:'test 9', img:require('../../images/10102.png')}
            ]
            },

            {
            img:require('../../images/10102.png'), name:'food system',
            sideCategory:[
                {name:'test 10', img:require('../../images/10102.png')},
                {name:'test 10', img:require('../../images/10102.png')},
                {name:'test 10', img:require('../../images/10102.png')},
                {name:'test 10', img:require('../../images/10102.png')}
            ]
            },

            {
            img:require('../../images/10102.png'), name:'food system',
            sideCategory:[
                {name:'test 10', img:require('../../images/10102.png')},
                {name:'test 10', img:require('../../images/10102.png')},
                {name:'test 10', img:require('../../images/10102.png')},
                {name:'test 10', img:require('../../images/10102.png')}
            ]
            },

            {
            img:require('../../images/10102.png'), name:'food system',
            sideCategory:[
                {name:'test 10', img:require('../../images/10102.png')},
                {name:'test 10', img:require('../../images/10102.png')},
                {name:'test 10', img:require('../../images/10102.png')},
                {name:'test 10', img:require('../../images/10102.png')}
            ]
            },

            {
            img:require('../../images/10102.png'), name:'test system',
            sideCategory:[
                {name:'test 8', img:require('../../images/10102.png')},
                {name:'test 8', img:require('../../images/10102.png')},
                {name:'test 8', img:require('../../images/10102.png')},
                {name:'test 8', img:require('../../images/10102.png')}
            ]
            }
       ]
    }
},
computed: {
    filteredList() {
      return this.items.filter(item => {
        return item.name.toLowerCase().includes(this.search.toLowerCase())
      })
    }
  },
methods: {
    toggleModal(){
      this.showModal = !this.showModal;
    },
    closeModal(){
      this.showModal = !this.showModal;
    },
    fave(item){
            item.fav = !item.fav
        }
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