<template>
    <nav :class="{ 'scrolled': !view.atTopOfPage }" 
        class="animated bg-white border-teal-500 fixed flex flex-wrap items-center justify-between m-auto md:pt-5 md:pb-32 pb-6 shadow-md top-0 w-full">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
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
                <div class="flex items-center justify-center md:w-full w-11/12">
                    <div class="flex-shrink-0">
                        <img src="../../images/LOGO-1.png" class="w-32" alt="">
                    </div>
                </div>
                
                <div class="hidden md:block md:mx-auto my-6">
                    <div class="flex">
                        <form action="#" method="post" class="md:mt-3 md:w-3/4 pl-3 w-full whitespace-pre">
                            <input type="search" name="" id="" class="bg-white border border-gray-400 focus:border-teal-300 focus:outline-none lg:ml-64 md:w-1/2 outline-none p-2 placeholder-gray-700 rounded sm:ml-0 text-gray-700 text-sm" placeholder="Enter the part number or name">
                            <input type="submit" value="search" class="bg-blue-400 border-2 border-transparent focus:outline-none font-medium hover:bg-white hover:border-teal-500 hover:text-teal-500 md:px-10 outline-none p-2 px-2 rounded text-sm text-white">
                        </form>

                        <div class="border flex items-center mt-3 px-3 rounded whitespace-pre">

                            <a href="#"><svg viewBox="0 0 20 20" fill="currentColor" class="h-8 shopping-cart text-blue-400 w-8" @click="cartOpen = !cartOpen">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg></a>

                            <span class="font-bold text-gray-400 text-sm">&nbsp; 4 item</span>

                            <span class="font-bold text-gray-400 text-sm">&nbsp; $33,45 &nbsp;</span>

                            <svg viewBox="0 0 20 20" fill="currentColor" class="text-gray-400 chevron-down h-6 w-6">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>

                        </div>
                        <!-- <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700" @click="logout">Logout</button> -->
                    </div>
                </div>

                <div class="hidden justify-between md:flex pt-2">
                    <a class="bg-blue-400 capitalize font-medium hover:scale-105 px-8 py-1 rounded text-white transform" href="/store">Home</a>
                    <a class="hover:bg-blue-400 hover:text-white capitalize font-medium hover:scale-105 px-8 py-1 rounded text-gray-500 transform" href="/categories">Categories</a>
                    <a class="hover:bg-blue-400 hover:text-white capitalize font-medium hover:scale-105 px-8 py-1 rounded text-gray-500 transform" href="/items">Items</a>
                    <a class="hover:bg-blue-400 hover:text-white capitalize font-medium hover:scale-105 px-8 py-1 rounded text-gray-500 transform" href="#">test</a>
                    <a class="hover:bg-blue-400 hover:text-white capitalize font-medium hover:scale-105 px-8 py-1 rounded text-gray-500 transform" href="#">test</a>
                    <a class="hover:bg-blue-400 hover:text-white capitalize font-medium hover:scale-105 px-8 py-1 rounded text-gray-500 transform" href="#">test</a>
                    <a class="hover:bg-blue-400 hover:text-white capitalize font-medium hover:scale-105 px-8 py-1 rounded text-gray-500 transform" href="#">test</a>
                    <a class="hover:bg-blue-400 hover:text-white capitalize font-medium hover:scale-105 px-8 py-1 rounded text-gray-500 transform" href="#">test</a>
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
                <input type="search" name="" id="" class="bg-white border border-gray-400 focus:border-teal-300 focus:outline-none lg:ml-64 w-3/4 outline-none p-2 placeholder-gray-700 rounded sm:ml-0 text-gray-700 text-sm" placeholder="Enter the part number or name">
                <input type="submit" value="search" class="bg-blue-400 border-2 border-transparent focus:outline-none font-medium hover:bg-white hover:border-teal-500 hover:text-teal-500 md:px-10 outline-none p-2 px-2 rounded text-sm text-white">
            </form>
            <!-- <form action="#" method="post" class="md:mt-3 md:w-3/4 pl-3 w-full whitespace-pre">
                <input type="search" name="" id="" class="bg-white border border-gray-400 focus:border-teal-300 focus:outline-none lg:ml-64 md:w-1/2 outline-none p-2 placeholder-gray-700 rounded sm:ml-0 text-gray-700 text-sm" placeholder="Enter the part number or name">
                <input type="submit" value="search" class="bg-blue-400 border-2 border-transparent focus:outline-none font-medium hover:bg-white hover:border-teal-500 hover:text-teal-500 md:px-10 outline-none p-2 px-2 rounded text-sm text-white">
            </form> -->
        </div>

        <div v-if="isOpen" class="absolute bg-white  h-screen md:hidden pb-3 pt-2 px-2 sm:px-3 top-0 w-3/4">
            <svg @click="isOpen = !isOpen"  class="-mr-8 absolute bg-gray-200 block cursor-pointer h-6 right-0 rounded-full text-blue-500 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
    
            <a href="/store"
                   class="block bg-blue-400 focus:outline-none focus:text-white font-medium  px-3 py-2 rounded-md text-base text-white">Home</a>
                <a href="/categories"
                   class=" block  focus:outline-none focus:text-white font-medium hover:bg-blue-400 hover:text-white mt-1 px-3 py-2 rounded-md text-base text-gray-500">Categories</a>
                <a href="#"
                   class=" block  focus:outline-none focus:text-white font-medium hover:bg-blue-400 hover:text-white mt-1 px-3 py-2 rounded-md text-base text-gray-500">Another Link</a>
                <a href="#"
                   class=" block  focus:outline-none focus:text-white font-medium hover:bg-blue-400 hover:text-white mt-1 px-3 py-2 rounded-md text-base text-gray-500">Another one</a>
                <a href="#"
                   class=" block  focus:outline-none focus:text-white font-medium hover:bg-blue-400 hover:text-white mt-1 px-3 py-2 rounded-md text-base text-gray-500">Reports</a>
                <button class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-white hover:text-white hover:bg-blue-400 focus:outline-none focus:text-white focus:bg-gray-700"
                   @click="logout">Logout</button>
        </div>
    <!-- your cart -->
    <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
            <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <hr class="my-3">
        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80" alt="">
                <div class="mx-3">
                    <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
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
                    <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
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
                    <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
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
                <button class="ml-3 flex items-center px-3 py-2 bg-blue-400 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>Apply</span>
                </button>
            </form>
        </div>
        <a href="/cart" class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-400 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
            <span>Chechout</span>
            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
    </nav>
</template>

<script>
export default {
    name: "BaseNav",
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
</style>
