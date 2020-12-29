<template>
    <layout>
        <div class="mt-8 capitalize">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">{{__('orders')}}/<span class="text-gray-500">{{__('Edit')}}</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="Phone" name="customer_phone" v-model="form.customer_phone" :error="$page.errors.customer_phone" tabindex="1" required></base-input>
                        </div>
                        <div>
                            <base-input type="text" label="Address" name="address" v-model="form.address"  tabindex="2" required></base-input>
                        </div>
                        <div>
                            <label class="text-gray-700">Status</label>
                                <select  name="order_status_id"  v-model="form.order_status_id" class="form-select text-gray-500 w-full mt-1"   :error="$page.errors.order_status_id" required tabindex="3">
                                   <option value="0">select super</option>
                                    <option v-for="status in order_status" :key="status.index" :value="status.id">{{status.name}}</option>
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
        props:['order', 'order_status'],
        data() {
            return {
                form: {
                    address: '',
                    customer_phone: '',
                    order_status_id: '',
                }
            }
        }, 
        created() {
            this.form = this.order;
        },

        methods: {
          submit()
          {
              this.$inertia.put(this.$route('orders.update', this.order.id), this.form);
          }

        },
    }
</script>
