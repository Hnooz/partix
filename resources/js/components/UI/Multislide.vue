<template>
  <VueSlickCarousel v-bind="settings" ref="c1" :asNavFor="$refs.c2" :focusOnSelect="true">
    
      <slot></slot>
    
   
  </VueSlickCarousel>
</template>
<script>
  import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

  export default {
    name: 'Mutislide',
    props:[
      'arrows',
      'slidesToShow'
    ],
    components: { VueSlickCarousel },
    data() {
      return {
        settings: {
          arrows: this.arrows,
          // dots: true,
          slidesToShow:this.slidesToShow,
          // swipeToSlide:true,
          slidesToScroll:1,
          infinite:true,
          // swipe:true,
          // dotsClass:'slick-dots',
          speed:2000,
          autoPlay:true,
          autoPlaySpeed:2000,
          cssEase:"linear"
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