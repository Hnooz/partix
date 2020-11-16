<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">Category /<span class="text-gray-700"> Create</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="Name" name="name" v-model="category.name" :error="$page.errors.name" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input type="text" label="Description" name="description" v-model="category.description"  tabindex="2" required></base-input>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>Create Category</base-button>
                    </div>
                </form>
            </base-panel>

        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";

    export default {
        components: {Layout},
        data() {
            return {
                category: {
                    name: '',
                    description: '',
                }
            }
        }, 
        methods: {
           async submit() {
            let response = await this.$inertia.post('/dashboard/categories/store', this.category);
            }
        }
    }
</script>
