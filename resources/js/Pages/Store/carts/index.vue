<template>
<div x-data="{ cartOpen: false , isOpen: false }">
    <main class="mb-10 min-h-full">
        <div class="bg-white container mt-16 mx-auto px-6 py-8 shadow-lg">
            <h3 class="text-teal-800 text-2xl font-medium">{{__('Checkout')}}</h3>
            <div class="flex flex-col lg:flex-row mt-8">
                <div class="w-full lg:w-1/2 order-2">
                    <form class="mt-8 lg:w-3/4 pb-4" @submit.prevent="submit">
                        <div class="mt-8">
                            <h4 class="text-sm text-teal-700 font-medium">{{__('Delivery address')}}</h4>
                            <div class="mt-6 flex">
                                <label class="block flex-1">
                                    <input type="text" name="address" v-model="form.address" class="form-input mt-1 block w-full text-gray-700" :placeholder="__('Address')">
                                </label>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="text-sm text-teal-700 font-medium">{{__('Phone')}}</h4>
                            <div class="mt-6 flex">
                                <label class="block w-3/12">
                                    <select class="form-select text-gray-700 mt-1 block w-full">
                                        <option>+974</option>
                                    </select>
                                </label>
                                <label class="block flex-1 ml-3">
                                    <input type="text" name="customer_phone" v-model="form.customer_phone" class="form-input mt-1 block w-full text-gray-700" placeholder="your number">
                                </label>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-8">
                            <a href="/store" class="flex items-center text-teal-700 text-sm font-medium rounded hover:underline focus:outline-none">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                                <span class="mx-2">{{__('Back To Shop')}}</span>
                            </a>
                            <button class="flex items-center px-3 py-2 bg-teal-800 text-white text-sm font-medium rounded-md hover:bg-teal-700 focus:outline-none focus:bg-teal-700">
                                <span>{{__('Payment')}} {{cartTotalPrice}}$</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">
                    <div class="flex justify-center lg:justify-end">
                        <div class="border rounded-md max-w-md w-full px-4 py-3" >
                            <div class="flex items-center justify-between">
                                <h3 class="text-teal-700 font-medium">{{__('Order total')}}({{cartQuantity}})</h3>
                                <span class="text-gray-600">{{cartTotalPrice}}$</span>
                                <button @click="clearCart" type="submit" class="text-teal-600 text-sm">{{__('clear')}}</button>
                            </div>
                            <div class="overflow-y-auto" style="height:300px;">
                                <div class="flex justify-between mt-6"  v-for="(item ,index) in cartCollection" :key="index">
                                    <div class="flex">
                                        <img class="h-20 w-20 object-cover rounded" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80" alt="">
                                        <div class="mx-3">
                                            <h3 class="text-sm text-gray-600">{{item.name}}</h3>
                                            <div class="flex items-center mt-2">
                                                <button @click="increment(item)" type="button" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </button>
                                                <span class="text-gray-700 mx-2">{{item.quantity}}</span>
                                                <button @click="decrement(item)" type="button" class="text-gray-500 focus:outline-none focus:text-gray-600" :disabled="item.quantity == 0">
                                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-gray-600">{{item.price}}$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <BaseFooter class="mt-32"/>
</div>
</template>

<script>
import BaseNav from '../../../components/UI/BaseNav'
import BaseFooter from '../../../components/UI/BaseFooter'
    export default {
        components:{
            BaseNav,
            BaseFooter
        },
        props:['cartCollection','cartQuantity', 'cartTotalPrice'],
        data() {
            return {
                form:{
                    customer_phone:'',
                    address:'',
                }
            }
        },
        methods: {
            submit()
            {
                this.$inertia.post('/orders', this.form);
            },
            increment(item){
                item.quantity++;
                this.$inertia.put(`/cart/${item.id}`, item);
            },

            decrement(item){
                item.quantity--;
                this.$inertia.put(`/cart/${item.id}`, item);
            },
            clearCart(){
                this.$inertia.delete(`clear`);
            }
        },
    }
</script>

<style>

</style>