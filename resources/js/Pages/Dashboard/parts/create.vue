<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">Part/<span class="text-gray-500">Create</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="Name" name="name" v-model="part.name" :error="$page.errors.name" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input label="Part Number" name="number" v-model="part.number"  tabindex="2" required></base-input>
                        </div>
                        <div>
                            <base-input label="Description" name="comment" v-model="part.comment"  tabindex="3" required></base-input>
                        </div>
                        <div>
                            <base-input label="Price" name="price" v-model="part.price"  tabindex="4" required></base-input>
                        </div>
                        
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700">Create Part</base-button>
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
                part: {
                    name: '',
                    number: '',
                    comment: '',
                    price: '',
                }
            }
        }, 
        methods: {
           async submit() {
             await this.$inertia.post('/dashboard/parts', this.category);
            }
        }
    }
</script>
