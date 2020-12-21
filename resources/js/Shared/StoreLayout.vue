<template>
    <div :dir="changedir == 'ar' ? 'rtl' : 'ltr'">
        
        <slot></slot>
        <flash v-if="$page.flash" :type="$page.flash.type" :popstate="$page.popstate">{{ $page.flash.message}}</flash>
    </div>
</template>

<script>
import Flash from "../components/UI/Flash";
    export default {
        components: {Flash},
        data() {
            return {
                changedir:this.$page.locale
            }
        },
    }
</script>

<style>

</style>