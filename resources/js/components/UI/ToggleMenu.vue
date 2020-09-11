<template>
    <div @mouseleave="close()">
        <div class="bg-white md:pr-0 my-3 pr-2 shadow-lg md:mx-1">
            <div class="flex items-center justify-between md:flex-wrap text-gray-700" @click="selected()">

                <div class="flex md:flex-col md:mx-auto md:w-full">
                    <img :src="this.img" alt="" class="h-12 md:h-32 md:mx-auto md:w-32 w-12"> 
                    <h1 class="capitalize font-semibold md:bg-blue-400 md:text-white md:w-full px-2 py-3 text-center text-sm">{{this.name}}</h1>
                </div> 

                <svg v-show="isOpen" viewBox="0 0 20 20" fill="currentColor" class="chevron-down h-6 md:hidden w-6">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>                    

                <svg v-show="!isOpen" viewBox="0 0 20 20" fill="currentColor" class="chevron-up w-6 h-6 md:hidden" >
                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                </svg>

            </div>
            <slot class="mt-2 block" v-if="isOpen"></slot>
        </div>

        
        <div :class="isOpen?'md:mt-40':''"></div>
    </div>
</template>

<script>
export default {
    props:{
        name:String,
        img:String,
        side:Array
    },
    data() {
        return {
            isOpen:false,
        }
    },
    methods: {
        selected(){
            
            this.isOpen = !this.isOpen
        },
        close(){
            this.isOpen = false
        }
    },
}
</script>