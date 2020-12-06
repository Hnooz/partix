<template>
    <store-layout>
    <BaseNav/>
    <SelectSection class="hidden md:block"/>
         <!-- filter search -->
    <div class="bg-teal-700 py-5 hidden md:block">
        <div class="capitalize container flex font-semibold items-center justify-between mx-auto px-16 text-white">
            <div class="flex">
                <h1>{{__('filters')}} |</h1><span class="font-normal capitalize">&nbsp;{{__('oil filters')}}&nbsp;</span> <span lass="font-normal capitalize"> | {{__('air filter')}}</span>
            </div>
            <div class="flex items-center">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <button class="bg-white flex focus:outline-none outline-none h-8 items-center justify-center rounded-full w-8" type="button">
                    <svg class="text-teal-800 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </button>
                
            </div>
        </div>
    </div>

    <!-- mobile view search -->
    <div class="md:hidden">
        <form class="bg-teal-500 px-8 py-3">
            <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <button type="submit" class="focus:outline-none p-1 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </span>
            <input type="search" class="bg-transparent border-b focus:outline-none placeholder-white px-10 py-2 text-sm text-white w-full" placeholder="Search..." autocomplete="off">
            </div>
        </form>
    </div>

    <div class="container max-w-6xl mb-20 md:mx-auto mt-16 py-4 hidden md:block">
        <div class="flex justify-between">
            <div>
                <div class="flex">
                    <div>
                        <div class="bg-white flex h-70 items-center justify-center w-70">
                            <img class="h-40 object-center object-cover w-40" src="../../images/1223/airfilter.png" alt="">
                        </div>
                       <div class="flex justify-around mt-6">
                        <Slide class="max-w-xs" :arrows="true" :slidesToShow=3>
                            <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-1.png" alt=""></div>
                            <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-2.png" alt=""></div>
                            <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-3.png" alt=""></div>
                            <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-2.png" alt=""></div>
                            <div class="flex justify-center bg-white mx-2"><img class="h-12 mx-auto my-2 object-center object-cover w-12" src="../../images/1223/asset-3.png" alt=""></div>      
                        </Slide> 
                       </div>
                        

                    </div>
                    <div class="mx-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="capitalize font-semibold text-3xl text-teal-700">{{__('air filter')}}</p>
                                <p class="capitalize font-medium text-teal-400 text-xl">{{part.name}}</p>
                                <button class="flex" type="button">
                                    <svg class="h-6 text-yellow-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="h-6 text-yellow-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="h-6 text-yellow-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="h-6 text-yellow-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-6 text-gray-400 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                </button>
                            </div>
                            <div>
                                <p class="font-semibold text-3xl text-gray-900">{{part.price}} <span class="font-hairline text-gray-700 text-xl">QAR</span> </p>
                                <p class="line-through text-center text-gray-600">3.000 <span>QAR</span> </p>
                            </div>
                        </div>
                        <div class="">
                            <p class="bg-blue-100 my-5 p-5 text-gray-600 text-sm">
                                <!-- {{part.description}} -->
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Fuga, ipsa non perspiciatis quaerat porro eius accusamus 
                                ipsum modi a ad corporis dolore voluptate iure. 
                                Magni facere nostrum eum distinctio ea.
                            </p>
                        </div>
                        
                        <div class="flex items-center">
                            <h1 class="capitalize text-teal-900">{{__('quantity')}}:</h1>
                            <span class="bg-teal-500 mx-2 my-2 text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                            </span>

                            <span class="bg-white flex items-center mx-2 px-4 py-2">1</span>

                            <span class="bg-teal-500 mx-2 my-2 text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">    
                                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="capitalize">
                            <p class="text-gray-700 my-6">
                                <span class="font-semibold text-teal-400" dir="auto">{{__('in stock')}} . </span>
                                {{__('ships within 24hrs')}}
                            </p>
                            <button class="bg-teal-800 flex font-semibold focus:outline-none outline-none py-3 text-white" type="button">
                                <span class="mx-12 capitalize">{{__('add to cart')}}</span> 
                                <svg class="h-6 mx-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                </div>
                <div>
                    <div class="flex mx-64 px-24">
                        <div class="sharethis-inline-share-buttons flex my-4" style="z-index:0;"></div>
                    </div>
                    
                    <div class="max-w-xl">
                        <ul class="flex justify-between capitalize "> 
                            <li class="text-teal-700 font-semibold">
                                <a href="#">
                                    {{__('product details')}}
                                    <span class="absolute block bg-teal-700 h-1 w-16"></span>
                                </a>
                                
                            </li>
                            <li class="text-gray-600"><a href="#">{{__('features')}}</a></li>
                            <li class="text-gray-600"><a href="#">{{__('installation')}}</a></li>
                            <li class="text-gray-600"><a href="#">{{__('warranty')}}</a></li>
                            <li class="text-gray-600"><a href="#">{{__('reviews')}}</a></li>
                        </ul>
                        <div class="bg-center bg-cover bottomimage h-40 mt-10 w-full"></div>
                    </div>
                </div>
                
            </div>
            <div class="bg-center bg-cover h-72 rightimage w-70"> </div>
        </div>
        <div class="flex justify-between mt-10">
            <p class="max-w-xl px-2 text-gray-600 text-sm">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Obcaecati, temporibus omnis in fugit non laudantium placeat natus 
                <br/>
                <br>
                cupiditate consectetur facilis repellat, exercitationem quod similique 
                molestiae enim consequuntur! Voluptas, nobis error

                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Obcaecati, temporibus omnis in fugit non laudantium placeat natus 
                cupiditate consectetur facilis repellat, exercitationem quod similique 
                molestiae enim consequuntur! Voluptas, nobis error
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Obcaecati, temporibus omnis in fugit non laudantium placeat natus 
                cupiditate consectetur facilis repellat, exercitationem quod similique 
                molestiae enim consequuntur! Voluptas, nobis error

            </p>
            <div>
                <h1 class="capitalize font-semibold mb-6 text-2xl text-teal-700">{{__('other categories')}}
                    <span class="absolute block bg-teal-700 h-1 w-24"></span>
                </h1>
                <div class="flex">
                     <a class="" href="#">
                        <img src="../../images/1223/Groupe 190.png" alt="">
                    </a>
                    <a class="mx-3" href="#">
                        <img src="../../images/1223/Groupe 191.png" alt="">
                    </a>
                    <a class="" href="#">
                        <img src="../../images/1223/Groupe 192.png" alt="">
                    </a>
                </div>
               
            </div>
        </div>
        

    </div>

    <div class="bg-white md:hidden md:rounded-tr-lg mx-6 mt-8 overflow-hidden rounded-t-lg shadow-lg">
        <div class="flex justify-between">

            <svg @click="fave()" v-if="fav == false" class="h-6 m-2 md:mx-4 text-gray-400 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor" />
            </svg>

            <svg @click="fave()" v-if="fav == true" class="h-6 m-2 md:mx-4 text-red-600 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
            </svg>

            <p class="bg-teal-400 font-semibold h-12 md:px-1 md:rounded-none px-2 py-3 rounded-bl-lg shadow-lg text-sm text-white w-12">-26%</p>
        </div>
        <div class="flex items-center justify-center">
            <a class="-mt-10 px-10" href="/details">
                <img class="h-32 md:h-24 md:mt-12 md:w-24 mx-auto object-center object-cover w-32" src="../../images/10102.png" alt="item name">
            </a>
            <div>
                <a href="/details">
                <img class="border border-teal-400 h-16 md:h-24 md:mt-12 md:w-24 mx-auto my-1 object-center object-cover w-16" src="../../images/10102.png" alt="item name">
            </a>
            <a href="/details">
                <img class="border border-teal-400 h-16 md:h-24 md:mt-12 md:w-24 mx-auto object-center object-cover w-16" src="../../images/10102.png" alt="item name">
            </a>
            </div>
        </div>
        

        <div class="-mt-6 px-4">
            <a href="/details" class="font-bold text-sm md:text-base text-teal-500 uppercase">Oil Test</a>
            <p class="break-all font-medium text-gray-600 text-xs">{{__('item number')}}</p>
            <p class="font-semibold md:text-xl text-gray-800 text-sm">
                3.800<span class="text-gray-500 text-xs">QAR</span>
                <span class="line-through px-2 text-gray-500 text-xs">3.800 QAR</span> </p>
        </div>

        <div class="flex items-center px-4">
            <h1 class="text-teal-900 text-sm">{{__('quantity')}}:</h1>
            <span class="bg-teal-500 text-white">
                <svg class="w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
            </span>

            <span class="bg-white flex items-center mx-2 py-2">1</span>

            <span class="bg-teal-500 my-2 text-white">
                <svg class="w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">    
                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </span>
        </div>
        
        <p class="px-4 py-5 text-gray-600 text-xs">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
             Porro iure ipsum magni, sequi, eveniet dignissimos omnis
              aperiam vero cum sint natus earum veniam debitis commodi
        </p>
    </div>

    <div class="bg-teal-500 py-4 md:hidden" >
        <button class="flex focus:outline-none font-semibold items-center justify-center outline-none px-2 py-1 rounded text-white uppercase w-full">
            <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-6">
                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
            </svg>
            {{__('add to cart')}}
        </button>
    </div>
    <BaseFooter/>
    </store-layout>
</template>

<script>
import BaseNav from '../../components/UI/BaseNav'
import SelectSection from '../../components/UI/SelectSection'
import Slide from '../../components/UI/Slide'
import BaseFooter from '../../components/UI/BaseFooter'
import StoreLayout from '../../Shared/StoreLayout.vue'


    export default {
        components:{
            StoreLayout,
            BaseNav,
            SelectSection,
            Slide,
            BaseFooter,
        },
        props:['part'],
        data() {
            return {
                fav:false
            }
        },
        methods: {
        fave(){
            this.fav = !this.fav
        }
    },
    }
</script>

<style>
#st-1{
    z-index: 0;
}
.rightimage{
    background-image: url('../../images/1223/rightimage.png');
}
.bottomimage{
    background-image: url('../../images/1223/replace_collage.png');
}
</style>