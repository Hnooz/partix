<template>
    <div>
        <BaseNav/>

        <div class="">
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
        </div>
        <BaseFooter/>
    </div>
</template>

<script>
import BaseNav from "../../components/UI/BaseNav";
import BaseFooter from '../../components/UI/BaseFooter'
// import Card from '../../components/UI/Card'
import ToggleMenu from "../../components/UI/ToggleMenu";

export default {
    components: {
        BaseNav,
        BaseFooter,
        // Card,
        ToggleMenu
        },
    data() {
    return {
       showModal: false,
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
methods: {
    toggleModal(){
      this.showModal = !this.showModal;
    },
    closeModal(){
      this.showModal = !this.showModal;
    }
  },
}

</script>

<style >
.itemImage{
    background-image: url('../../images/car.jpeg');
}   
</style>