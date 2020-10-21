<template>
<div>
  <VueSlickCarousel v-bind="settings" class="my-6">
    <div class="" @click="isOpen = !isOpen">
        <img class="w-20 h-20 object-center object-cover mx-auto" src="../../images/1223/Groupe 192.png" alt="">
        <!-- <h1>test</h1> -->
    </div>
    <div>
        <img class="w-20 h-20 object-center object-cover mx-auto" src="../../images/1223/Groupe 192.png" alt="">
    </div>
    <div>
        <img class="w-20 h-20 object-center object-cover mx-auto" src="../../images/1223/Groupe 192.png" alt="">
    </div>
    <div>
        <img class="w-20 h-20 object-center object-cover mx-auto" src="../../images/1223/Groupe 192.png" alt="">
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
          // "dots": true,
          "focusOnSelect": true,
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