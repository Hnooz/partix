<template>
    <div>
        <!-- <div class="md:grid md:grid-cols-6 md:mx-0 mx-3">
            <div class="border border-gray-700 md:mx-3 md:pr-0 my-3 pr-2 text-black" v-for="(item, index) in items = 12" :key="index"> -->
                <div class=" flex items-center justify-between md:flex-wrap">
                    <div class="flex md:flex-col md:mx-auto md:w-full">
                        <img src="/images/10102.png?c4ebd0b4d2a9eea382a389ac5468f259" alt="" class="h-12 md:h-32 md:mx-auto md:w-32 w-12"> 
                        <h1 class="font-medium md:bg-gray-400 md:w-full py-3 text-center text-sm">Brake system</h1>
                    </div> 
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down h-6 md:hidden w-6"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </div>
                <slot></slot>
                
            <!-- </div>
        </div> -->
    </div>
</template>

<script>
export default {
    props:{
        isOpen:Boolean,
    },

    data() {
        return {
            open:this.isOpen
        }
    },
}
</script>