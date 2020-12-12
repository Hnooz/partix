<template>
<div>
  <VueSlickCarousel v-bind="settings" class="my-6">
    <div @click="isOpen = !isOpen">
        <img class="w-full h-64 object-center object-cover mx-auto" src="../../images/1223/Groupe 192.png" alt="">
    </div>
    <div @click="isOpen = !isOpen">
        <img class="w-full h-64 object-center object-cover mx-auto" src="../../images/1223/Groupe 192.png" alt="">
    </div>
    <div @click="isOpen = !isOpen">
        <img class="w-full h-64 object-center object-cover mx-auto" src="../../images/1223/Groupe 192.png" alt="">
    </div>
    <div @click="isOpen = !isOpen">
        <img class="w-full h-64 object-center object-cover mx-auto" src="../../images/1223/Groupe 192.png" alt="">
    </div>
  </VueSlickCarousel>
  <slot class="mt-5 block" v-if="isOpen"></slot>
</div>
  
</template>
<script>
  import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

  export default {
    name: 'Mutlislide',
    components: { VueSlickCarousel },
    data() {
      return {
        isOpen:false,
        settings: {
          "centerMode": true,
          "infinite": true,
          "speed": 500,
          "slidesToShow": 3,
          "slidesToScroll": 3,
          "touchThreshold": 5,
          "adaptiveHeight": true
        },
      }
    },
  }
</script>

<style>
  .slick-prev:before, .slick-next:before{
    color: teal;
  }
</style>