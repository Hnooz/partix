<template>
<div>
    <div class="bg-teal-900 py-6 bg-cover bg-center w-full bg_image">
        <div class="container mx-auto px-8">
            <ul class="flex font-semibold py-3 text-white uppercase">

                <li class="text-teal-500">
                    <a href="#">{{__('home')}}</a>
                    <span class="absolute bg-teal-600 block h-1 w-5"></span>
                </li>

                <li class="hover:text-teal-500 mx-3">
                    <a href="#">{{__('blog')}}</a>
                    <span class="absolute bg-teal-600 h-1 w-5 hidden"></span>
                </li>

                <li class="hover:text-teal-500">
                    <a href="#">{{__('about us')}}</a>
                    <span class="absolute bg-teal-600 h-1 w-5 hidden"></span>
                </li>

                <li class="hover:text-teal-500 mx-3">
                    <a href="#">{{__('contact')}}</a>
                    <span class="absolute bg-teal-600 h-1 w-5 hidden"></span>
                </li>

            </ul>
            <div class="my-16 text-center">
                <div class="leading-none my-8">
                    <h1 class="uppercase font-semibold text-3xl text-white">
                        {{__('select your')}} <span class="text-teal-600">{{__('car')}}</span> 
                    </h1>
                    <p class="font-medium text-gray-300">{{__('Get your parts as fast as you can imagine')}}</p>
                </div>
                <div>
                    <form class="flex flex-col lg:flex-row items-center justify-center">
                        <div class="grid gap-3 md:grid-cols-2">
                            <label class="w-70" for="">
                                <select name="brand" class="bg-teal-900 focus:shadow-none opacity-75 border-0 border-teal-900 capitalize form-select py-4 rounded text-white w-full" id="">
                                    <option v-for="car in carItem" :key="car.index" :value="car.id">{{car.brand}}</option>
                                </select>
                            </label>
                            <label for="model" class="w-70">
                                <select name="" class="bg-teal-900 focus:shadow-none opacity-75 border-0 border-teal-900 capitalize form-select py-4 rounded text-white w-full" id="">
                                    <option v-for="car in carItem" :key="car.index" :value="car.id">{{car.model}}</option>
                                </select>
                            </label>
                            <label for="" class="w-70">
                                <select name="year" class="bg-teal-900 focus:shadow-none opacity-75 border-0 border-teal-900 capitalize form-select my-1 py-4 rounded text-white w-full" id="">
                                    <option v-for="car in carItem" :key="car.index" :value="car.id">{{car.year}}</option>
                                </select>
                            </label>
                            <label for="" class="w-70">
                                <select name="engine" class="bg-teal-900 focus:shadow-none opacity-75 border-0 border-teal-900 capitalize form-select my-1 py-4 rounded text-white w-full" id="">
                                    <option v-for="car in carItem" :key="car.index" :value="car.id">{{car.engine}}</option>
                                </select>
                            </label>
                        </div>
                        
                        <label class="mx-4 mt-4 lg:mt-0 block" for="">
                            <input class="bg-teal-500 focus:outline-none  capitalize px-8 py-1 rounded text-white" type="submit" value="go">
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</div>
</template>

<script>
import BasePanel from '../UI/BasePanel'
import BaseInput from '../UI/BaseInput'
import BaseButton from '../UI/BaseButton'

    export default {
        props:{
            carItem:Array,
        }
    }
</script>

<style>
    .bg_image{
        background-image: url('../../images/1223/bg.png');
    }
</style>