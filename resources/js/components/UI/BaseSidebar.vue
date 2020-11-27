<template>
    <aside class="w-full md:w-64 md:min-h-screen bg_image bg-center bg-cover">
        <div :class="isOpen ? 'hidden' : ''" class="flex h-24 items-baseline justify-between md:fixed md:h-16 md:items-center md:mx-0 md:p-4 mx-5">
            <inertia-link href="/dashboard" class="flex items-center mt-10">
                <img src="../../images/LOGO-1.png"  class="w-24 md:w-40" alt="">
            </inertia-link>
            <div class="flex md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                        class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">

                    <svg v-if="!isOpen" class="fill-current w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>

                    <svg v-if="isOpen"  class="w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        <!-- mobile view -->
        <div :class="isOpen? 'block': 'hidden'" class="bg_image bg-center bg-cover fixed h-full md:block md:pt-24  px-2 py-6 top-0 z-10 md:pr-0" >

            <svg @click="isOpen = !isOpen"  class="-mx-24 absolute bg-teal-700 block cursor-pointer h-6 md:hidden mt-5 right-0 rounded-full text-white w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>

            <inertia-link href="/dashboard" class="flex items-center md:hidden mt-6 mx-10">
                <img src="../../images/LOGO-1.png"  class="w-24 md:hidden md:w-40" alt="">
            </inertia-link>

            <ul class="md:fixed md:mt-16 mt-10 mx-6">
                <li class="px-4 py-3  rounded" :class="route().current('dashboard.index')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard" class="flex items-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path></svg>
                        <span class="mx-4">Dashboard</span>
                    </inertia-link>
                </li>

                <li class="px-2 pb-4 rounded" :class="route().current('orders.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/orders" class="flex items-center">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 mx-2 ">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                        <h1 class="mx-2  whitespace-no-wrap">Orders <span class="bg-red-600 font-semibold p-1 rounded-md text-white text-xs">56</span></h1>
                        
                    </inertia-link>
                </li>


                <li class="px-2 pb-4 rounded" :class="route().current('users.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/users" class="flex items-center">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="mx-2">Customers</span>
                        
                    </inertia-link>
                </li>
                
                 <li class="px-2 pb-4" :class="route().current('parts.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/parts" class="flex items-center">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="mr-3 mx-2">Parts</span>  
                    </inertia-link>
                </li>

                <li class="px-2 pb-4" :class="route().current('cars.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/cars" class="flex items-center">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                        <span class="mr-3 mx-2">Cars</span>  
                    </inertia-link>
                </li>

                <li class="px-2 pb-4" :class="route().current('categories.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/categories" class="flex items-center">
                        <svg class="w-6 mx-2 transform rotate-45" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.7572 6.3431L11.9998 2.10046L16.2425 6.3431L11.9998 10.5857L7.7572 6.3431ZM10.5856 6.3431L11.9998 4.92889L13.4141 6.3431L11.9998 7.75732L10.5856 6.3431Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M2.10046 11.9999L6.3431 7.75726L10.5857 11.9999L6.3431 16.2425L2.10046 11.9999ZM4.92889 11.9999L6.3431 10.5857L7.75732 11.9999L6.3431 13.4141L4.92889 11.9999Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M13.4142 11.9999L17.6568 16.2425L21.8995 11.9999L17.6568 7.75726L13.4142 11.9999ZM17.6568 10.5857L16.2426 11.9999L17.6568 13.4141L19.071 11.9999L17.6568 10.5857Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M7.7572 17.6569L11.9998 13.4142L16.2425 17.6569L11.9998 21.8995L7.7572 17.6569ZM10.5856 17.6569L11.9998 16.2427L13.4141 17.6569L11.9998 19.0711L10.5856 17.6569Z" fill="currentColor" /></svg>
                        <span class="mr-3 mx-2">Categories</span>  
                    </inertia-link>
                </li>

                <li class="px-2 pb-4" :class="route().current('coupons.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/coupons" class="flex items-center">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                        <!-- <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg> -->
                        <span class="mr-3 mx-2">Coupon Code</span>  
                    </inertia-link>
                </li>

                <li class="px-2 pb-4" :class="route().current('comments.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/comments" class="flex items-center">
                        <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <span class="mr-3 mx-2">Comments</span>  
                    </inertia-link>
                </li>

                <li class="px-2 pb-4">
                    <a href="#" class="flex items-center text-white hover:text-teal-600">
                        <svg class="w-6 mx-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.20348 2.00378C9.46407 2.00378 10.5067 3.10742 10.6786 4.54241L19.1622 13.0259L11.384 20.8041C10.2124 21.9757 8.31291 21.9757 7.14134 20.8041L2.8987 16.5615C1.72713 15.3899 1.72713 13.4904 2.8987 12.3188L5.70348 9.51404V4.96099C5.70348 3.32777 6.82277 2.00378 8.20348 2.00378ZM8.70348 4.96099V6.51404L7.70348 7.51404V4.96099C7.70348 4.63435 7.92734 4.36955 8.20348 4.36955C8.47963 4.36955 8.70348 4.63435 8.70348 4.96099ZM8.70348 10.8754V9.34247L4.31291 13.733C3.92239 14.1236 3.92239 14.7567 4.31291 15.1473L8.55555 19.3899C8.94608 19.7804 9.57924 19.7804 9.96977 19.3899L16.3337 13.0259L10.7035 7.39569V10.8754C10.7035 10.9184 10.7027 10.9612 10.7012 11.0038H8.69168C8.69941 10.9625 8.70348 10.9195 8.70348 10.8754Z" fill="currentColor" /><path d="M16.8586 16.8749C15.687 18.0465 15.687 19.946 16.8586 21.1175C18.0302 22.2891 19.9297 22.2891 21.1013 21.1175C22.2728 19.946 22.2728 18.0465 21.1013 16.8749L18.9799 14.7536L16.8586 16.8749Z" fill="currentColor" /></svg>
                        <span class="mr-3 mx-2">Appearance</span>  
                    </a>
                </li>

                <li class="px-2 mt-16 hidden md:block">
                    <a href="#" class="flex items-center text-white hover:text-teal-600">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="mx-2">Profile</span>
                    </a>
                </li>

                <li class="px-2 mt-4 hidden md:block">
                    <a href="#" class="flex items-center text-white hover:text-teal-600">
                        <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <button class="mx-2" @click="logout">Logout</button>
                    </a>
                   
                </li>

            </ul>

            <ul class="md:hidden md:mt-48 mt-10 mx-8">
                <li class="flex px-2 py-3 text-white hover:text-teal-600 rounded mt-2">
                    <svg class="w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <a href="#" class="mx-2">Profile</a>
                </li>
                <li class="flex px-2 text-white hover:text-teal-600 rounded">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <button class="mx-2" @click="logout">Logout</button>
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

<style>
    .bg_image{
        background-image: url('../../images/1223/bg.png');
    }
</style>
