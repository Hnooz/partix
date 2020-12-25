<template>
    <layout>

        <div class="mt-8 capitalize">
            <div class="flex">
                <h2 class="text-3xl text-teal-700 font-bold">{{__('users')}}/<span class="text-gray-500">{{__('Edit')}}</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                       <div>
                            <base-input :label="__('name')" name="name" v-model="form.name" :error="$page.errors.name" :placeholder="__('e.g Mohammed')" required></base-input>
                        </div>
                        <div>
                            <base-input type="email" :label="__('email')" name="email" v-model="form.email" :error="$page.errors.email" :placeholder="__('e.g mohammed@email.com')" required></base-input>
                        </div>
                        <div>
                            <base-input :label="__('password')" type="password" v-model="form.password" :error="$page.errors.password" :placeholder="__('e.g password')" required></base-input>
                        </div>
                        <base-input :label="__('password confirmation')" type="password" v-model="form.password_confirmation" :placeholder="__('e.g password')" required></base-input>

                        <div>
                            <base-input type="number" :label="__('admin')" name="is_admin" v-model="form.is_admin" :error="$page.errors.is_admin" :placeholder="__('e.g 1 or 0')" required></base-input>
                        </div>
                        <div>
                            <base-input type="number" :label="__('delivery')" name="is_delivery" v-model="form.is_delivery" :error="$page.errors.is_delivery" :placeholder="__('e.g 1 or 0')" required></base-input>
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
