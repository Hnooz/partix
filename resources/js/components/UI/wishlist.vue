<template>
    <div :class="openWishlist  ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 z-30 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-medium text-teal-800">{{__('favorite')}}</h3>
            <button @click="openWishlist = !openWishlist" class="text-gray-600 focus:outline-none">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <hr class="my-3">
        <form>
            <div class="flex justify-between mt-6" v-for="item in $page.wishlist.content" :key="item.index">
                <div class="flex">
                    <img v-if="item.attributes[0].url.length > 0" class="h-20 w-20 object-cover rounded border-2" :src="item.attributes[0].url[0]" alt="">
                    <img v-else class="h-20 w-20 object-cover rounded border-2" src="../../images/oops-404-error-with-a-broken-robot-animate.svg" alt="">
                    <div class="mx-3">
                        <inertia-link :href="'/store/details/'+item.id"  class="text-sm text-gray-600">{{item.name}}</inertia-link>
                    </div>
                </div>
                <div>
                    <span class="block text-gray-600">{{item.price.toFixed()}}$</span>
                    <button @click="Delete(item)" class="focus:outline-none font-medium outline-none text-red-500 text-sm">remove</button>
                </div>
                
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props:{
           openWishlist:Boolean,
        },

        methods: {
            Delete(item) {
                this.$inertia.delete(`/store/wishlist/${item.id}`);
            },
        },
    }
</script>
