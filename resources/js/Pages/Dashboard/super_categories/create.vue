<template>
    <layout>

        <div class="mt-8 capitalize">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">{{__('super categories')}}/<span class="text-gray-500">{{__('create')}}</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input :label="__('name')" name="name" v-model="category.name" :error="$page.errors.name" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('name_ar')" name="name_ar" v-model="category.name_ar" :error="$page.errors.name_ar" tabindex="1" required></base-input>
                        </div>
                         <div>
                             <label class="text-gray-700" for="Upload Image">{{__('images')}}</label>
                             <!-- <base-input label="Name" name="name" :error="$page.errors.images" tabindex="1" required></base-input> -->
                            <input id="images" type="file" ref="images" accept="image/*" label="Images" name="images[]" @change="handleFileUpload()" class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full" :error="$page.errors.images" tabindex="4" multiple required>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700">{{__('create')}}</base-button>
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
                    name_ar:'',
                    images:''
                }
            }
        }, 
        methods: {
            submit() {
                const data = new FormData();

                data.append('name', this.category.name);
                data.append('name_ar', this.category.name_ar);
                data.append('images', this.category.images);

                axios.post( '/dashboard/super_categories',
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
