<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">Cars/<span class="text-gray-500">Edit</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="Brand" name="brand" v-model="form.brand" :error="$page.errors.brand" tabindex="1" placeholder="e.g Toyota" required></base-input>
                        </div>
                        <div>
                            <base-input label="Model" name="model" v-model="form.model" :error="$page.errors.model" tabindex="2" placeholder="e.g Brado" required></base-input>
                        </div>
                        <div>
                            <base-input label="Engine" name="engine" v-model="form.engine" :error="$page.errors.engine" tabindex="3" placeholder="e.g jas" required></base-input>
                        </div>
                        <div>
                            <base-input label="Year" name="year" v-model="form.year" :error="$page.errors.year" tabindex="4" placeholder="e.g 2018" required></base-input>
                        </div>
                        
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700">Update Car</base-button>
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
        props:['car'],
        data() {
            return {
                form: {
                    brand: '',
                    model: '',
                    engine: '',
                    year: '',
                }
            }
        }, 
        created() {
            this.form = this.car
        },
        methods: {
            submit() {
                this.$inertia.put(this.$route('cars.update', this.car.id), this.form);
            //   this.$inertia.put(`/dashboard/cars/${this.car.id}/edit`, this.car);
            }
        }
    }
</script>
