<template>
    <div class="bg-white max-w-xs md:max-w-xl mx-auto my-32 py-10 rounded-lg shadow-lg text-center">
        <p class="capitalize text-gray-600">"{{__('your order has been submitted our agent will contact you soon')}}"</p>
        <a href="/store" class="flex focus:outline-none font-medium hover:underline items-center mt-5 mx-10 rounded text-sm text-teal-700">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
            <span class="mx-2">{{__('Back To Shop')}}</span>
        </a>
    </div>
</template>
