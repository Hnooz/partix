<template>
    <aside class="w-full md:w-64 md:min-h-screen bg_image bg-center bg-cover">
        <div :class="isOpen ? 'hidden' : ''" class="flex h-24 items-baseline justify-between md:fixed md:h-16 md:items-center md:mx-0 md:p-4 mx-5">
            <inertia-link href="/dashboard" class="flex items-center mt-10">
                <img src="../../images/LOGO-1-W.png"  class="w-24 md:w-40" alt="">
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

            <svg :class="this.$page.locale == 'ar' ? 'left-0' : 'right-0'" @click="isOpen = !isOpen"  class="-mx-24 absolute bg-teal-700 block cursor-pointer h-6 md:hidden mt-5  rounded-full text-white w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            <inertia-link href="/dashboard" class="flex items-center md:hidden mt-6 mx-10">
                <img src="../../images/LOGO-1-W.png"  class="w-24 md:hidden md:w-40" alt="">
            </inertia-link>
            <ul class="md:fixed md:mt-16 mt-10 mx-6">
                <li class="px-4 py-3  rounded" :class="route().current('dashboard.index')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard" class="flex items-center" :class="$page.auth.user.isAdmin.is_admin == 0 ? 'hidden' : 'visible'">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path></svg>
                        <span class="mx-4 capitalize">{{__('dashboard')}}</span>
                    </inertia-link>
                </li>
                <li class="px-2 pb-4 rounded" :class="route().current('orders.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/orders" class="flex items-center">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 mx-2 ">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                        <h1 class="mx-2  whitespace-no-wrap capitalize">{{__('orders')}} <span class="bg-red-600 font-semibold p-1 rounded-md text-white text-xs">{{this.$page.order.total}}</span></h1>
                    </inertia-link>
                </li>
                <li class="px-2 pb-4 rounded" :class="route().current('users.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/users" class="flex items-center"  :class="$page.auth.user.isAdmin.is_admin == 0 ? 'hidden' : 'visible'">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="mx-2 capitalize">{{__('users')}}</span>   
                    </inertia-link>
                </li>
                <li class="px-2 pb-4 rounded" :class="route().current('suppliers.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/suppliers" class="flex items-center"  :class="$page.auth.user.isAdmin.is_admin == 0 ? 'hidden' : 'visible'">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="mx-2 capitalize">{{__('suppliers')}}</span>
                    </inertia-link>
                </li>                
                 <li class="px-2 pb-4" :class="route().current('parts.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/parts" class="flex items-center"  :class="$page.auth.user.isAdmin.is_admin == 0 ? 'hidden' : 'visible'">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="mr-3 mx-2 capitalize">{{__('parts')}}</span>  
                    </inertia-link>
                </li>
                <li class="px-2 pb-4" :class="route().current('brands.*') || route().current('cars.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/brands" class="flex items-center"  :class="$page.auth.user.isAdmin.is_admin == 0 ? 'hidden' : 'visible'">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                        <span class="mr-3 mx-2 capitalize">{{__('brands')}}</span>  
                    </inertia-link>
                </li>
                <li class="px-2 pb-4" :class="route().current('super_categories.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/super_categories" class="flex items-center"  :class="$page.auth.user.isAdmin.is_admin == 0 ? 'hidden' : 'visible'">
                        <svg class="w-6 mx-2 transform rotate-45" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.7572 6.3431L11.9998 2.10046L16.2425 6.3431L11.9998 10.5857L7.7572 6.3431ZM10.5856 6.3431L11.9998 4.92889L13.4141 6.3431L11.9998 7.75732L10.5856 6.3431Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M2.10046 11.9999L6.3431 7.75726L10.5857 11.9999L6.3431 16.2425L2.10046 11.9999ZM4.92889 11.9999L6.3431 10.5857L7.75732 11.9999L6.3431 13.4141L4.92889 11.9999Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M13.4142 11.9999L17.6568 16.2425L21.8995 11.9999L17.6568 7.75726L13.4142 11.9999ZM17.6568 10.5857L16.2426 11.9999L17.6568 13.4141L19.071 11.9999L17.6568 10.5857Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M7.7572 17.6569L11.9998 13.4142L16.2425 17.6569L11.9998 21.8995L7.7572 17.6569ZM10.5856 17.6569L11.9998 16.2427L13.4141 17.6569L11.9998 19.0711L10.5856 17.6569Z" fill="currentColor" /></svg>
                        <span class="mr-3 mx-2 capitalize" dir="auto">{{__('super categories')}}</span>  
                    </inertia-link>
                </li>
                <li class="px-2 pb-4" :class="route().current('categories.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/categories" class="flex items-center"  :class="$page.auth.user.isAdmin.is_admin == 0 ? 'hidden' : 'visible'">
                        <svg class="w-6 mx-2 transform rotate-45" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.7572 6.3431L11.9998 2.10046L16.2425 6.3431L11.9998 10.5857L7.7572 6.3431ZM10.5856 6.3431L11.9998 4.92889L13.4141 6.3431L11.9998 7.75732L10.5856 6.3431Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M2.10046 11.9999L6.3431 7.75726L10.5857 11.9999L6.3431 16.2425L2.10046 11.9999ZM4.92889 11.9999L6.3431 10.5857L7.75732 11.9999L6.3431 13.4141L4.92889 11.9999Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M13.4142 11.9999L17.6568 16.2425L21.8995 11.9999L17.6568 7.75726L13.4142 11.9999ZM17.6568 10.5857L16.2426 11.9999L17.6568 13.4141L19.071 11.9999L17.6568 10.5857Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M7.7572 17.6569L11.9998 13.4142L16.2425 17.6569L11.9998 21.8995L7.7572 17.6569ZM10.5856 17.6569L11.9998 16.2427L13.4141 17.6569L11.9998 19.0711L10.5856 17.6569Z" fill="currentColor" /></svg>
                        <span class="mr-3 mx-2 capitalize">{{__('categories')}}</span>  
                    </inertia-link>
                </li>
                

                <li class="px-2 pb-4" :class="route().current('coupons.*')? 'text-teal-600' : 'text-white hover:text-teal-600'">
                    <inertia-link href="/dashboard/coupons" class="flex items-center"  :class="$page.auth.user.isAdmin.is_admin == 0 ? 'hidden' : 'visible'">
                        <svg class="w-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>                        
                        <span class="mr-3 mx-2 capitalize">{{__('coupon code')}}</span>  
                    </inertia-link>
                </li>
                <li class="px-2 mt-4 hidden md:block">
                    <a href="#" class="flex items-center text-white hover:text-teal-600">
                        <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <button class="mx-2 capitalize" @click="logout">{{__('logout')}}</button>
                    </a>                   
                </li>
            </ul>

            <ul class="md:hidden md:mt-48 mt-10 mx-8">
                <li class="flex px-2 text-white hover:text-teal-600 rounded">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <button class="mx-2 capitalize" @click="logout">{{__('logout')}}</button>
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
