<template>
  <VueSlickCarousel v-bind="settings">
    <div v-for="category in categories" :key="category.index"   class="bg-teal-900" v-show="category.super_category_id == super_category.id">
      
      <inertia-link :href="'/items/'+category.id" class="">
        <h1> {{category.name}}</h1>
          <img class="h-12 mx-auto my-2 object-center object-cover w-12" :src="category.url[0]" alt="">
      </inertia-link>
  </div>
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
      'slidesToShow',
      'categories',
      'super_category'
    ],
    components: { VueSlickCarousel },
    data() {
      return {
        settings: {
          arrows: this.arrows,
          slidesToShow:this.slidesToShow,
          "centerMode": false,
          
          "speed": 500,
          "slidesToScroll": 2,
          "touchThreshold": 3,
          // "adaptiveHeight": true
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