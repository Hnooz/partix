<template>
    <div class="relative flex md:flex-col lg:flex-row">
        <input v-model="keywords" type="search" class="p-2 py-3 text-sm text-white bg-teal-900 border-0 rounded outline-none focus:outline-none form-input sm:ml-0 w-70" :placeholder="__('Enter the part number or name')" :disabled="route().current('store.details')">
        <button @click="fetch()"  class="block p-2 px-2 font-medium text-white capitalize bg-teal-500 outline-none cursor-pointer focus:outline-none md:px-10" :disabled="route().current('store.details') || keywords == ''">{{__('search')}}</button>
        <div v-if="data.length > 0" class="absolute inset-x-0 z-10 max-h-screen px-6 py-3 mx-5 mt-16 overflow-y-auto bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:border-transparent">
            <div class="block py-1" v-for="tag in data" :key="tag.id">
                <h1 class="text-xl font-semibold text-teal-800">#{{$page.locale == 'en' ? tag.name : tag.name_ar}}</h1>
                <div class="flex mx-4 mb-3" v-for="part in tag.parts" :key="part.index">
                    <img v-if="!part.url[0]" class="object-contain object-center w-20 h-20 border" src="../images/LOGO-1.png" alt="partix">
                    <img v-else class="w-20 h-20" :src="part.url[0]" alt="">                    
                    <div class="mx-3 font-medium leading-none text-teal-700">
                        <a  :href="'/store/details/'+part.id" class="font-semibold hover:underline">{{$page.locale == 'en' ? part.name : part.name_ar }}</a>
                        <p class="px-1 my-1">{{$page.locale == 'en' ? part.category.name : part.category.name_ar }}</p>                        
                        <span class="capitalize">{{$page.locale == 'en' ? part.type.name : part.type.name_ar }}</span>                        
                        <p v-if="part.part_type_id == 1" class="px-1 my-1">${{ part.oem_price }}</p>                        
                        <p v-if="part.part_type_id == 2" class="px-1 my-1">${{ part.aftermarket_price }}</p>                        
                        <p v-if="part.part_type_id == 3" class="px-1 my-1">${{ part.used_price }}</p>                                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            keywords: '',
            data: []
        }
    },

    watch: {
        keywords(after, before) {
            this.data = [];
            
            if (this.keywords != '') {
                this.fetch();
            }
        }
    },

    methods: {
        fetch(){
            axios({
                method: 'post',
                url: '/store/search',
                data: {
                    name: this.keywords,
                }
            }).then((response) => {
                this.data = response.data.data
                
            });
        },
    }
}
</script>