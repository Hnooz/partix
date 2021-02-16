<template>
    <div class="mx-6 mt-8 overflow-hidden bg-white rounded-t-lg shadow-lg md:hidden md:rounded-tr-lg">
        <div class="flex justify-between">
            <p class="flex justify-center w-10 h-10 px-1 py-3 text-sm font-semibold text-white bg-teal-400 rounded-br-lg shadow-lg md:h-12 md:px-1 md:rounded-none md:w-12">{{part.sale}}%</p>
        </div>
        <div class="flex items-center justify-center h-64 w-70">
            <div class="w-64 h-48" href="#">
                <img class="object-cover object-center w-full h-full mx-auto md:h-24 md:mt-12 md:w-24" :src="img" :alt="part.name.slice(0,5)">
            </div>
            <div>
                <img class="object-cover object-center w-12 h-12 mx-auto my-1 border border-teal-400 md:h-24 md:mt-12 md:w-24" :src="part.url[0]" @click="changImage(part.url[0])" :alt="part.name.slice(0,5)">
                <img class="object-cover object-center w-12 h-12 mx-auto my-1 border border-teal-400 md:h-24 md:mt-12 md:w-24" :src="part.url[1]" @click="changImage(part.url[1])" :alt="part.name.slice(0,5)">
           
                <img class="object-cover object-center w-12 h-12 mx-auto border border-teal-400 md:h-24 md:mt-12 md:w-24" :src="part.url[2]" @click="changImage(part.url[2])" :alt="part.name.slice(0,5)">
           
            </div>
        </div>
        
        <form @submit.prevent="submit">
        <div class="px-4">
            <a href="#" class="text-xs font-bold text-teal-500 capitalize md:text-base">{{$page.locale == 'en' ? part.name : part.name_ar}}</a>
            <div class="my-3">
                <span class="px-3 py-2 mx-1 text-sm leading-10 text-gray-600 bg-blue-100 rounded-full" v-for="car in part.cars" :key="car.id">{{$page.locale == 'en' ? car.brand : car.brand_ar}}</span>
            </div>                           
            <p class="text-xs font-semibold text-gray-800 md:text-xl" v-if="form.part_type_id == 1">
                {{calcOemPrice}} <span class="text-xs text-gray-500">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="px-2 text-xs text-gray-500 line-through">{{part.oem_price}} {{__('QAR')}}</span> 
            </p>

            <p class="text-xs font-semibold text-gray-800 md:text-xl" v-if="form.part_type_id == 2">
                {{calcAftermarketPrice}}<span class="text-xs text-gray-500">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="px-2 text-xs text-gray-500 line-through">{{part.aftermarket_price}}{{__('QAR')}}</span> 
            </p>

            <p class="text-xs font-semibold text-gray-800 md:text-xl" v-if="form.part_type_id == 3">
                {{calcUsedPrice}}<span class="text-xs text-gray-500">{{__('QAR')}}</span>
                <span v-if="part.sale > 0" class="px-2 text-xs text-gray-500 line-through">{{part.used_price}}{{__('QAR')}}</span> 
            </p>
        </div>

        <div class="px-4">
            <h1 class="text-xs text-red-500"><span class="text-sm text-gray-600 capitalize">{{__('hint')}}:</span> {{__('you can order directly if part type price = 0')}}</h1>
            <h1 class="text-sm text-gray-600 capitalize">{{__('chose type')}} :</h1>
            <button type="button" @click="oem()" class="px-3 py-1 text-xs text-gray-800 capitalize border-2 border-gray-800 rounded-lg outline-none focus:outline-none hover:bg-gray-800 hover:text-white">oem {{part.oem_price}}$</button>
            <button type="button" @click="aftermark()" class="px-3 py-1 my-2 text-xs text-gray-800 capitalize border-2 border-gray-800 rounded-lg outline-none focus:outline-none hover:bg-gray-800 hover:text-white">aftermarket {{part.aftermarket_price}}$</button>
            <button type="button" @click="used()" class="block px-3 py-1 text-xs text-gray-800 capitalize border-2 border-gray-800 rounded-lg outline-none focus:outline-none hover:bg-gray-800 hover:text-white">used {{part.used_price}}$</button>
        </div>

        <div class="flex items-center px-4">
            <h1 class="text-sm text-teal-900">{{__('quantity')}}:</h1>
            <button type="button" @click="increment()" class="text-white bg-teal-500">
                <svg class="w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
            </button>

            <span class="flex items-center py-2 mx-2 bg-white">{{calcQuantity}}</span>
            <input type="text" v-model="quantity" hidden >

            <button type="button" @click="decrement()" class="my-2 text-white bg-teal-500" :disabled="calcQuantity == 1">
                <svg class="w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">    
                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        
        <p class="px-4 py-5 text-xs text-gray-600">{{$page.locale == 'en' ? part.description : part.description_ar}}</p>

         <div class="flex items-center justify-between px-4 py-4 md:hidden">
             <a href="/store" class="flex items-center text-sm font-medium text-teal-700 whitespace-no-wrap rounded focus:outline-none hover:underline">
                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                <span class="mx-2">{{__('Back To Shop')}}</span>
            </a>
            <button @click="addCart(part)" class="flex items-center justify-center text-sm font-medium text-teal-700 capitalize rounded outline-none focus:outline-none">
               {{__('add to cart')}}
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 shopping-cart">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                </svg>                
            </button>
        </div>
    </form>
    </div>
</template>
<script>
export default {
    props:['part']
}
</script>