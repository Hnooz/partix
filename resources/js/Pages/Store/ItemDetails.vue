<template>
    <div>
    <BaseNav/>
        <!-- <h1 class="font-semibold mt-32 py-10 text-2xl  text-gray-700">Test Item</h1> -->
        <div class="bg-white container mb-20 md:max-w-4xl md:mx-auto md:mt-64 mt-48 py-4 shadow-lg">

            <!-- item name and shor desc -->
            <div class="px-3">
                <h1 class="font-semibold text-xl text-blue-500">item name</h1>
                <div class="ml-16">
                    <p class="font-semibold text-gray-800 text-xl">item short description</p>
                    <p class="font-medium text-gray-600">55W, H7, 12V</p>
                </div>
            </div>

             <!-- image -->
            <div class="my-6 w-full">
                <!-- <div class="bg-center bg-cover h-64 itemImage mx-auto w-64"></div> -->
                <img class="object-cover object-center h-64 mx-auto w-64" src="../../images/car.jpeg" alt="test">
            </div>
            
            <div class="md:flex justify-around my-20 hidden"> 
                <div class="border mx-4 relative shadow-lg w-1/3">
                    <h1 class="border-blue-400 pl-3 py-1 text-gray-600">Original</h1>
                    <img class="h-32 mx-auto my-3 object-center object-cover w-32" src="../../images/car.jpeg" alt="">
                    <p class="text-gray-700 text-sm pl-3 my-3">$45,8</p>
                    <button type="button" class="bg-blue-400 flex focus:outline-none justify-center outline-none py-2 rounded text-white w-full">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-8 h-8">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </button>
                    <span class="absolute bg-blue-400 px-4 py-1 right-0 rounded-bl-lg shadow-lg text-sm text-white top-0 tracking-tighter">-23%</span>
                </div>

                <div class="border mx-4 relative shadow-lg w-1/3">
                    <h1 class="border-blue-400 pl-3 py-1 text-gray-600">Improved</h1>
                    <img class="h-32 mx-auto my-3 object-center object-cover w-32" src="../../images/panda.jpg" alt="">
                    <p class="text-gray-700 text-sm pl-3 my-3">$45,8</p>
                    <button type="button" class="bg-blue-400 flex focus:outline-none justify-center outline-none py-2 rounded text-white w-full">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-8 h-8">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </button>
                    <span class="absolute bg-blue-400 px-4 py-1 right-0 rounded-bl-lg shadow-lg text-sm text-white top-0 tracking-tighter">-23%</span>
                </div>

                <div class="border mx-4 relative shadow-lg w-1/3">
                    <h1 class="border-blue-400 mb-20 pl-3 py-1 text-gray-600">Used</h1>
                    <button type="button" class="bg-blue-400 focus:outline-none mb-10 mx-20 outline-none px-2 py-1 rounded text-white">Order Now</button>
                    <p class="text-gray-700 text-sm pl-3 mb-3">$45,8</p>
                    <button type="button" class="bg-blue-400 flex focus:outline-none justify-center outline-none py-2 rounded text-white w-full">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-8 h-8">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <Slide class="md:hidden"/>
            <!-- item price -->
            <!-- <div class="flex items-center justify-between px-3">
                <div class="flex items-center">
                    <label for="OEM">OEM</label>
                    <button type="button"
                            class="bg-orange-600 border-2 border-gray-500 focus:border-blue-300 focus:outline-none h-4 mx-2 outline-none rounded-full w-4">
                    </button>

                    <label for="OEM" class="whitespace-no-wrap">After Market</label>
                    <button type="button"
                            class=" border-2 border-gray-500 focus:border-blue-300 focus:outline-none h-4 mx-2 outline-none rounded-full w-4">
                    </button>
                    <label for="OEM">Used</label>
                    <button type="button"
                            class="border-2 border-gray-500 focus:border-blue-300 focus:outline-none h-4 mx-2 outline-none rounded-full w-4">
                    </button>
                </div>
                <div class="text-right">
                    <p>
                    <span class="line-through mr-3 text-gray-600">$&nbsp;6,40</span>
                    <span class="bg-orange-700 font-semibold px-1 rounded-full text-white">-26%</span>
                    </p>
                    <p class="font-semibold text-2xl text-gray-800">$&nbsp;4,87</p>
                    <p class="text-gray-600 text-sm">incl, 20% VAT excl<span class="pl-2 text-purple-900">delivery costs</span></p>
                </div>
            </div> -->

            <!-- add to cart button -->
            <!-- <div class="flex px-3 my-6">
                <div class="border border-gray-500 flex items-center p-2 rounded-lg text-gray-700">
                    <span class="pr-8">{{count}}</span>
                    <div class="-my-2">
                        <button class="outline-none focus:outline-none" type="button" @click="count++">
                            <svg viewBox="0 0 20 20" fill="currentColor" 
                                class="chevron-up  w-6 h-6" >
                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        
                        <button class="outline-none focus:outline-none" :disabled="count == 0" type="button" @click="count--">
                            <svg viewBox="0 0 20 20" fill="currentColor" 
                                 class="chevron-down h-6  w-6" >
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        
                    </div>
                </div>

                <button  type="button" class="bg-red-700 flex font-semibold items-center justify-center ml-5 rounded-lg text-white uppercase w-full whitespace-no-wrap"> 
                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-8 mx-3 shopping-cart w-8">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                    add to cart
                </button>
            </div> -->

            <!-- item numbers -->
            <!-- <div class="border-gray-500 border-t font-medium leading-loose mx-3 pt-3 px-4 text-gray-800 text-sm">
                <p>Use number:&nbsp;<span>tgskahs t5</span></p>
                <p>EAN number:&nbsp;<span>tgskahs 45678906545</span></p>
            </div> -->

            <!-- item details -->
            <div class="my-4 mx-3">
                <div class="bg-gray-400 text-xl flex font-semibold justify-between px-4 py-2 rounded-t-lg text-gray-800">
                    <h1>Details</h1>
                    <button type="button" class="cursor-pointer focus:outline-none outline-none" @click="isOpen = !isOpen">-</button>
                </div>
                <table class="table-auto w-full" v-if="isOpen">
                    <tbody>
                        <tr class="bg-gray-300 flex font-semibold justify-between px-4 py-2 text-gray-800">
                            <td class="capitalize">Product Line</td>
                            <td class="uppercase">longlife</td>
                        </tr>
                        <tr :class="(index + 1)%2 == 1 ? 'bg-gray-100' : 'bg-gray-300'" class="bg-gray-100 text-sm flex font-semibold justify-between px-4 py-2 text-gray-800"
                            v-for="(item, index) in items = 12" :key="index">
                            <td>Bulb Type:</td>
                            <td>H7</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    <BaseFooter/>
    <!-- <Cart/> -->
    </div>
</template>

<script>
import BaseNav from '../../components/UI/BaseNav'
import BaseFooter from '../../components/UI/BaseFooter'
import Slide from '../../components/UI/Slide'
// import Cart from '../Store/Cart'
    export default {
        components:{
            BaseNav,
            BaseFooter,
            Slide
            // Cart
        },
        data() {
            return {
                isOpen:true,
                count:1
            }
        },
    }
</script>

<style>
.itemImage{
    background-image: url('../../images/test.jpg');
}
</style>