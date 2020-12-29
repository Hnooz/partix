<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold capitalize">{{__('category')}}/<span class="text-gray-500">{{__('Edit')}}</span></h2>
            </div>
            <base-panel class="md:max-w-3xl mt-4 capitalize">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input :label="__('name')" name="name" v-model="category.name" :error="$page.errors.name" tabindex="1" :placeholder="__('filters')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('name_ar')" name="name_ar" v-model="category.name_ar" :error="$page.errors.name_ar" tabindex="1" :placeholder="__('filters')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('sale')" name="sale" v-model="category.sale" :error="$page.errors.sale" tabindex="1" :placeholder="__('20')"></base-input>
                        </div>
                        <div>
                            <label class="text-gray-700 capitalize">{{__('super categories')}}</label>
                                <select  name="super_category_id"  v-model="category.super_category_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.super_category_id" required tabindex="3">
                                   <option value="0">{{__('select super')}}</option>
                                    <option v-for="super_category in super_categories" :key="super_category.index" :value="super_category.id">{{super_category.name}}</option>
                                </select>
                        </div>
                         <div>
                             <label for="image" class="text-gray-700 capitalize">{{__('images')}}</label>
                            <input id="images" type="file" ref="images" accept="image/*" label="Images" name="images[]" @change="handleFileUpload()" class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white  block w-full" :error="$page.errors.images" tabindex="4" multiple>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700 capitalize">{{__('Edit')}} {{__('category')}}</base-button>
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
        props:['category', 'super_categories'],
        data() {
            return {
                form: {
                    name: '',
                    name_ar: '',
                    sale:'',
                    super_category_id:0,
                    images:''
                }
            }
        }, 
        created() {
            this.form = this.category;
        },

        methods: {
            submit() 
            {
                const data = new FormData();

                data.append('name', this.form.name);
                data.append('name_ar', this.category.name_ar);
                data.append('sale', this.category.sale);
                data.append('super_category_id', this.form.super_category_id);
                this.form.images ?  data.append('images', this.form.images) : '' ;
                data.append('_method', 'PUT');
                this.$inertia.post(this.$route('categories.update', this.category.id), data);
            },

            handleFileUpload()
            {
                this.form.images = this.$refs.images.files[0];
            },

        },
    }
</script>
