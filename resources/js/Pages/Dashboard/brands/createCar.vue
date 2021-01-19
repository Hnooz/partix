<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold capitalize">{{__('brands')}}/<span class="text-gray-500">{{__('cars')}}/</span><span class="text-gray-500">{{__('create')}}</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input :label="__('name')" name="brand" v-model="form.brand" :error="$page.errors.brand" tabindex="1" :placeholder="__('e.g Toyota')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('name_ar')" name="brand_ar" v-model="form.brand_ar" :error="$page.errors.brand_ar" tabindex="2" :placeholder="__('e.g Toyota')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('model')" name="model" v-model="form.model" :error="$page.errors.model" tabindex="3" :placeholder="__('e.g Brado')" required></base-input>
                        </div>
                         <div>
                            <base-input :label="__('model_ar')" name="model_ar" v-model="form.model_ar" :error="$page.errors.model_ar" tabindex="4" :placeholder="__('e.g Brado')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('engine')" name="engine" v-model="form.engine" :error="$page.errors.engine" tabindex="5" :placeholder="__('e.g jas')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('engine_ar')" name="engine_ar" v-model="form.engine_ar" :error="$page.errors.engine_ar" tabindex="6" :placeholder="__('e.g jas')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('year')" name="year" v-model="form.year" :error="$page.errors.year" tabindex="7" :placeholder="__('e.g 2018')" required></base-input>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700 capitalize">{{__('create')}}</base-button>
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
        props:['brand'],
        data() {
            return {
                form: {
                    brand: '',
                    model: '',
                    engine: '',
                    brand_ar: '',
                    model_ar: '',
                    engine_ar: '',
                    year: '',
                }
            }
        }, 
        methods: {
            submit() {
              this.$inertia.post(`/dashboard/brands/${this.brand.id}/cars`, this.form);
            }
        }
    }
</script>
