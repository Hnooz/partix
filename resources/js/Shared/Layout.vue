<template>
    <div class="flex flex-col md:flex-row relative overflow-hidden" :dir="changedir == 'ar' ? 'rtl' : 'ltr'">

        <base-sidebar></base-sidebar>

        <div class="w-full md:flex-1">
            <nav class="flex justify-between items-center bg-white p-4 shadow-md h-24">
                <div class="flex font-hairline items-center leading-none mx-5 text-teal-700">
                    <div>
                        <h1 class="md:text-2xl whitespace-no-wrap"><span class="font-semibold mx-2 capitalize" dir="auto">{{__('Admin')}} </span> {{__('dashboard')}} </h1>
                    </div>
                    
                </div>

                
                <div class="flex items-center mx-6 text-teal-700">
                    <a href="/store" class="font-semibold hover:scale-105 transform">{{__('store')}}</a>
                    <LanguageSelector />

                    <button class="focus:outline-none mx-2">
                        <i class="absolute bg-red-700 flex h-4 items-center justify-center mx-4 rounded-full text-white text-xs w-4">{{$page.order.total}}</i>
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
            <footer class="bg-white font-semibold py-5 text-sm md:text-base text-center text-teal-500 uppercase">
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
