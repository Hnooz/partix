<template>
<div>
    <div class="w-full py-6 bg-teal-900 bg-center bg-cover bg_image">
        <div class="container px-8 mx-auto">
            <ul class="flex py-3 font-semibold text-white uppercase">

                <li class="text-teal-500">
                    <a href="/store">{{__('home')}}</a>
                    <span class="absolute block w-5 h-1 bg-teal-600"></span>
                </li>

                <li class="mx-3 hover:text-teal-500">
                    <a href="#">{{__('blog')}}</a>
                    <span class="absolute hidden w-5 h-1 bg-teal-600"></span>
                </li>

                <li class="hover:text-teal-500">
                    <a href="#">{{__('about us')}}</a>
                    <span class="absolute hidden w-5 h-1 bg-teal-600"></span>
                </li>

                <li class="mx-3 hover:text-teal-500">
                    <a href="#">{{__('contact')}}</a>
                    <span class="absolute hidden w-5 h-1 bg-teal-600"></span>
                </li>

            </ul>
            <div class="my-16 text-center">
                <div class="my-8 leading-none">
                    <h1 class="text-3xl font-semibold text-white uppercase">
                        {{__('select your')}} <span class="text-teal-600">{{__('car')}}</span> 
                    </h1>
                    <p class="font-medium text-gray-300">{{__('Get your parts as fast as you can imagine')}}</p>
                </div>
                <div>
                    <form @submit.prevent="submit" class="flex flex-col items-center justify-center lg:flex-row">
                        <div class="grid gap-3 md:grid-cols-2">
                            <label class="w-70" for="">
                                <select v-model="brand" @change="getModel()"  name="brand" class="w-full py-4 text-white capitalize bg-teal-900 border-0 border-teal-900 rounded opacity-75 focus:shadow-none form-select">
                                    <option value="0">{{__('select Brand')}}</option>
                                    <option v-for="brand in brands" :key="brand.index" :value="brand.id">{{$page.locale == 'en' ? brand.name : brand.name_ar}}</option>
                                </select>
                            </label>
                            <label for="model" class="w-70">
                                <select v-model="model" @change="getYear()" name="model" class="w-full py-4 text-white capitalize bg-teal-900 border-0 border-teal-900 rounded opacity-75 focus:shadow-none form-select">
                                    <option value="0">{{__('select Model')}}</option>
                                    <option v-for="car in models" :key="car.index" :value="car.id">{{$page.locale == 'en' ? car.model : car.model_ar}}</option>
                                </select>
                            </label>
                            <label for="" class="w-70">
                                <select v-model="year" @change="getEngine()" name="year" class="w-full py-4 my-1 text-white capitalize bg-teal-900 border-0 border-teal-900 rounded opacity-75 focus:shadow-none form-select">
                                    <option value="0">{{__('select Year')}}</option>
                                    <option v-for="car in years" :key="car.index" :value="car.id">{{car.year}}</option>
                                </select>
                            </label>
                            <label for="" class="w-70">
                                <select v-model="engine" name="engine" class="w-full py-4 my-1 text-white capitalize bg-teal-900 border-0 border-teal-900 rounded opacity-75 focus:shadow-none form-select">
                                    <option value="0">{{__('select Engine')}}</option>
                                    <option v-for="car in engines" :key="car.index" :value="car.id">{{$page.locale == 'en' ? car.engine : car.engine_ar}}</option>
                                </select>
                            </label>
                        </div>
                        
                        <label class="block mx-4 mt-4 lg:mt-0" for="">
                            <base-button class="px-8 py-1 text-white capitalize bg-teal-600 rounded hover:bg-teal-500 focus:outline-none">{{__('search')}}</base-button>
                            <!-- <button class="px-8 py-1 text-white capitalize bg-teal-500 rounded focus:outline-none">Go</button> -->
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
        data() {
            return {
                brand:0,
                brands:[],
                model:0,
                models:[],
                year:0,
                years:[],
                engine:0,
                engines:[],
               
            }
        },

        methods: {
            submit(){
                let self = this;

                axios({
                    method: 'post',
                    url: '/store/filtered_parts',
                    data: {
                        car_id: this.engine,
                    }
                }).then((response) => {
                     const status = JSON.parse(response.status);

                    if (status == '200') {
                        window.location.pathname = response.data.redirect;
                    }
                });
            },
            getBrand(){
                axios.get('/store/get_brands')
                    .then(function (response) {
                        this.brands = response.data;
                    }.bind(this));
            },
            getModel(){
                axios.get('/store/get_models',{
                    params: {
                        brand_id: this.brand
                    }
                })
                .then(function(response){
                    this.models = response.data
                }.bind(this));

            },
            getYear(){
                axios.get('/store/get_years',{
                    params: {
                        model_id: this.model
                    }
                })
                .then(function(response){
                    this.years = response.data
                }.bind(this));

            },
            getEngine(){
                axios.get('/store/get_engines',{
                    params: {
                        year_id: this.year
                    }
                })
                .then(function(response){
                    this.engines = response.data
                }.bind(this));
            },
        },
        created() {
            this.getBrand()
        },
    }
</script>

<style>
    .bg_image{
        background-image: url('../../images/1223/bg.png');
    }
</style>