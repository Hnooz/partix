<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl font-bold text-teal-700 capitalize">{{__('parts')}}/<span class="text-gray-500">{{__('create')}}</span></h2>
            </div>

            <base-panel class="mt-4 md:max-w-3xl">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <base-input :label="__('name')"  name="name"  v-model="part.name" :error="$page.errors.name" tabindex="1"></base-input>
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
                            <base-input type="number" :label="__('oem price')"  name="oem_price"  v-model="part.oem_price" :error="$page.errors.oem_price" tabindex="4" required></base-input>
                        </div>
                        <div>
                            <base-input type="number" :label="__('aftermarket price')"  name="aftermarket_price"  v-model="part.aftermarket_price" :error="$page.errors.aftermarket_price" tabindex="4" required></base-input>
                        </div>
                        <div>
                            <base-input type="number" :label="__('used price')"  name="used_price"  v-model="part.used_price" :error="$page.errors.used_price" tabindex="4" required></base-input>
                        </div>
                         <div>
                            <base-input :label="__('sale')" type="number"  name="sale"  v-model="part.sale" :error="$page.errors.sale" tabindex="5" required></base-input>
                        </div>
                        <div>
                            <span class="text-gray-700">{{__('car')}}</span>
                            <base-select label="brand" :options="cars" :reduce="car => car.id" v-model="part.cars" multiple>
                                <template #search="{attributes, events}">
                                    <input class="vs__search" v-bind="attributes" v-on="events"/>
                                </template>
                            </base-select>
                            <span class="mt-4 text-xs text-red-500" v-if="$page.errors.cars">{{ $page.errors.cars[0] }}</span>
                        </div>
                        <div>
                            <span class="text-gray-700">{{__('tag')}}</span>
                            <base-select label="name" :options="tags" :reduce="tag => tag.id" v-model="part.tags" multiple>
                                <template #search="{attributes, events}">
                                    <input class="vs__search" v-bind="attributes" v-on="events"/>
                                </template>
                            </base-select>
                            <span class="mt-4 text-xs text-red-500" v-if="$page.errors.tags">{{ $page.errors.tags[0] }}</span>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('category')}}</label>
                                <select  name="category_id"  v-model="part.category_id" class="w-full mt-1 text-gray-500 form-select"   :error="$page.errors.category_id" required tabindex="7">
                                    <option value="" disabled>select category</option>
                                    <option v-for="category in categories" :key="category.index" :value="category.id">{{category.name}}</option>
                                </select>
                                
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('supplier')}}</label>
                                <select  name="supplier_id"  v-model="part.supplier_id" class="w-full mt-1 text-gray-500 form-select"   :error="$page.errors.supplier_id" required tabindex="8">
                                    <option value="" disabled>select supplier</option>
                                    <option v-for="supplier in suppliers" :key="supplier.index" :value="supplier.id">{{supplier.name}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('type')}}</label>
                                <select  name="part_type_id"  v-model="part.part_type_id" class="w-full mt-1 text-gray-500 form-select"   :error="$page.errors.part_type_id" required tabindex="9">
                                    <option value="" disabled>select type</option>
                                    <option v-for="type in part_types" :key="type.index" :value="type.id">{{type.name}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('images')}} (<span class="text-sm text-red-500">minimum image required 4</span>)</label>
                            <input id="images" type="file" ref="images" accept="image/*" label="Images" name="images[]" @change="handleFileUpload()" class="block w-full mt-1 border-gray-300 form-input focus:border-indigo-400 focus:shadow-none focus:bg-white" :error="$page.errors.images" tabindex="7" multiple>
                            <span class="mt-4 text-xs text-red-500" v-if="$page.errors.images">{{ $page.errors.images[0] }}</span>
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
        props:['cars','tags','suppliers','categories','part_types', 'brands'],
        data() {
            return {
                part: {
                    name: '',
                    name_ar: '',
                    number: '',
                    description: '',
                    description_ar: '',
                    oem_price: '',
                    aftermarket_price:'',
                    used_price:'',
                    slug: '',
                    sale:'',
                    cars:[],
                    tags:[],
                    supplier_id:'',
                    category_id:'',
                    part_type_id:'',
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
            data.append('oem_price', this.part.oem_price);
            data.append('aftermarket_price', this.part.aftermarket_price);
            data.append('used_price', this.part.used_price);
            data.append('slug', this.part.slug);
            data.append('sale', this.part.sale);
            data.append('cars', JSON.stringify(this.part.cars));
            data.append('tags', JSON.stringify(this.part.tags));
            data.append('supplier_id', this.part.supplier_id);
            data.append('part_type_id', this.part.part_type_id);
            if (this.part.category_id) {
                 data.append('category_id', this.part.category_id);
            }
            
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
