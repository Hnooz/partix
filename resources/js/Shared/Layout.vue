<template>
    <div class="flex flex-col md:flex-row relative overflow-hidden" :dir="changedir == 'ar' ? 'rtl' : 'ltr'">

        <base-sidebar></base-sidebar>

        <div class="w-full md:flex-1">
            <nav class="hidden md:flex justify-between items-center bg-white p-4 shadow-md h-24">
                <div class="flex font-hairline items-center leading-none mx-5 text-teal-700">
                    <div>
                        <h1 class="text-2xl"><span class="font-semibold mx-2" dir="auto">{{__('Admin')}} </span> {{__('Dashboard')}} </h1>
                    </div>
                    

                    <div class="flex mx-16 text-teal-600" dir="auto">
                        <a class="flex items-center" href="#">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{__('Calendar')}}
                        </a>
                        <a class="flex items-center mx-2" href="#">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 7H7V9H9V7Z" fill="currentColor" /><path d="M7 13V11H9V13H7Z" fill="currentColor" /><path d="M7 15V17H9V15H7Z" fill="currentColor" /><path d="M11 15V17H17V15H11Z" fill="currentColor" /><path d="M17 13V11H11V13H17Z" fill="currentColor" /><path d="M17 7V9H11V7H17Z" fill="currentColor" /></svg>
                            {{__('To do list')}}
                        </a>
                    </div>
                </div>

                
                <div class="flex items-center mx-6 text-teal-700">
                    <!-- for test only -->
                    <LanguageSelector />

                    <button class="focus:outline-none mx-2">
                        <i class="absolute bg-red-700 flex h-4 items-center justify-center mx-4 rounded-full text-white text-xs w-4">3</i>
                        <svg class="w-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
                    </button>
                    <a href="#" class="mx-1"><img class="h-12 object-center object-cover rounded-full w-12" src="../images/panda.jpg" alt=""></a>
                    <svg class="w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.34317 7.75732L4.92896 9.17154L12 16.2426L19.0711 9.17157L17.6569 7.75735L12 13.4142L6.34317 7.75732Z" fill="currentColor" /></svg>
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
