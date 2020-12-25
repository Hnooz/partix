<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold capitalize">{{__('coupons')}}/<span class="text-gray-500">{{__('Edit')}}</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input :label="__('name')"  name="name"  v-model="form.name" :error="$page.errors.name" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('value')" type="number"  name="value"  v-model="form.value" :error="$page.errors.value" tabindex="2" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('quantity')" type="number" name="quantity"  v-model="form.quantity" :error="$page.errors.quantity" tabindex="3" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('expiration_at')" type="date" name="expiration_at"  v-model="form.expiration_at" :error="$page.errors.expiration_at" tabindex="4" required></base-input>
                        </div>
                        
                        <div>
                            <label class="text-gray-700">{{__('type')}}</label>
                                <select  name="descount_type_id"  v-model="form.descount_type_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.descount_type_id" required tabindex="9">
                                    <option value="0">select type</option>
                                    <option v-for="type in descountType" :key="type.index" :value="type.id">{{type.name}}</option>
                                </select>
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
        props:['coupon','descountType'],
        data() {
            return {
                form: {
                    name:'',
                    value: '',
                    quantity:'',
                    expiration_at: '',
                    descount_type_id: 0,
                },

            }
        }, 
        created() {
            this.form = this.coupon;
        },
        methods: {
            submit() {
                this.$inertia.put(`/dashboard/coupons/${this.coupon.id}`, this.form);
            },

        }
    }
</script>
