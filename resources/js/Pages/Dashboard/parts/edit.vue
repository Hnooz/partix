<template>
    <layout>

        <div class="mt-8 capitalize">
            <div class="flex">
                <h2 class="text-3xl font-bold text-teal-700">{{__('parts')}}/<span class="text-gray-500">{{__('Edit')}}</span></h2>
            </div>

            <base-panel class="mt-4 md:max-w-3xl">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <base-input :label="__('name')"  name="name"  v-model="form.name" :error="$page.errors.name" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('name_ar')"  name="name_ar"  v-model="form.name_ar" :error="$page.errors.name_ar" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('number')"  name="number"  v-model="form.number" :error="$page.errors.number" tabindex="2" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('description')"  name="description"   v-model="form.description" :error="$page.errors.description" tabindex="3" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('description_ar')"  name="description_ar"   v-model="form.description_ar" :error="$page.errors.description_ar" tabindex="3" required></base-input>
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
                            <base-input :label="__('sale')"  name="sale"  v-model="form.sale" :error="$page.errors.sale" tabindex="5" required></base-input>
                        </div>
                         <div>
                            <span class="text-gray-700">{{__('car')}}</span>
                            <base-select class="form-select" label="brand" :options="cars" :reduce="car => car.id" v-model="form.cars" multiple>
                                <template #search="{attributes, events}">
                                    <input class="vs__search" v-bind="attributes" v-on="events"/>
                                </template>
                            </base-select>
                            <span class="mt-4 text-xs text-red-500" v-if="$page.errors.cars">{{ $page.errors.cars[0] }}</span>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('category')}}</label>
                                <select  name="category_id"  v-model="form.category_id" class="w-full mt-1 text-gray-500 form-select"   :error="$page.errors.category_id" tabindex="7">
                                    <option value="0">select category</option>
                                    <option v-for="category in categories" :key="category.index" :value="category.id">{{category.name}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('supplier')}}</label>
                                <select  name="supplier_id"  v-model="form.supplier_id" class="w-full mt-1 text-gray-500 form-select"   :error="$page.errors.supplier_id" required tabindex="8">
                                    <option value="0">select supplier</option>
                                    <option v-for="supplier in suppliers" :key="supplier.index" :value="supplier.id">{{supplier.name}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('type')}}</label>
                                <select  name="part_type_id"  v-model="form.part_type_id" class="w-full mt-1 text-gray-500 form-select"   :error="$page.errors.part_type_id" required tabindex="9">
                                    <option value="0">select type</option>
                                    <option v-for="type in part_types" :key="type.index" :value="type.id">{{type.name}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">{{__('images')}}</label>
                            <input id="images" type="file" ref="images" accept="image/*" label="Images" name="images[]" @change="handleFileUpload()" class="block w-full mt-1 border-gray-300 form-input focus:border-indigo-400 focus:shadow-none focus:bg-white" :error="$page.errors.file" tabindex="7" multiple>
                        </div>
                        
                        
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700">{{__('Edit')}}</base-button>
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
        props:['part','cars', 'suppliers','categories', 'part_types'],
        data() {
            return {
                form: {
                    name: '',
                    name_ar: '',
                    number: '',
                    description: '',
                    description_ar: '',
                    oem_price: '',
                    aftermarket_price:'',
                    used_price:'',
                    sale:'',
                    cars:[],
                    supplier_id:'',
                    category_id:'',
                    part_type_id:'',
                    images:''
                },
                   
                // },
               
            }
        }, 
        created() {
            this.form = {
                    name: this.part.name,
                    name_ar: this.part.name_ar,
                    number: this.part.number,
                    description: this.part.description,
                    description_ar: this.part.description_ar,
                    oem_price: this.part.oem_price,
                    aftermarket_price:this.part.aftermarket_price,
                    used_price: this.part.used_price,
                    sale:this.part.sale,
                    cars:this.part.cars.map(car => car.id),
                    supplier_id:this.part.supplier_id,
                    category_id:this.part.category_id,
                    part_type_id:this.part.part_type_id,
                    
                };
        },
        methods: {
            submit() {

                const data = new FormData();

            data.append('name', this.form.name);
            data.append('name_ar', this.form.name_ar);
            data.append('number', this.form.number);
            data.append('description', this.form.description);
            data.append('description_ar', this.form.description_ar);
            data.append('oem_price', this.part.oem_price);
            data.append('aftermarket_price', this.part.aftermarket_price);
            data.append('used_price', this.part.used_price);
            data.append('slug', this.form.slug);
            data.append('sale', this.form.sale);
            data.append('cars', JSON.stringify(this.form.cars));
            data.append('supplier_id', this.form.supplier_id);
            data.append('part_type_id', this.form.part_type_id);
            if (this.form.category_id ) {
                data.append('category_id', this.form.category_id);
            }
            if (this.form.images) {
                for( let i = 0; i < this.form.images.length; i++ )
                {
                    let images = this.form.images[i];
                    data.append('images[' + i + ']', images);
                }
            }
            data.append('_method', 'put');
            this.$inertia.post(`/dashboard/parts/${this.part.id}`, data);
            },
            handleFileUpload(){
                this.form.images = this.$refs.images.files;
            }
        }
    }
</script>
