<template>
    <div class="flex flex-col md:flex-row relative overflow-hidden">

        <base-sidebar></base-sidebar>

        <div class="w-full md:flex-1">
            <nav class="hidden md:flex justify-between items-center bg-white p-4 shadow-md h-24">
                <div class="font-hairline leading-none mx-5 text-indigo-900">
                    <!-- <input class="px-4 py-2 bg-gray-200 border border-gray-300 rounded focus:outline-none" type="text"
                           placeholder="Search.."/> -->
                    <h1 class="text-2xl">Hello <span class="font-semibold">Admin !</span></h1>
                    <p>welcome to your dashboard</p>
                </div>
                <div class="flex mx-6">
                    <button class="focus:outline-none mx-2 text-gray-500">
                        <i class="absolute bg-red-700 flex h-2 justify-center ml-4 rounded-full w-2"></i>
                        <svg class="w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    <a href="#"><img class="h-12 object-center object-cover rounded-full w-12" src="../images/panda.jpg" alt=""></a>
                </div>
            </nav>
            <main>
                <!-- Replace with your content -->
                <div class="px-8 py-6">
                    <slot></slot>
                </div>
                <!-- /End replace -->
            </main>
            <footer class="bg-white font-semibold mt-10 py-5 text-center text-gray-600">
            Partix &copy; 2020
        </footer>
        </div>

        <flash v-if="$page.flash" :type="$page.flash.type" :popstate="$page.popstate">{{ $page.flash.message}}</flash>
    </div>
</template>

<script>
    import Flash from "../components/UI/Flash";
    export default {
        components: {Flash},
        methods: {
            // logout() {
            //     axios.post('/logout')
            //         .then(() => location.reload());
            // }
        }
    }
</script>
