<template>
    <aside class="w-full md:w-64 bg-indigo-900 md:min-h-screen">
        <div class="flex items-center justify-between p-4 h-16 md:fixed">
            <inertia-link href="/dashboard" class="flex items-center">
                <svg class="w-6" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32.6883 0.335913C32.3407 -0.0248702 31.7929 -0.104067 31.3596 0.142322L19.2249 6.96861L20.3117 1.53926C20.4063 1.06188 20.1797 0.582302 19.7529 0.353512C19.3261 0.126923 18.7981 0.199519 18.455 0.544904L2.96986 16.03C2.94127 16.052 2.91487 16.0762 2.89067 16.1026C1.02735 17.9945 0 20.4804 0 23.1005C0 28.5584 4.4416 33 9.89955 33C12.5218 33 15.0077 31.9727 16.8974 30.1115C16.926 30.0829 16.9502 30.0543 16.9766 30.0235L30.1232 16.8792C30.4532 16.5492 30.539 16.0454 30.3366 15.6252C30.1364 15.205 29.6876 14.9674 29.2235 15.0092L24.4409 15.5394L32.8379 1.67125C33.0975 1.24227 33.0381 0.694497 32.6883 0.335913ZM9.89955 29.7002C6.25431 29.7002 3.29985 26.7457 3.29985 23.1005C3.29985 19.4552 6.25431 16.5008 9.89955 16.5008C13.5448 16.5008 16.4992 19.4552 16.4992 23.1005C16.4992 26.7457 13.5448 29.7002 9.89955 29.7002Z" fill="#667EEA"/>
                </svg>

                <span class="text-gray-300 text-xl font-semibold mx-2">Dashboard</span>
                <!-- <img src="../../images/LOGO-1.png"  class="" alt=""> -->
            </inertia-link>
            <div class="flex md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                        class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                    <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="px-2 md:pt-24 py-6 md:block" :class="isOpen? 'block': 'hidden'">
            <ul class="md:fixed">
                <li class="px-2 py-3  rounded" :class="route().current('dashboard.index')? 'text-blue-400' : 'text-white'">
                    <inertia-link href="/dashboard" class="flex items-center">
                        <!-- <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg> -->
                        <img class="w-10 h-10" src="../../images/cube.svg" alt="" >
                        <span class="mx-2">Dashboard</span>
                    </inertia-link>
                </li>

                <li class="px-2 pb-4 rounded">
                    <a href="#" class="flex items-center text-white hover:text-blue-400">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 mx-2 ">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                        <h1 class="mx-2  whitespace-no-wrap">Orders <span class="bg-red-600 font-semibold p-1 rounded-md text-white text-xs">56</span></h1>

                        <svg class="ml-3  w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </a>
                </li>


                <li class="px-2 pb-4 rounded" :class="route().current('users.*')? 'text-blue-400' : 'text-white hover:text-blue-400'">
                    <inertia-link href="/dashboard/users" class="flex items-center">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="mx-2">Customers</span>
                        <svg class="ml-2 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </inertia-link>
                </li>
                
                <li class="px-2 pb-4">
                    <a href="#" class="flex items-center text-white hover:text-blue-400">
                        <svg class="w-6 mx-2" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="mr-3 mx-2">Brands</span>
                        <svg class="ml-8 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </a>
                </li>

                <li class="px-2 pb-16 hidden md:block md:fixed bottom-0">
                    <a href="#" class="flex items-center text-white hover:text-blue-400">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="mx-2">Settings</span>
                    </a>
                </li>

            </ul>
            <div class="border-t border-gray-700 -mx-2 mt-2 md:hidden"></div>
            <ul class="mt-6 md:hidden">
                <li class="px-2 py-3 hover:text-blue-400 rounded mt-2">
                    <a href="#" class="mx-2 text-white hover:text-blue-400">Settings</a>
                </li>
                <li class="px-2 py-3 hover:text-blue-400 rounded mt-2">
                    <button class="mx-2 text-white hover:text-blue-400" @click="logout">Logout</button>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script>
    export default {
        name: "BaseSidebar",
        data() {
            return {
                isOpen: false
            }
        },
        methods: {
            logout() {
                axios.post('/logout')
                    .then(() => location.reload());
            }
        }
    }
</script>

<style scoped>

</style>
