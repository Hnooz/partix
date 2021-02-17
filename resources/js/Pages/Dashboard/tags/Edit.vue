<template>
    <form @submit.prevent="submit">
        <h3 v-if="!edit" @dblclick="edit = true">{{ $page.locale == 'en' ? tag.name : tag.name_ar}}</h3>

        <div class="flex items-center space-x-2" v-if="edit">
            <input type="text" v-model="form.name" class="block px-4 py-2 text-teal-800 bg-white border border-gray-300 rounded focus:border-blue-500 focus:outline-none focus:shadow-outline">
            <input type="text" v-model="form.name_ar" class="block px-4 py-2 text-teal-800 bg-white border border-gray-300 rounded focus:border-blue-500 focus:outline-none focus:shadow-outline">
            <button @click="update" class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize bg-teal-700 rounded hover:bg-teal-600 focus:outline-none focus:bg-teal-600">{{__('Edit')}}</button>
        </div>
    </form>
</template>

<script>
    export default {
        props:[
            'tag',
        ],
        data() {
            return {
                form: { 
                    name: '',
                    name_ar: '',
                },
                edit: false
            }
        },
    created() {
        this.form = this.tag;
    },
        methods: {
            update() {
                this.$inertia.put(this.$route('tags.update', this.tag.id), this.form);

                this.edit = false;
            },
        },
    }
</script>