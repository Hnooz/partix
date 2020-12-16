<template>
  <VueSlickCarousel v-bind="settings">
    <slot></slot>
  </VueSlickCarousel>
</template>
<script>
  import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

  export default {
    name: 'Slide',
    props:[
      'arrows',
      'slidesToShow'
    ],
    components: { VueSlickCarousel },
    data() {
      return {
        settings: {
          arrows: this.arrows,
          slidesToShow:this.slidesToShow,
          "centerMode": true,
          "infinite": true,
          "speed": 500,
          "slidesToScroll": 2,
          "touchThreshold": 3,
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