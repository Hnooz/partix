<template>
    <layout>

        <div class="mt-8 capitalize">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">{{__('parts')}}/<span class="text-gray-500">{{__('show')}}</span></h2>
            </div>

            <base-panel class="mt-4">
                <div class="container max-w-6xl mb-20 md:mt-16 md:mx-auto py-4">
                    <div class="gap-y-10 grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <div class="border-2 border-teal-100 flex h-64 items-center justify-center md:h-70">
                                <img class="max-w-full md:max-w-md object-center object-cover" :src="img" alt="">
                            </div>
                        <div class="justify-around md:flex mt-6">
                            <slide-image class="max-w-sm" :arrows="true" :slidesToShow=2>
                                <div class="flex justify-center bg-white mx-2" v-for="url in part.url" :key="url.index">
                                    <img class="h-24 object-center object-cover w-24" :src="url" alt="" @click="changImage(url)">
                                </div>
                            </slide-image> 
                        </div>
                        </div>
                        <div class="mx-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="capitalize font-semibold text-3xl text-teal-700">{{$page.locale == 'en' ? part.name : part.name_ar}}</p>                                                                                        
                                </div>
                            </div>
                            <div class="">
                                <p class="bg-blue-100 my-5 p-5 text-gray-600 text-sm">
                                    {{$page.locale == 'en' ? part.description : part.description_ar}}
                                </p>
                            </div>
                            <div class="my-4">
                                <h1 class="font-semibold my-2 text-teal-700">
                                    {{__('cars')}} :
                                </h1>
                                <span class="bg-blue-100 mx-1 px-3 py-2 rounded-full text-gray-600" v-for="car in part.cars" :key="car.id">{{$page.locale == 'en' ?  car.brand : car.brand_ar}}</span>
                            </div>
                            <div class="my-4">
                                <h1 class="font-semibold my-2 text-teal-700">
                                    {{__('supplier')}} : <span class="text-gray-600">{{$page.locale == 'en' ?  part.supplier.name : part.supplier.name_ar}}</span>
                                </h1>
                            </div>
                            <div class="my-4">
                                <h1 class="font-semibold my-2 text-teal-700">
                                    {{__('category')}} : <span class="text-gray-600" v-if="part.category =! null">{{$page.locale == 'en' ?  part.category.name : part.category.name_ar}}</span>
                                </h1>
                            </div>
                            <div class="">   
                                <h1 class="font-semibold text-teal-700">{{__('prices')}} :</h1>              
                                <div class="flex mx-2">
                                    <div>
                                        <h1 class="font-semibold text-gray-700">{{__('oem')}}</h1>
                                        <p class="font-semibold text-gray-600">{{part.oem_price}} <span>{{__('QAR')}}</span> </p>
                                    </div>
                                    <div class="mx-4">
                                        <h1 class="font-semibold text-gray-700">{{__('aftermarket')}}</h1>
                                        <p class="font-semibold text-gray-600">{{part.aftermarket_price}} <span>{{__('QAR')}}</span> </p>
                                    </div>
                                    <div>
                                        <h1 class="font-semibold text-gray-700">{{__('used')}}</h1>
                                        <p class="font-semibold text-gray-600">{{part.used_price}} <span>{{__('QAR')}}</span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </base-panel>

        </div>

    </layout>
</template>

<script>

import Layout from "../../../Shared/Layout";
import SlideImage from '../../../components/UI/SlideImage'
export default {
    components: {
            Layout,
            SlideImage
            },
    props:['part'],
    data() {
        return {
            img:''
        }
    },
    created() {
        this.img = this.part.url[0]
    },
    methods: {
        changImage(url)
        {
            this.img = url
        }
    },
    }
</script>
