<template>
    <form @submit.prevent="submit">
        <h3 v-if="!edit" @dblclick="edit = true">{{ super_category.name }}</h3>

        <div class="flex items-center space-x-2" v-if="edit">
            <input type="text" v-model="form.name" class="px-4 py-2 block rounded bg-white text-teal-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline">
                
            <button @click="update" class="flex items-center py-2 px-4 capitalize tracking-wide bg-teal-700 text-white font-medium rounded hover:bg-teal-600 focus:outline-none focus:bg-teal-600">Edit</button>
        </div>
    </form>
</template>

<script>
    export default {
        props:[
            'super_category',
        ],
        data() {
            return {
                form: { 
                    name: this.super_category.name,
                },
                edit: false
            }
        },

        methods: {
            update() {
                this.$inertia.put(this.$route('super_categories.update', this.super_category.id), this.form);

                this.edit = false;
            },
        },
    }
</script>