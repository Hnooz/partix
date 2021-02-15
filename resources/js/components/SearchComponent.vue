<template>
    <div class="relative flex md:flex-col lg:flex-row">
        <input v-model="keywords" type="search" class="p-2 py-3 text-sm text-white bg-teal-900 border-0 rounded outline-none focus:outline-none form-input sm:ml-0 w-70" :placeholder="__('Enter the part number or name')" :disabled="route().current('store.details')">
        <button @click="fetch()"  class="block p-2 px-2 font-medium text-white capitalize bg-teal-500 outline-none cursor-pointer focus:outline-none md:px-10" :disabled="route().current('store.details') || keywords == ''">{{__('search')}}</button>
        <div v-if="data.length > 0" class="absolute inset-x-0 px-6 py-3 mx-5 mt-16 overflow-y-auto bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:border-transparent">
            <a href="#" class="block py-1" v-for="d in data" :key="d.id">
                <h3 class="font-medium text-gray-700 dark:text-gray-100 hover:underline">{{ d.name }}</h3>
            </a>
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