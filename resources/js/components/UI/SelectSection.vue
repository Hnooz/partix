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
                    <form @submit.prevent="submit" class="flex flex-col lg:flex-row items-center justify-center">
                        <div class="grid gap-3 md:grid-cols-2">
                            <label class="w-70" for="">
                                <select v-model="brand" @change="getModel()"  name="brand" class="bg-teal-900 focus:shadow-none opacity-75 border-0 border-teal-900 capitalize form-select py-4 rounded text-white w-full" id="">
                                    <option value="0">select Brand</option>
                                    <option v-for="car in brands" :key="car.index" :value="car.id">{{car.brand}}</option>
                                </select>
                            </label>
                            <label for="model" class="w-70">
                                <select v-model="model" @change="getYear()" name="model" class="bg-teal-900 focus:shadow-none opacity-75 border-0 border-teal-900 capitalize form-select py-4 rounded text-white w-full" id="">
                                    <option value="0">select Model</option>
                                    <option v-for="car in models" :key="car.index" :value="car.id">{{car.model}}</option>
                                </select>
                            </label>
                            <label for="" class="w-70">
                                <select v-model="year" @change="getEngine()" name="year" class="bg-teal-900 focus:shadow-none opacity-75 border-0 border-teal-900 capitalize form-select my-1 py-4 rounded text-white w-full" id="">
                                    <option value="0">select Year</option>
                                    <option v-for="car in years" :key="car.index" :value="car.id">{{car.year}}</option>
                                </select>
                            </label>
                            <label for="" class="w-70">
                                <select v-model="engine" name="engine" class="bg-teal-900 focus:shadow-none opacity-75 border-0 border-teal-900 capitalize form-select my-1 py-4 rounded text-white w-full" id="">
                                    <option value="0">select Engine</option>
                                    <option v-for="car in engines" :key="car.index" :value="car.id">{{car.engine}}</option>
                                </select>
                            </label>
                        </div>
                        
                        <label class="mx-4 mt-4 lg:mt-0 block" for="">
                            <base-button class="bg-teal-500 focus:outline-none  capitalize px-8 py-1 rounded text-white">Create Car</base-button>
                            <!-- <button class="bg-teal-500 focus:outline-none  capitalize px-8 py-1 rounded text-white">Go</button> -->
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
        },
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
                // console.log(true);
                // this.$inertia.post(`/filtered_parts`, this.brand);
                // axios.post('/filtered_parts',{
                //     params: {
                //         brand_id: this.brand,
                //         model_id: this.model,
                //         year_id: this.year,
                //         engine_id: this.engine
                //     }
                // });
                axios({
                    method: 'post',
                    url: '/filtered_parts',
                    data: {
                        car_id: this.brand,
                    }
                }).then((response) => {
                     const status = JSON.parse(response.status);

                    if (status == '200') {
                        // console.log(window.location.pathname);
                        window.location.pathname = response.data.redirect;
                        
                    }
                });
            },
            getBrand(){
                axios.get('/get_brands')
                    .then(function (response) {
                        this.brands = response.data;
                    }.bind(this));
            },
            getModel(){
                axios.get('/get_models',{
                    params: {
                        brand_id: this.brand
                    }
                })
                .then(function(response){
                    this.models = response.data
                }.bind(this));

            },
            getYear(){
                axios.get('/get_years',{
                    params: {
                        model_id: this.model
                    }
                })
                .then(function(response){
                    this.years = response.data
                }.bind(this));

            },
            getEngine(){
                axios.get('/get_engines',{
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