<template>
    <store-layout>
   
        <div>
            <button type="button" class="bg-teal-700 border-2 border-teal-700 flex hover:bg-transparent hover:text-teal-700 mt-8 mx-auto px-3 rounded text-white"><a href="/store" class="text-3xl capitalize">back to store</a></button>
            <img class="w-full h-screen object-fill object-center" src="../../images/oops-404-error-with-a-broken-robot-animate.svg" alt="">
        </div>

    </store-layout>
</template>

<script>

import StoreLayout from '../../Shared/StoreLayout.vue'


    export default {
        components:{
            StoreLayout,

        },
       
    }
</script>
