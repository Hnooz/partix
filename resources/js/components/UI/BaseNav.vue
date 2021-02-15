<template>
<div>
    <nav :class="{ 'scrolled': !view.atTopOfPage }" 
        class="top-0 flex-wrap items-center justify-between hidden w-full pb-6 m-auto bg-teal-700 shadow-md animated md:flex">
        <!-- top nav -->
        <div class="flex justify-between w-full px-20 py-4 font-medium text-white capitalize bg-teal-900">
            <h1>{{__('Call')}} | <span>{{__('78-5439-36')}}</span></h1>
            <LanguageSelector />
        </div>
        <div class="container p-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:block">
                <div class="flex -ml-2 md:hidden">
                    <!-- Mobile menu button -->
                    <button @click="isOpen = !isOpen"
                            class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md outline-none focus:outline-none">
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg :class="isOpen?'hidden':'block'" class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg :class="isOpen?'block':'hidden'" class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>                                
                <div class="hidden my-6 md:block md:mx-auto">
                    <div class="flex items-center justify-between">
                        <div class="">
                            <div class="flex-shrink-0">
                                <a href="/store">
                                <img src="../../images/LOGO-1-W.png" class="w-48" alt="">
                                </a>
                            </div>
                            <p class="font-medium text-white capitalize">{{__('share part soluation')}}</p>
                        </div>
                        <form @submit.prevent="submit" class="flex items-center pl-3 whitespace-pre" dir="auto">
                            <button class="mx-2 outline-none focus:outline-none" type="button">
                                <svg  class="w-10 h-10 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </button>
                            <search-component></search-component>
                        </form>
                        <div class="flex items-center p-3 ml-2 text-white whitespace-no-wrap bg-teal-900 rounded">
                            <button type="button" @click="wishlistOpen = !wishlistOpen">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor" />
                                </svg>
                            </button>
                            <span class="absolute flex justify-center w-5 h-5 -mt-12 text-sm font-bold bg-red-400 rounded-full">{{$page.wishlist.quantity}}</span>                            
                            <button type="button" class="mx-3" @click="cartOpen = !cartOpen">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 shopping-cart">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                </svg>                                
                            </button>
                            <span class="absolute flex justify-center w-5 h-5 mx-10 -mt-12 text-sm font-bold bg-red-400 rounded-full">{{$page.carts.quantity}}</span>                            
                            <span class="text-sm font-bold">{{$page.carts.totalPrice.toFixed()}} {{__('QAR')}}</span>
                        </div>
                    </div>
                </div>

                <div class="flex -mx-2 md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" @click="cartOpen = !cartOpen" class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md outline-none focus:outline-none">
                    
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-8 h-8 shopping-cart">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                    <span class="absolute flex items-center justify-center w-5 h-5 m-auto ml-3 -mt-3 text-xs text-white bg-blue-400 rounded-full">36</span>
                    
                    </button>
                </div>
            </div>
        </div>

        <!--
          Mobile menu, toggle classes based on menu state.

          Open: "block", closed: "hidden"
        -->
    <!-- your cart -->
    <div :class="cartOpen  ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed top-0 right-0 z-30 w-full h-full max-w-xs px-6 py-4 overflow-y-auto transition duration-300 transform bg-white border-l-2 border-gray-300">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-medium text-teal-800">{{__('Your cart')}}</h3>
            <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <hr class="my-3">
        <form>
            <div class="flex justify-between mt-6" v-for="item in $page.carts.content" :key="item.index">
                <div class="flex">
                    <img class="object-cover w-20 h-20 rounded" :src="item.attributes.url.url[0]" alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">{{item.name}}</h3>
                        <div class="flex items-center mt-2">
                            <button type="button" @click="increment(item)" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                            <span class="mx-2 text-gray-700">{{item.quantity}}</span>
                            <button type="button" @click="decrement(item)" class="text-gray-500 focus:outline-none focus:text-gray-600" :disabled="item.quantity == 1">
                                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="block text-gray-600">{{(item.price*item.quantity).toFixed()}}$</span>
                    <button @click="Delete(item)" class="text-sm font-medium text-red-500 outline-none focus:outline-none">remove</button>
                </div>
                
            </div>
        </form>
        
        <a href="/store/carts" class="flex items-center justify-center px-3 py-2 mt-4 text-sm font-medium text-white uppercase bg-teal-800 rounded hover:bg-teal-700 focus:outline-none focus:bg-teal-700">
            <span>{{__('Chechout')}}</span>
            <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>

    <Wishlist :openWishlist="wishlistOpen"/>
    </nav>

    <nav class="bg-center bg-cover bg_image md:hidden">
        <div class="flex justify-between w-full px-3 py-4 font-medium text-white capitalize bg-teal-900">
        <h1>{{__('Call')}} | <span>{{__('78-5439-36')}}</span></h1>
        <LanguageSelector />
        </div>
        <div class="">
            <img src="../../images/LOGO-1-W.png" class="container w-32 pt-10 mx-auto mb-3" alt="">
            <div class="text-center">
                <span class="absolute w-16 h-1 -mx-8 -mt-1 bg-teal-600"></span>
                <h1 class="text-sm font-medium text-teal-500 uppercase">{{__('store')}}</h1>
            </div>
        </div>
        <div class="container flex justify-between px-6 py-5 mx-auto">
            <div class="text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </div>
            <div class="flex text-white">
                <button type="button" @click="wishlistOpen = !wishlistOpen" class="mx-2">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor" />
                    </svg>                    
                </button>
                <span class="absolute flex items-center justify-center w-4 h-4 mx-6 -mt-3 text-xs font-bold text-white bg-red-500 rounded-full">{{$page.wishlist.quantity}}</span>
                
                <button type="button" @click="cartOpen = !cartOpen" class="outline-none focus:outline-none">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 shopping-cart" >
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>                                
                </button>
                <span class="absolute flex items-center justify-center w-4 h-4 mx-16 -mt-3 text-xs font-bold text-white bg-red-500 rounded-full">{{$page.carts.quantity}}</span>
            </div>
        </div>
        <div :class="cartOpen  ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed top-0 right-0 z-30 w-full h-full max-w-xs px-6 py-4 overflow-y-auto transition duration-300 transform bg-white border-l-2 border-gray-300">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-medium text-teal-800">{{__('Your cart')}}</h3>
            <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <hr class="my-3">
        <form>
            <div class="flex justify-between mt-6" v-for="item in $page.carts.content" :key="item.index">
                <div class="flex">
                    <img class="object-cover w-20 h-20 rounded" :src="item.attributes.url.url[0]" alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">{{item.name}}</h3>
                        <div class="flex items-center mt-2">
                            <button type="button" @click="increment(item)" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                            <span class="mx-2 text-gray-700">{{item.quantity}}</span>
                            <button type="button" @click="decrement(item)" class="text-gray-500 focus:outline-none focus:text-gray-600" :disabled="item.quantity == 1">
                                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="block text-gray-600">{{item.price.toFixed()}}$</span>
                    <button @click="Delete(item)" class="text-sm font-medium text-red-500 outline-none focus:outline-none">remove</button>
                </div>
                
            </div>
        </form>
        
        <a href="/store/carts" class="flex items-center justify-center px-3 py-2 mt-4 text-sm font-medium text-white uppercase bg-teal-800 rounded hover:bg-teal-700 focus:outline-none focus:bg-teal-700">
            <span>{{__('Chechout')}}</span>
            <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
        </div>
        <Wishlist :openWishlist="wishlistOpen"/>
    </nav>
</div>
    
</template>

<script>
import LanguageSelector from '../../Shared/LanguageSelector';
import Wishlist from '../UI/wishlist';
import SearchComponent from '../SearchComponent';
export default {
    name: "BaseNav",
    components:{ LanguageSelector, Wishlist, SearchComponent },
    props:{
    },
    data() {
        return {
            cartOpen:false,
            isOpen:false,
            wishlistOpen:false,
            view: {
                atTopOfPage: true
            },
            form:{
                name:'',
            }
        }
    },
    methods: {
        
        increment(item)
        {
            item.quantity++;
            this.$inertia.put(`/store/cart/${item.id}`, item);
        },

        decrement(item)
        {
            item.quantity--;
            this.$inertia.put(`/store/cart/${item.id}`, item);
        },
        Delete(item) {
            this.$inertia.delete(`/store/carts/${item.id}`);
        },
        logout() {
            axios.post('logout')
                .then(() => location.reload());
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
