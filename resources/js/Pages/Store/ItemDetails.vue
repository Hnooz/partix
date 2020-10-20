<template>
    <div>
    <BaseNav/>
    <SelectSection/>
         <!-- filter search -->
    <div class="bg-teal-700 py-5">
        <div class="capitalize container flex font-semibold items-center justify-between mx-auto px-16 text-white">
            <div>
                <h1>filters <span class="font-normal capitalize">| oil filters </span> <span lass="font-normal capitalize">| air filter</span></h1>
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

    <div class="container max-w-6xl mb-20 md:mx-auto mt-16 py-4">
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
                                <p class="capitalize font-semibold text-3xl text-teal-700">air filter</p>
                                <p class="capitalize font-medium text-teal-400 text-xl">oil filter</p>
                                <button class="flex" type="button">
                                    <svg class="h-6 text-yellow-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="h-6 text-yellow-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="h-6 text-yellow-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="h-6 text-yellow-400 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-6 text-gray-400 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                </button>
                            </div>
                            <div>
                                <p class="font-semibold text-3xl text-gray-900">1.230 <span class="font-hairline text-gray-700 text-xl">QAR</span> </p>
                                <p class="line-through text-center text-gray-600">3.000 <span>QAR</span> </p>
                            </div>
                        </div>
                        <p class="bg-blue-100 my-5 p-5 text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Fuga, ipsa non perspiciatis quaerat porro eius accusamus 
                            ipsum modi a ad corporis dolore voluptate iure. 
                            Magni facere nostrum eum distinctio ea.
                        </p>
                        <div class="flex items-center">
                            <h1 class="capitalize text-teal-900">quantity:</h1>
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
                                <span class="font-semibold text-teal-400">in stock . </span>
                                ships within 24hrs
                                </p>
                            <button class="bg-teal-800 flex font-semibold focus:outline-none outline-none py-3 text-white" type="button">
                                <span class="mx-12">Add to Cart</span> 
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
                                    product details
                                    <span class="absolute block bg-teal-700 h-1 w-16"></span>
                                </a>
                                
                            </li>
                            <li class="text-gray-600"><a href="#">features</a></li>
                            <li class="text-gray-600"><a href="#">installation</a></li>
                            <li class="text-gray-600"><a href="#">warranty</a></li>
                            <li class="text-gray-600"><a href="#">reviews(2)</a></li>
                        </ul>
                        <div class="bg-center bg-cover bottomimage h-40 mt-10 w-full"></div>
                    </div>
                </div>
                
            </div>
            <div class="bg-center bg-cover h-72 rightimage w-70">
                
            </div>
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
                <h1 class="capitalize font-semibold mb-6 text-2xl text-teal-700">other categories
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
    <BaseFooter/>
    </div>
</template>

<script>
import BaseNav from '../../components/UI/BaseNav'
import SelectSection from '../../components/UI/SelectSection'
import Slide from '../../components/UI/Slide'
import BaseFooter from '../../components/UI/BaseFooter'


    export default {
        components:{
            BaseNav,
            SelectSection,
            Slide,
            BaseFooter,
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