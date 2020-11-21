<template>
<div>
    <footer class="md:bg-teal-700 py-4 text-gray-600 w-full bg-center bg-cover bg_image md:block hidden">
        <div class="container hidden md:grid md:grid-cols-2 lg:grid-cols-3 items-center mx-auto px-12 text-white">
            <div class="">
                <div>
                    <img src="../../images/LOGO-1.png" class="w-48" alt="">
                    <p class="capitalize text-gray-300">{{__('share part soluation')}}</p>
                </div>
                <p class="leading-4 max-w-xs mt-2 text-gray-400 text-sm">
                    Lorem ipsum dolor,
                    sit amet consectetur adipisicing elit.
                    Fugiat impedit aspernatur ullam deleniti nihil saepe 
                    consectetur dolor et nemo perferendis laboriosam quasi autem,
                    vero vitae, natus omnis porro
                </p>
            </div>

            <div class="flex font-bold uppercase">
                <ul class="leading-relaxed mx-12 text-sm">
                    <li class="capitalize font-medium text-2xl text-teal-500">{{__('services')}}</li>
                    <span class="-my-2 absolute bg-teal-500 h-1 w-8"></span>
                    <li><a href="#">{{__('order part')}}</a></li>
                    <li><a href="#">{{__('order status')}}</a></li>
                    <li><a href="#">{{__('send message')}}</a></li>
                </ul>
                <ul class="leading-relaxed text-sm">
                    <li class="capitalize font-medium text-2xl text-teal-500">{{__('structure')}}</li>
                    <span class="-my-2 absolute bg-teal-500 h-1 w-8"></span>
                    <li><a href="#">{{__('home')}}</a></li>
                    <li><a href="#">{{__('about us')}}</a></li>
                    <li><a href="#">{{__('contact')}}</a></li>
                </ul>
            </div>

            <div class="mx-auto mt-4 lg:mt-0">
                <svg class="mx-auto text-teal-500 w-16" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                <h1 class="capitalize flex justify-center leading-none text-2xl">{{__('newsletter')}} - <span class="text-teal-500">&nbsp;{{__('join us!')}}</span></h1>

                <p class="flex justify-center mb-2 text-sm">{{__('subscription to our newsletter')}}</p>
                <form>

                    <!-- <label for=""></label> -->

                    <label for="">
                        <input class="focus:outline-none outline-none px-3 py-2 rounded overflow-hidden text-gray-700 text-sm w-70" type="email" :placeholder="__('your email')">
                    </label>
                        
                    <label for="" class="block mx-32">
                        <input class="bg-teal-500 capitalize focus:outline-none font-bold mt-2 outline-none px-4 py-1 rounded" type="submit" :value="__('Join')">
                    </label>

                </form>
            </div>
        </div>
        
    </footer>

    <footer class="py-4 text-gray-600 w-full md:hidden">
        <p class="capitalize text-center md:text-white my-6">&copy;2020. <span class="text-teal-500 uppercase">{{__('partix')}}</span> {{__('all rights reserved')}}</p>
    </footer>
</div>
    
</template>

<style>
    .bg_image{
        background-image: url('../../images/1223/bg.png');
    }
</style>