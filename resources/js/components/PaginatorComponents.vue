<template>
    <div class="flex justify-center py-6" v-if="data.per_page < data.total">
        <div class="flex">
            <inertia-link :href="data.prev_page_url" :class="data.prev_page_url ? 'text-gray-700 hover:bg-teal-600 hover:text-white' : 'cursor-not-allowed text-gray-500'" class="mx-1 px-3 py-2 bg-white rounded-md">
                previous
            </inertia-link>

            <inertia-link :href="data.next_page_url" :class="data.next_page_url ? 'text-gray-700 hover:bg-teal-600 hover:text-white' : 'cursor-not-allowed text-gray-500'" class="mx-1 px-3 py-2 bg-white rounded-md">
                Next
            </inertia-link>
        </div>
    </div>
</template>

<script>
export default {
    props: ['data'],
}
</script>