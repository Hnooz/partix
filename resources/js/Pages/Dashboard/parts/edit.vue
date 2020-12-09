<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">Part/<span class="text-gray-500">Edit</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="Name"  name="name"  v-model="form.name" :error="$page.errors.name" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input label="Part Number"  name="number"  v-model="form.number" :error="$page.errors.number" tabindex="2" required></base-input>
                        </div>
                        <div>
                            <base-input label="Description"  name="description"   v-model="form.description" :error="$page.errors.description" tabindex="3" required></base-input>
                        </div>
                        <div>
                            <base-input type="number" label="Price"  name="price"  v-model="form.price" :error="$page.errors.price" tabindex="4" required></base-input>
                        </div>
                        <div>
                            <base-input type="number" label="Price for used part"  name="second_price"  v-model="form.second_price" :error="$page.errors.second_price" tabindex="5" required></base-input>
                        </div>
                        <div>
                            <base-input label="Slug"  name="slug"  v-model="form.slug" :error="$page.errors.slug" tabindex="6" required></base-input>
                        </div>
                        <div>
                            <label class="text-gray-700">Car</label>
                                <select  name="car_id"  v-model="form.car_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.car_id" required tabindex="7">
                                    <option v-for="car in cars" :key="car.index" :value="car.id">{{car.brand}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">Category</label>
                                <select  name="category_id"  v-model="form.category_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.category_id" required tabindex="8">
                                    <option v-for="category in categories" :key="category.index" :value="category.id">{{category.name}}</option>
                                </select>
                        </div>
                        <div>
                            <label class="text-gray-700">Supplier</label>
                                <select  name="supplier_id"  v-model="form.supplier_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.supplier_id" required tabindex="9">
                                    <option v-for="supplier in suppliers" :key="supplier.index" :value="supplier.id">{{supplier.name}}</option>
                                </select>
                        </div>
                        <div>
                            <!-- <input type="image"> -->
                            <base-input id="image" type="file" ref="image" label="Image" name="image" @change="handleFileUpload()" :error="$page.errors.file" tabindex="7" required></base-input>
                        </div>
                        
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700">Update Part</base-button>
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
        props:['part','cars', 'suppliers','categories'],
        data() {
            return {
                form: {
                    name: '',
                    number: '',
                    description: '',
                    price: '',
                    second_price:'',
                    slug: '',
                    car_id: '',
                    supplier_id:'',
                    category_id:'',
                    image:null
                },
                   
                // },
               
            }
        }, 
        created() {
            this.form = this.part;
        },
        methods: {
            submit() {
            
            //  const data = new FormData();

            // data.append('name', this.part.name);
            // data.append('number', this.part.number);
            // data.append('description', this.part.description);
            // data.append('price', this.part.price);
            // data.append('slug', this.part.slug);
            // data.append('car_id', this.part.car_id);
            // data.append('image', this.part.image);

            this.$inertia.put(`/dashboard/parts/${this.part.id}`, this.form);
            },

            // handleFileUpload(event){
            //     this.part.image = event.target.files[0];
            // }
        }
    }
</script>
