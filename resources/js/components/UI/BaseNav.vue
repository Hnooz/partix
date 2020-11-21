<template>
<div>
    <nav :class="{ 'scrolled': !view.atTopOfPage }" 
        class="animated bg-teal-700 md:flex hidden flex-wrap items-center justify-between m-auto pb-6 shadow-md top-0 w-full">
        <div class="bg-teal-900 capitalize flex font-medium justify-between px-20 py-4 text-white w-full">
            <div class="flex">
                <h1>{{__('Call')}} <span>{{__('78 5439 36')}}</span></h1>
                <span class="mx-2">|</span>
                <LanguageSelector />
            </div>
            <div class="flex">
                <a href="#" class="flex">
                    <svg class="w-5 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    {{__('log in')}}
                </a>
                <span class="mx-2">|</span>
                <a href="#">{{__('register')}}</a>
            </div>
        </div>
        <div class="container mx-auto p-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between md:block">
                <div class="-ml-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button @click="isOpen = !isOpen"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 focus:outline-none outline-none">
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg :class="isOpen?'hidden':'block'" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg :class="isOpen?'block':'hidden'" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>

                    </button>
                </div>
                
                
                <div class="hidden md:block md:mx-auto my-6">
                    <div class="flex items-center justify-between">
                        <div class="">
                            <div class="flex-shrink-0">
                                <a href="/store">
                                <img src="../../images/LOGO-1.png" class="w-48" alt="">
                                </a>
                            </div>
                            <p class="capitalize font-medium text-white">{{__('share part soluation')}}</p>
                        </div>
                        <form action="#" method="post" class="flex items-center pl-3 whitespace-pre" dir="auto">
                            <button class="focus:outline-none mx-2 outline-none" type="button">
                                <svg  class="h-10 text-white w-10" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </button>

                            <div class="flex md:flex-col lg:flex-row">
                                <input type="search" class="bg-teal-900 border-0 focus:outline-none form-input outline-none p-2 py-3 rounded sm:ml-0 text-sm text-white w-70" :placeholder="__('Enter the part number or name')" >
                                
                                <button type="submit" class="block bg-teal-500 cursor-pointer capitalize focus:outline-none font-medium md:px-10 outline-none p-2 px-2 text-white" >{{__('search')}}</button>

                            </div>
                        </form>

                        <div class="bg-teal-900 flex items-center ml-2 p-3 rounded text-white">

                            <a href="#">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor" />
                                </svg>
                            </a>
                            <span class="-mt-12 absolute bg-red-400 flex font-bold h-5 justify-center rounded-full text-sm w-5">3</span>
                            
                            <a href="#" class="mx-3">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 shopping-cart w-6" @click="cartOpen = !cartOpen">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                </svg>                                
                            </a>
                            <span class="-mt-12 mx-10 absolute bg-red-400 flex font-bold h-5 justify-center rounded-full text-sm w-5">3</span>
                            

                            <span class="font-bold text-sm">&nbsp; $33,45 &nbsp; QAR</span>

                        </div>
                    </div>
                </div>

                <div class="-ml-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <a href="#" @click="cartOpen = !cartOpen"><button  class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 focus:outline-none outline-none">
                    
                    <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-8 h-8">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                    <span class="-mt-3 absolute bg-blue-400 flex h-5 items-center justify-center ml-3 rounded-full w-5 text-white text-xs m-auto">36</span>
                    
                    </button></a>
                </div>
            </div>
        </div>

        <!--
          Mobile menu, toggle classes based on menu state.

          Open: "block", closed: "hidden"
        -->
        <div class="block md:hidden w-full" >
            <form action="#" method="post" class="pl-3 w-full">
                <label class="">
                    <input type="search" class="form-input bg-white border border-gray-400 focus:border-blue-400 focus:outline-none w-3/4 outline-none p-2 placeholder-gray-700 rounded sm:ml-0 text-gray-700 text-sm" placeholder="Enter the part number or name">
                </label>
                <input type="submit" value="search" class="bg-blue-400 border-2 border-transparent focus:outline-none font-medium hover:bg-white hover:border-teal-500 hover:text-teal-500 md:px-10 outline-none p-2 px-2 rounded text-sm text-white">
            </form>
        </div>

        <div v-if="isOpen" class="absolute bg-white  h-screen md:hidden pb-3 pt-2 px-2 sm:px-3 top-0 w-3/4">
            <svg @click="isOpen = !isOpen"  class="-mr-8 absolute bg-gray-200 block cursor-pointer h-6 right-0 rounded-full text-blue-500 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
    
            <a href="/store"
                   class="block bg-blue-400 focus:outline-none focus:text-white font-medium  px-3 py-2 rounded-md text-base text-white">{{__('Home')}}</a>
                <a href="/categories"
                   class=" block  focus:outline-none focus:text-white font-medium hover:bg-blue-400 hover:text-white mt-1 px-3 py-2 rounded-md text-base text-gray-500">{{__('Categories')}}</a>
                <a href="#"
                   class=" block  focus:outline-none focus:text-white font-medium hover:bg-blue-400 hover:text-white mt-1 px-3 py-2 rounded-md text-base text-gray-500">{{__('Another Link')}}</a>
                <a href="#"
                   class=" block  focus:outline-none focus:text-white font-medium hover:bg-blue-400 hover:text-white mt-1 px-3 py-2 rounded-md text-base text-gray-500">{{__('Another one')}}</a>
                <a href="#"
                   class=" block  focus:outline-none focus:text-white font-medium hover:bg-blue-400 hover:text-white mt-1 px-3 py-2 rounded-md text-base text-gray-500">{{__('Reports')}}</a>
                <button class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-white hover:text-white hover:bg-blue-400 focus:outline-none focus:text-white focus:bg-gray-700"
                   @click="logout">Logout</button>
        </div>
    <!-- your cart -->
    <div :class="cartOpen  ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 z-30 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-medium text-teal-800">{{__('Your cart')}}</h3>
            <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <hr class="my-3">
        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80" alt="">
                <div class="mx-3">
                    <h3 class="text-sm text-gray-600">{{__('Mac Book Pro')}}</h3>
                    <div class="flex items-center mt-2">
                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <span class="text-gray-700 mx-2">2</span>
                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <span class="text-gray-600">20$</span>
        </div>
        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80" alt="">
                <div class="mx-3">
                    <h3 class="text-sm text-gray-600">{{__('Mac Book Pro')}}</h3>
                    <div class="flex items-center mt-2">
                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <span class="text-gray-700 mx-2">2</span>
                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <span class="text-gray-600">20$</span>
        </div>
        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80" alt="">
                <div class="mx-3">
                    <h3 class="text-sm text-gray-600">{{__('Mac Book Pro')}}</h3>
                    <div class="flex items-center mt-2">
                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <span class="text-gray-700 mx-2">2</span>
                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <span class="text-gray-600">20$</span>
        </div>
        <div class="mt-8">
            <form class="flex items-center justify-center">
                <input class="form-input w-48" type="text" placeholder="Add promocode">
                <button class="ml-3 flex items-center px-3 py-2 bg-teal-800 text-white text-sm uppercase font-medium rounded hover:bg-teal-700 focus:outline-none focus:bg-teal-700">
                    <span>{{__('Apply')}}</span>
                </button>
            </form>
        </div>
        <a href="/cart" class="flex items-center justify-center mt-4 px-3 py-2 bg-teal-800 text-white text-sm uppercase font-medium rounded hover:bg-teal-700 focus:outline-none focus:bg-teal-700">
            <span>{{__('Chechout')}}</span>
            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
    </nav>

    <nav class="bg-center bg-cover bg_image md:hidden">
        <div class="">
            <img src="../../images/LOGO-1.png" class="container mb-3 mx-auto pt-10 w-32" alt="">
            <div class="text-center">
                <span class="-mx-8 -mt-1 absolute bg-teal-600 h-1 w-16"></span>
                <h1 class="font-medium text-sm text-teal-500 uppercase">{{__('store')}}</h1>
            </div>
        </div>
        <div class="container flex justify-between mx-auto px-6 py-5">
            <div class="text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </div>
            <div class="flex text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <a href="#" class="mx-2">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor" />
                    </svg>                    
                </a>
                <span class="-mt-3 absolute bg-red-500 flex font-bold h-4 items-center justify-center mx-6 rounded-full text-white text-xs w-4">3</span>
                
                <a href="#" class="">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 shopping-cart w-6" @click="cartOpen = !cartOpen">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>                                
                </a>
                <span class="-mt-3 absolute bg-red-500 flex font-bold h-4 items-center justify-center mx-16 rounded-full text-white text-xs w-4">3</span>
            </div>
        </div>
    </nav>
</div>
    
</template>

<script>
import LanguageSelector from '../../Shared/LanguageSelector'
export default {
    name: "BaseNav",
    components:{LanguageSelector},
    data() {
        return {
            cartOpen:false,
            isOpen:false,
            view: {
                atTopOfPage: true
            }
        }
    },
    beforeMount () {
        window.addEventListener('scroll', this.handleScroll);
    },
        methods: {
            logout() {
                axios.post('logout')
                    .then(() => location.reload());
            },
            handleScroll(){
                // when the user scrolls, check the pageYOffset
                if(window.pageYOffset>0){
                    // user is scrolled
                    if(this.view.atTopOfPage) this.view.atTopOfPage = false
                }else{
                    // user is at top of page
                    if(!this.view.atTopOfPage) this.view.atTopOfPage = true
                }
            },
            close(){
                this.isOpen = false
            }
        }
    }
</script>

<style scoped>
nav {
    z-index: 10
}

nav.scrolled {
    @apply shadow-2xl;
    @apply border-b-2 ;
    @apply border-teal-500;


}
    .bg_image{
        background-image: url('../../images/1223/bg.png');
    }
</style>
