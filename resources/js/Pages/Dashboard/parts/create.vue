<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold capitalize">{{__('parts')}}/<span class="text-gray-500">{{__('create')}}</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input :label="__('name')"  name="name"  v-model="part.name" :error="$page.errors.name" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('name_ar')"  name="name_ar"  v-model="part.name_ar" :error="$page.errors.name_ar" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('number')"  name="number"  v-model="part.number" :error="$page.errors.number" tabindex="2" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('description')"  name="description"   v-model="part.description" :error="$page.errors.description" tabindex="3" required></base-input>
                        </div>
                         <div>
                            <base-input :label="__('description_ar')"  name="description_ar"   v-model="part.description_ar" :error="$page.errors.description_ar" tabindex="3" required></base-input>
                        </div>
                        <div>
                            <base-input type="number" :label="__('price')"  name="price"  v-model="part.price" :error="$page.errors.price" tabindex="4" required></base-input>
                        </div>
                        <div>
                            <base-input type="number" :label="__('second price')"  name="second_price"  v-model="part.second_price" :error="$page.errors.second_price" tabindex="4" required></base-input>
                        </div>
                         <div>
                            <base-input :label="__('sale')"  name="sale"  v-model="part.sale" :error="$page.errors.sale" tabindex="5" required></base-input>
                        </div>
                        <div>
                            <span class="text-gray-700">{{__('car')}}</span>
                            <base-select label="brand" :options="cars" :reduce="car => car.id" v-model="part.cars" multiple>
                                <template #search="{attributes, events}">
                                    <input class="vs__search" v-bind="attributes" v-on="events"/>
                                </template>
                            </base-select>
                            <span class="text-red-500 text-xs mt-4" v-if="$page.errors.cars">{{ $page.errors.cars[0] }}</span>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('category')}}</label>
                                <select  name="category_id"  v-model="part.category_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.category_id" required tabindex="7">
                                    <option value="0">select category</option>
                                    <option v-for="category in categories" :key="category.index" :value="category.id">{{category.name}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('supplier')}}</label>
                                <select  name="supplier_id"  v-model="part.supplier_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.supplier_id" required tabindex="8">
                                    <option value="0">select supplier</option>
                                    <option v-for="supplier in suppliers" :key="supplier.index" :value="supplier.id">{{supplier.name}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('type')}}</label>
                                <select  name="part_type_id"  v-model="part.part_type_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.part_type_id" required tabindex="9">
                                    <option value="0">select type</option>
                                    <option v-for="type in part_types" :key="type.index" :value="type.id">{{type.name}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('images')}}</label>
                            <input id="images" type="file" ref="images" accept="image/*" label="Images" name="images[]" @change="handleFileUpload()" class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full" :error="$page.errors.file" tabindex="7" multiple required>
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
    import 'vue-select/dist/vue-select.css';
    export default {
        components: {Layout},
        props:['cars','suppliers','categories','part_types', 'brands'],
        data() {
            return {
                part: {
                    name: '',
                    name_ar: '',
                    number: '',
                    description: '',
                    description_ar: '',
                    price: '',
                    second_price:'',
                    slug: '',
                    sale:'',
                    cars:[],
                    supplier_id:0,
                    category_id:0,
                    part_type_id:0,
                    images:''
                },

            }
        }, 
        methods: {
            submit() {
            
            const data = new FormData();

            data.append('name', this.part.name);
            data.append('name_ar', this.part.name_ar);
            data.append('number', this.part.number);
            data.append('description', this.part.description);
            data.append('description_ar', this.part.description_ar);
            data.append('price', this.part.price);
            data.append('second_price', this.part.second_price);
            data.append('slug', this.part.slug);
            data.append('sale', this.part.sale);
            data.append('cars', JSON.stringify(this.part.cars));
            data.append('supplier_id', this.part.supplier_id);
            data.append('category_id', this.part.category_id);
            data.append('part_type_id', this.part.part_type_id);
            if (this.part.images) 
            {
                for( let i = 0; i < this.part.images.length; i++ ){
                    let images = this.part.images[i];
                    data.append('images[' + i + ']', images);
                }
            }
            this.$inertia.post('/dashboard/parts', data);
            },

            handleFileUpload(){
                this.part.images = this.$refs.images.files;
            }
        }
    }
</script>
