<template>
    <div>
    <BaseNav/>
        <h1 class="font-semibold mt-32 py-10 text-3xl text-center text-gray-700">Test Item</h1>
        <div class="grid grid-cols-2 md:grid-cols-5">
            
            <div class="bg-white mb-10 mx-3 overflow-hidden rounded-tr-lg shadow-lg" v-for="(item, index) in items = 6" :key="index">
                <p class="bg-red-400 float-right font-semibold h-12 px-1 py-3 shadow-lg text-white w-12">-26%</p>
                <a href="/details">
                    <img class="h-24 mt-12 mx-auto object-cover object-center w-24" src="../../images/10102.png" alt="item name">
                </a>

                <div class="px-4 py-2">
                    <a href="/details" class="font-bold text-gray-700 text-sm uppercase">Oil Test</a>
                    <p class="break-all font-medium text-gray-600 text-xs">item number:&nbsp;245166h</p>
                    <p class="text-gray-900 text-xl">&#8356;&nbsp;3,8&nbsp;<span class="line-through px-2 text-gray-500 text-sm">&#8356;&nbsp;2,4</span></p>
                    <p class="text-gray-600 text-xs">incl. 20% VAT, <span class="text-gray-800 underline">delivery.</span> from &euro;8,45</p>
                </div>

                <div class="bg-blue-400 flex items-center justify-center px-4 py-2">
                    <!-- <h1 class="text-gray-200 font-bold text-lg">$129</h1> -->
                    <button class="px-2 py-1 text-xs font-semibold rounded uppercase outline-none focus:outline-none">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart text-white w-8 h-8">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
<BaseFooter/>
    </div>
</template>

<script>
import BaseNav from "../../components/UI/BaseNav";
import BaseFooter from '../../components/UI/BaseFooter'
export default {
    components: {
        BaseNav,
        BaseFooter
    }
}
</script>
