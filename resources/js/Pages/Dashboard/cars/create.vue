<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">{{__('cars')}}/<span class="text-gray-500 capitalize">{{__('create')}}</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input :label="__('brand')" name="brand" v-model="car.brand" :error="$page.errors.brand" tabindex="1" :placeholder="__('e.g Toyota')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('model')" name="model" v-model="car.model" :error="$page.errors.model" tabindex="2" :placeholder="__('e.g Brado')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('engine')" name="engine" v-model="car.engine" :error="$page.errors.engine" tabindex="3" :placeholder="__('e.g jas')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('year')" name="year" v-model="car.year" :error="$page.errors.year" tabindex="4" :placeholder="__('e.g 2018')" required></base-input>
                        </div>
                        
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700 capitalize">{{__('create')}} {{__('car')}}</base-button>
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
                car: {
                    brand: '',
                    model: '',
                    engine: '',
                    year: '',
                }
            }
        }, 
        methods: {
            submit() {
              this.$inertia.post('/dashboard/cars', this.car);
            }
        }
    }
</script>
