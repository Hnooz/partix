<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">Part/<span class="text-gray-500">Create</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="Name" name="name" v-model="part.name" :error="$page.errors.name" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input label="Part Number" name="number" v-model="part.number" :error="$page.errors.number" tabindex="2" required></base-input>
                        </div>
                        <div>
                            <base-input label="Description" name="description" v-model="part.description" :error="$page.errors.description" tabindex="3" required></base-input>
                        </div>
                        <div>
                            <base-input label="Price" name="price" v-model="part.price" :error="$page.errors.price" tabindex="4" required></base-input>
                        </div>
                        <div>
                            <base-input label="Slug" name="slug" v-model="part.slug" :error="$page.errors.slug" tabindex="5" required></base-input>
                        </div>
                        <div>
                            <label class="text-gray-700">Car</label>
                                <select name="car_id" class="form-select text-gray-500 w-full mt-1"  v-model="part.car_id" :error="$page.errors.car_id" required tabindex="6">
                                    <option v-for="car in cars" :key="car.index" :value="car.id">{{car.brand}}</option>
                                </select>
                        </div>
                        <div>
                            <base-input type="file" label="Image" name="image" v-model="part.image" :error="$page.errors.image" tabindex="7" required></base-input>
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
        props:['cars'],
        data() {
            return {
                part: {
                    name: '',
                    number: '',
                    description: '',
                    price: '',
                    slug: '',
                    car_id: '',
                    image:'',
                    
                }
            }
        }, 
        methods: {
            submit() {
              this.$inertia.post('/dashboard/parts', this.part);
            }
        }
    }
</script>
