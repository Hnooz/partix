<template>
    <nav class="bg-teal-500">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center w-1/2">
                    <div class="flex-shrink-0">
                        <a href="#" class="flex items-center">
                            <span class="text-gray-300 text-xl font-semibold mx-2">Partix</span>

                            <svg viewBox="0 0 20 20" fill="currentColor" class="x w-6 h-6 text-white"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

                        </a>
                    </div>
                    <!-- <div class="hidden md:block">
                        <div class="mx-10 flex items-baseline">
                            <a href="#"
                               class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">Home</a>
                            <a href="#"
                               class="mx-1 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Link</a>
                            <a href="#"
                               class="mx-1 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Another Link</a>
                            <a href="#"
                               class="mx-1 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Another one</a>
                            <a href="#"
                               class="mx-1 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Reports</a>
                        </div>
                    </div> -->
                </div>
                <div class="hidden md:block w-1/2">
                    <div class="flex">
                        <form action="#" method="post" class="ml-48 pl-3 w-full">
                            <input type="search" name="" id="" class="focus:outline-none h-full outline-none p-2 placeholder-gray-700 rounded text-gray-700 text-sm w-5/6" placeholder="Enter the part number or name">
                            <input type="submit" value="search" class="border-2 bg-white focus:outline-none font-medium hover:bg-transparent hover:border-white hover:text-white outline-none p-1 rounded  text-sm text-teal-500">
                        </form>
                        <!-- <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700" @click="logout">Logout</button> -->
                    </div>
                </div>
                <div class="-ml-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button @click="isOpen = !isOpen"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!--
          Mobile menu, toggle classes based on menu state.

          Open: "block", closed: "hidden"
        -->
        <div class="block md:hidden" v-show="isOpen">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <!-- <a href="#"
                   class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">Home</a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Link</a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Another Link</a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Another one</a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Reports</a>
                <button class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                   @click="logout">Logout</button> -->

                   <form action="#" method="post" class="pl-3">
                            <input type="search" name="" id="" class="focus:outline-none h-full outline-none p-2 placeholder-gray-700 rounded text-gray-700 text-sm w-3/4" placeholder="Enter the part number or name">
                            <input type="submit" value="search" class="border-2 bg-white focus:outline-none font-medium hover:bg-transparent hover:border-white hover:text-white outline-none p-1 px-2 rounded text-sm text-teal-500">
                        </form>

            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "BaseNav",
        data() {
            return {
                isOpen: false
            }
        },
        // methods: {
        //     logout() {
        //         axios.post('logout')
        //             .then(() => location.reload());
        //     }
        // }
    }
</script>

<style scoped>

</style>
