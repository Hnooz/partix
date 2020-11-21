<template>
    <div :dir="changedir == 'ar' ? 'rtl' : 'ltr'">
        
        <slot></slot>
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                changedir:this.$page.locale
            }
        },
    }
</script>

<style>

</style>