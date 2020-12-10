<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">Category/<span class="text-gray-500">Create</span></h2>
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
                        <div>
                            <label class="text-gray-700">Super Category</label>
                                <select  name="super_category_id"  v-model="category.super_category_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.super_category_id" required tabindex="3">
                                   <option value="0">select super</option>
                                    <option v-for="super_category in super_categories" :key="super_category.index" :value="super_category.id">{{super_category.name}}</option>
                                </select>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700">Create Category</base-button>
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
        props:['super_categories'],
        data() {
            return {
                category: {
                    name: '',
                    description: '',
                    super_category_id:0
                }
            }
        }, 
        methods: {
            submit() {
                this.$inertia.post('/dashboard/categories', this.category);
            }
        }
    }
</script>
