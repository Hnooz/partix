<template>
    <layout>

        <div class="mt-8">
            <div class="flex capitalize">
                <h2 class="text-3xl text-teal-700 font-bold">{{__('category')}}/<span class="text-gray-500">{{__('create')}}</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input :label="__('name')" name="name" v-model="category.name" :error="$page.errors.name" tabindex="1" :placeholder="__('filters')" required></base-input>
                        </div>
                        <div>
                            <base-input type="text" :label="__('description')" name="description" v-model="category.description"  tabindex="2" :placeholder="__('category description')" required></base-input>
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
                            <input id="images" type="file" ref="images" accept="image/*" label="Images" name="images[]" @change="handleFileUpload()" class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white  block w-full" :error="$page.errors.images" tabindex="4" multiple required>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700 capitalize">{{__('create')}} {{__('category')}}</base-button>
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
                    super_category_id:0,
                    images:''
                }
            }
        }, 
        methods: {
            submit() {
                const data = new FormData();

                data.append('name', this.category.name);
                data.append('description', this.category.description);
                data.append('super_category_id', this.category.super_category_id);
                data.append('images', this.category.images);

                axios.post( '/dashboard/categories',
                data,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
                }
                ).then(function(response){
                const status = JSON.parse(response.status);

                        if (status == '200') {
                            window.location.pathname = response.data.redirect;
                        }
                })
                .catch(function(){
                console.log('FAILURE!!');
                });
                // this.$inertia.post('/dashboard/categories', this.category);
            },

            handleFileUpload(){
                this.category.images = this.$refs.images.files[0];
            }
        }
    }
</script>
