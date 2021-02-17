<template>
    <layout>

        <div class="mt-8 capitalize">
            <div class="flex">
                <h2 class="text-3xl font-bold text-teal-700">{{__('parts')}}/<span class="text-gray-500">{{__('show')}}</span></h2>
            </div>

            <base-panel class="mt-4">
                <div class="container max-w-6xl py-4 mb-20 md:mt-16 md:mx-auto">
                    <div class="grid grid-cols-1 gap-y-10 md:grid-cols-2">
                        <div>
                            <div class="flex items-center justify-center h-64 border-2 border-teal-100 md:h-70">
                                <img class="object-cover object-center max-w-full md:max-w-md" :src="img" alt="">
                            </div>
                        <div class="justify-around mt-6 md:flex">
                            <slide-image class="max-w-sm" :arrows="true" :slidesToShow=2>
                                <div class="flex justify-center mx-2 bg-white" v-for="url in part.url" :key="url.index">
                                    <img class="object-cover object-center w-24 h-24" :src="url" alt="" @click="changImage(url)">
                                </div>
                            </slide-image> 
                        </div>
                        </div>
                        <div class="mx-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-3xl font-semibold text-teal-700 capitalize">{{$page.locale == 'en' ? part.name : part.name_ar}}</p>                                                                                        
                                </div>
                            </div>
                            <div class="">
                                <p class="p-5 my-5 text-sm text-gray-600 bg-blue-100">
                                    {{$page.locale == 'en' ? part.description : part.description_ar}}
                                </p>
                            </div>
                            <div class="my-4">
                                <h1 class="my-2 font-semibold text-teal-700">
                                    {{__('cars')}} :
                                </h1>
                                <span class="px-3 py-2 mx-1 text-gray-600 bg-blue-100 rounded-full" v-for="car in part.cars" :key="car.id">{{$page.locale == 'en' ?  car.brand : car.brand_ar}}</span>
                            </div>
                            <div class="my-4">
                                <h1 class="my-2 font-semibold text-teal-700">
                                    {{__('tags')}} :
                                </h1>
                                <span class="px-3 py-2 mx-1 text-gray-600 bg-blue-100 rounded-full" v-for="tag in part.tags" :key="tag.id">{{$page.locale == 'en' ?  tag.name : tag.name_ar}}</span>
                            </div>
                            <div class="my-4">
                                <h1 class="my-2 font-semibold text-teal-700">
                                    {{__('supplier')}} : <span class="text-gray-600">{{$page.locale == 'en' ?  part.supplier.name : part.supplier.name_ar}}</span>
                                </h1>
                            </div>
                            <div class="my-4">
                                <h1 class="my-2 font-semibold text-teal-700">
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
