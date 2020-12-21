<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">Customer /<span class="text-gray-700"> Edit</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <base-input label="Name" name="name" v-model="form.name" :error="$page.errors.name" required></base-input>
                        <base-input type="email" label="Email address" name="email" v-model="form.email" :error="$page.errors.email" required></base-input>
                        <base-input label="Password" type="password" v-model="form.password" :error="$page.errors.password"></base-input>
                        <base-input label="Password confirmation" type="password" v-model="form.password_confirmation"></base-input>
                        <!-- <div> -->
                            <base-input type="number" label="Admin" name="is_admin" v-model="form.is_admin" :error="$page.errors.is_admin" :placeholder="__('e.g 1 or 0')" required></base-input>
                        <!-- </div> -->
                        <!-- <div> -->
                            <base-input type="number" label="Delivery" name="is_delivery" v-model="form.is_delivery" :error="$page.errors.is_delivery" :placeholder="__('e.g 1 or 0')" required></base-input>
                        <!-- </div> -->
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button class="bg-teal-700">Update user</base-button>
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
        props: ['user'],
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    is_admin:'',
                    is_delivery:'',
                }
            }
        },
        created() {
            this.form = this.user;
        },
        methods: {
            submit() {
                this.$inertia.put(this.$route('users.update', this.user.id), this.form);
            }
        }
    }
</script>
