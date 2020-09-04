<template>
    <div>
        <BaseNav/>

        <div class="">
            <div class="mx-5 md:flex md:mx-0 md:w-full">
                <div class="md:w-1/3 md:mx-16">
                    <h1 class="font-semibold my-3 text-gray-700">SELECT YOUR CAR</h1>
                    <form action="#" class="">
                        <select name="" id="" class="bg-transparent block border-2 border-teal-500 focus:outline-none font-medium outline-none p-2 rounded text-gray-700 w-full">
                            <option value="0" class="">tester</option>
                            <option value="1">testing</option>
                            <option value="2">test</option>
                        </select>
                        
                        <select name="" id="" class="bg-transparent block border-2 border-teal-500 focus:outline-none font-medium outline-none my-3 p-2 rounded text-gray-700 w-full">
                            <option value="0" class="">tester</option>
                            <option value="1">testing</option>
                            <option value="2">test</option>
                        </select>
                        
                        <select name="" id="" class="bg-transparent block border-2 border-teal-500 focus:outline-none font-medium outline-none p-2 rounded text-gray-700 w-full">
                            <option value="0">tester</option>
                            <option value="1">testing</option>
                            <option value="2">test</option>
                        </select>
                        
                        <input type="submit" value="Search" class="bg-teal-500 my-3 py-2 rounded focus:outline-none outline-none text-gray-200 w-full">
                    </form>
                </div>
                <div class="flex items-center justify-between md:-mx-16 md:flex md:items-center md:justify-center md:w-1/3">
                    <div class="border-gray-800 border-t md:w-1/3 w-1/2"></div>
                    <span class="text-center">Or</span>
                    <div class="border-gray-800 border-t md:w-1/3 w-1/2"></div>
                </div>

                <div class="md:w-1/3 md:mx-16">
                    <h1 class="font-semibold my-3 text-gray-700">BY REGISTRATION NUMBER</h1>
                
                    <form action="">
                        <input type="text" name="" placeholder="search by REG" class="bg-transparent border-2 border-teal-500 focus:outline-none outline-none placeholder-gray-700 px-2 py-2 rounded text-gray-700 w-full">
                        <input type="submit" value="Search" class="bg-teal-500 my-3 py-2 rounded focus:outline-none outline-none text-gray-200 w-full">
                    </form>
                </div>
            </div>


            <div class="border-gray-500 border-t-2 mt-16">
                <h1 class="font-semibold md:text-4xl md:text-center mx-3 mt-3 text-gray-700">Partix car parts catalogue</h1>
                <div class="md:grid md:grid-cols-6 md:mx-0 mx-3">
                    <div class="border border-gray-700 md:mx-3 md:pr-0 my-3 pr-2 text-black" v-for="(item, index) in items = 12" :key="index">
                        <div class=" flex items-center justify-between md:flex-wrap">
                            <div class="flex md:flex-col md:mx-auto md:w-full">
                                <img src="/images/10102.png?c4ebd0b4d2a9eea382a389ac5468f259" alt="" class="h-12 md:h-32 md:mx-auto md:w-32 w-12"> 
                                <button type="button" class="font-medium md:bg-gray-400 md:w-full py-3 text-center text-sm" style="transition: all .15s ease">Brake system</button>
                            </div> 
                            <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down h-6 md:hidden w-6"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>

                        <div  class="flex items-center md:mx-2 md:text-xs md:my-2" v-for="(item, index) in items = 4" :key="index">
                            <img src="/images/10102.png?c4ebd0b4d2a9eea382a389ac5468f259" alt="" class="h-12 w-12">
                            <a href="#" class="font-medium text-center">Brake system</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <BaseFooter/>
    </div>
</template>

<script>
import BaseNav from "../../components/UI/BaseNav";
import BaseFooter from '../../components/UI/BaseFooter'
// import Card from '../../components/UI/Card'
// import ToggleMenu from "../../components/UI/ToggleMenu";
export default {
    components: {
        BaseNav,
        BaseFooter
        // Card,
        // ToggleMenu
        },
    data() {
    return {
       showModal: false,
    }
},
methods: {
    toggleModal(){
      this.showModal = !this.showModal;
    },
    closeModal(){
      this.showModal = !this.showModal;
    }
  },
}

</script>