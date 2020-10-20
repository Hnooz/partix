<template>
    <footer class="md:bg-teal-700 py-4 text-gray-600 w-full bg-center bg-cover  md:bg_image">
        <div class="container md:grid grid-cols-3 items-center mx-auto px-12 text-white hidden">
            <div class="">
                <div>
                    <img src="../../images/LOGO-1.png" class="w-48" alt="">
                    <p class="capitalize text-gray-300">share part soluation</p>
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
                    <li class="capitalize font-medium text-2xl text-teal-500">services</li>
                    <span class="-my-2 absolute bg-teal-500 h-1 w-8"></span>
                    <li><a href="#">order part</a></li>
                    <li><a href="#">order status</a></li>
                    <li><a href="#">send message</a></li>
                </ul>
                <ul class="leading-relaxed text-sm">
                    <li class="capitalize font-medium text-2xl text-teal-500">structure</li>
                    <span class="-my-2 absolute bg-teal-500 h-1 w-8"></span>
                    <li><a href="#">home</a></li>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">contact</a></li>
                </ul>
            </div>

            <div class="mx-auto">
                <svg class="mx-auto text-teal-500 w-16" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                <h1 class="capitalize flex justify-center leading-none text-2xl">newsletter - <span class="text-teal-500">&nbsp;join us!</span></h1>
                <p class="flex justify-center mb-2 text-sm">subscription to our newsletter</p>
                <form>

                    <!-- <label for=""></label> -->

                    <label for="">
                        <input class="focus:outline-none outline-none px-3 py-1 text-gray-700 text-sm w-70" type="email" placeholder="your email">
                    </label>
                        
                    <label for="" class="block mx-32">
                        <input class="bg-teal-500 capitalize focus:outline-none font-bold mt-2 outline-none px-4 py-1 rounded" type="submit" value="join">
                    </label>

                </form>
            </div>
        </div>
        <p class="capitalize text-center md:text-white my-6">&copy;2020. <span class="text-teal-500 uppercase">partix</span> all rights reserved</p>
    </footer>
</template>

<style>
    .bg_image{
        background-image: url('../../images/1223/bg.png');
    }
</style>