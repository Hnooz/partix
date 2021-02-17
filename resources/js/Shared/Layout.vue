<template>
    <div class="relative flex flex-col overflow-hidden md:flex-row" :dir="changedir == 'ar' ? 'rtl' : 'ltr'">

        <base-sidebar></base-sidebar>

        <div class="w-full md:flex-1">
            <nav class="flex items-center justify-between h-24 p-4 bg-white shadow-md">
                <div class="flex items-center mx-5 font-hairline leading-none text-teal-700">
                    <div>
                        <h1 class="whitespace-no-wrap md:text-2xl"><span class="mx-2 font-semibold capitalize" dir="auto">{{$page.auth.user.isAdmin.name}} </span> {{__('dashboard')}} </h1>
                    </div>
                    
                </div>

                
                <div class="flex items-center mx-6 text-teal-700">
                    <a href="/store" class="font-semibold transform hover:scale-105">{{__('store')}}</a>
                    <LanguageSelector />

                    <button class="mx-2 focus:outline-none">
                        <i class="absolute flex items-center justify-center w-4 h-4 mx-4 text-xs text-white bg-red-700 rounded-full">{{$page.order.total}}</i>
                        <svg class="w-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
                    </button>
                    
                </div>
            </nav>
            <main class="min-h-screen">
                <!-- Replace with your content -->
                <div class="px-8 py-6">
                    <slot></slot>
                </div>
                <!-- /End replace -->
            </main>
            <footer class="py-5 text-sm font-semibold text-center text-teal-500 uppercase bg-white md:text-base">
               <span class="text-teal-700">Partix</span>  &copy; 2020
            </footer>
        </div>

        <flash v-if="$page.flash" :type="$page.flash.type" :popstate="$page.popstate">{{ $page.flash.message}}</flash>
    </div>
</template>

<script>
    import Flash from "../components/UI/Flash";
    import LanguageSelector from '../Shared/LanguageSelector'
    export default {
        components: {Flash,LanguageSelector},
        data() {
            return {
                changedir:this.$page.locale
            }
        },
        methods: {
            // logout() {
            //     axios.post('/logout')
            //         .then(() => location.reload());
            // }
        }
    }
</script>
