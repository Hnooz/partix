<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">Category/<span class="text-gray-500">Edit</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="Name" name="name" v-model="form.name" :error="$page.errors.name" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input type="text" label="Description" name="description" v-model="form.description"  tabindex="2" required></base-input>
                        </div>
                        <div>
                            <label class="text-gray-700">Super Category</label>
                                <select  name="super_category_id"  v-model="form.super_category_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.super_category_id" required tabindex="3">
                                   <option value="0">select super</option>
                                    <option v-for="super_category in super_categories" :key="super_category.index" :value="super_category.id">{{super_category.name}}</option>
                                </select>
                        </div>
                         <div>
                             <label for="image" class="text-gray-700">Upload Image</label>
                            <input id="images" type="file" ref="images" accept="image/*" label="Images" name="images[]" @change="handleFileUpload()" class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white  block w-full" :error="$page.errors.images" tabindex="4" multiple>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700">Edit Category</base-button>
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
                    description: '',
                    super_category_id:0,
                    images:''
                }
            }
        }, 
        created() {
            this.form = this.category;
        },

        methods: {
            submit() {
                const data = new FormData();

                data.append('name', this.form.name);
                data.append('description', this.form.description);
                data.append('super_category_id', this.form.super_category_id);
                data.append('images', this.form.images);
                data.append('_method', 'put');

                axios.post( '/dashboard/categories/'+this.category.id, data,{
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
                this.form.images = this.$refs.images.files[0];
            },

        },
    }
</script>
