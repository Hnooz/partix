<template>
    <div>
        <BaseNav/>
        <SelectSection/>
        <!-- <div class="">
            <div class="md:flex md:items-center md:mx-0 md:w-full mt-56 mx-5">
                 <img class="md:w-1/2 md:hidden" src="../../images/floating-car.svg" alt="car">
                <div class="md:mx-16 md:w-1/2">
                    <h1 class="font-semibold my-3 mx-1 text-gray-600">SELECT YOUR CAR</h1>

                   

                    <form action="#" class="m-2">
                        <div class=" items-center my-6">
                            <label class="block mt-4">
                                <span class="text-gray-700">Brand</span>
                                <select class="form-select mt-1 block w-full">
                                    <option>Toyota</option>
                                    <option>$5,000</option>
                                    <option>$10,000</option>
                                    <option>$25,000</option>
                                </select>
                            </label>
                        </div>
                        
                        <div class=" items-center my-6">
                            <label class="block mt-4">
                                <span class="text-gray-700">Model</span>
                                <select class="form-select mt-1 block w-full">
                                    <option>Accent</option>
                                    <option>$5,000</option>
                                    <option>$10,000</option>
                                    <option>$25,000</option>
                                </select>
                            </label>
                        </div>
                        
                        <div class=" items-center my-6">
                            <label class="block mt-4">
                                <span class="text-gray-700">Year</span>
                                <select class="form-select mt-1 block w-full">
                                    <option>2014</option>
                                    <option>$5,000</option>
                                    <option>$10,000</option>
                                    <option>$25,000</option>
                                </select>
                            </label>
                        </div>

                        <div class=" items-center my-6">
                            <label class="block mt-4">
                                <span class="text-gray-700">Engine</span>
                                <select class="form-select mt-1 block w-full">
                                    <option>De</option>
                                    <option>BB</option>
                                </select>
                            </label>
                        </div>
                        
                        <input type="submit" value="Search" class="bg-blue-400  py-2 rounded focus:outline-none outline-none text-gray-200 w-full">
                    </form>
                </div>
                <img class="md:w-1/2 hidden md:block" src="../../images/floating-car.svg" alt="car">
            </div>


            <div class="my-24">
                <h1 class="font-semibold md:text-4xl md:text-center mx-3 my-6 text-gray-700">Partix car parts catalogue</h1>
                <div class="md:grid md:grid-cols-4 lg:grid-col-5 md:mx-0 mx-3">
                    <div v-for="(category, index) in categories" :key="index">
                        <ToggleMenu class="md:hidden" :name="category.name" :img="category.img" :side="category.sideCategory">
                            <div  class="bg-white flex items-center md:mx-2 md:my-2 md:text-xs ml-2 pl-3" v-for="(side, index) in category.sideCategory" :key="index">
                                <img :src="side.img" alt="" class="h-12 w-12">
                                <a href="/items" class="font-medium px-2 text-center">{{side.name}}</a>
                            </div>
                        </ToggleMenu>
                        <div class="hidden bg-white md:pr-0 my-3 pr-2 shadow-lg md:mx-1 md:block">
                            <div class=" flex items-center justify-between md:flex-wrap">
                                <div class="flex md:flex-col md:mx-auto md:w-full">
                                    <img :src="category.img" alt="" class="h-12 md:h-32 md:mx-auto md:w-32 w-12"> 
                                    <h1 class="capitalize font-semibold md:bg-blue-400 md:w-full py-3 text-center text-sm text-white">{{category.name}}</h1>
                                </div> 
                                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down h-6 md:hidden w-6"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </div>

                            <div v-for="(item, index) in category.sideCategory" :key="index">
                                <div class="flex items-center md:mx-2 md:text-xs md:my-2">
                                    <img  :src="item.img" alt="" class="h-12 w-12">
                                    <a href="/items" class="font-bold ml-2 text-center text-gray-600">{{item.name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
         <!-- filter search -->
            <div class="bg-teal-700 py-5">
                <h1 class="capitalize text-4xl text-center text-white">
                    car parts <span class="font-semibold">catalogue</span> 
                </h1>
            </div>


            <div class="flex">
                <Multislide class="max-w-5xl mx-auto">
                    <div class="flex justify-around mt-6">
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
            <div class="capitalize container flex font-semibold items-center justify-between mx-auto px-10 text-white">
                <div>
                    <h1>filters <span class="font-normal lowercase">| oil filters</span></h1>
                    
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
                        <input type="search" v-model="search" class="bg-teal-900 focus:outline-none pl-10 placeholder-gray-400 py-2 rounded-md text-sm text-white" placeholder="Search..." autocomplete="off">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <Slide :slidesToShow=4 :arrows=false class="max-w-6xl container mx-auto mt-10">
            
            <div class="bg-white rounded-tr-lg shadow-lg max-w-xs" v-for="(item, index) in filteredList" :key="index">
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
                    <p class="break-all font-medium text-gray-600 text-xs">item number:&nbsp;245166h</p>
                    <p class="text-gray-800 text-xl font-semibold">3.800&nbsp;<span class="px-2 text-gray-500 text-sm">QAR</span></p>
                    <!-- <p class="text-gray-600 text-xs">incl. 20% VAT, <span class="text-gray-800 underline">delivery.</span> from &euro;8,45</p> -->
                </div>

                <div class="bg-teal-700 py-2">
                    <a href="#" class="flex focus:outline-none font-semibold items-center justify-around outline-none px-2 py-1 rounded text-white text-xs uppercase w-full">
                        Buy
                    </a>
                </div>
            </div>
        </Slide>
        <div class="mt-8 container flex justify-center">
            <a class="bg-teal-400 capitalize font-semibold mb-10 px-10 py-2 text-white z-10 overflow-visible" href="#">
                show all
            </a>
        </div>
        <!-- <div class="container grid grid-cols-2 md:grid-cols-4 mx-auto px-16 py-10">            
            <div class="bg-white mb-10 mx-3 overflow-hidden rounded-tr-lg shadow-lg" v-for="(item, index) in filteredList" :key="index">
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
                    <p class="break-all font-medium text-gray-600 text-xs">item number:&nbsp;245166h</p>
                    <p class="text-gray-800 text-xl font-semibold">3.800&nbsp;<span class="px-2 text-gray-500 text-sm">QAR</span></p>
                </div>

                <div class="bg-teal-700 py-2">
                    <button class="flex focus:outline-none font-semibold items-center justify-around outline-none px-2 py-1 rounded text-white text-xs uppercase w-full">
                        add to cart
                        <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-6">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div> -->
        <BaseFooter/>
    </div>
</template>

<script>
import BaseNav from "../../components/UI/BaseNav";
import SelectSection from '../../components/UI/SelectSection'
// import ToggleMenu from '../../components/UI/ToggleMenu'
import Slide from '../../components/UI/Slide'
import BaseFooter from '../../components/UI/BaseFooter'
import Multislide from '../../components/UI/Multislide'
import ToggleMenu from "../../components/UI/ToggleMenu";

export default {
    components: {
        BaseNav,
        SelectSection,
        Slide,
        // ToggleMenu,
        Multislide,
        BaseFooter,
        // Card,
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