<template>
    <div class="flex justify-center py-6" v-if="data.per_page < data.total">
        <div class="flex">
            <inertia-link :href="data.prev_page_url" :class="data.prev_page_url ? 'bg-teal-700 text-white hover:bg-white hover:text-teal-700 hover:border-teal-700 border-2' : 'cursor-not-allowed text-gray-500 bg-white'" class="px-3 py-2 mx-1 rounded-md">
                previous
            </inertia-link>

            <inertia-link :href="data.next_page_url" :class="data.next_page_url ? 'bg-teal-700 text-white hover:bg-white hover:text-teal-700 hover:border-teal-700 border-2' : 'cursor-not-allowed text-gray-500 bg-white'" class="px-3 py-2 mx-1 rounded-md">
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