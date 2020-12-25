<template>
  <VueSlickCarousel v-bind="settings">
    <div v-for="category in super_category.categories" :key="category.index" class="bg-teal-700">
      
      <inertia-link :href="'/store/items/'+category.id" class="flex text-white font-semibold">
        <h1 class="mx-6 text-center w-full"> {{category.name}}</h1>
          <!-- <img class="h-12 mx-auto my-2 object-center object-cover w-12" :src="category.url[0]" alt=""> -->
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
          "centerMode": true,
          
          "speed": 500,
          "slidesToScroll": 3,
          "adaptiveHeight": true,
                 "responsive": [
          {
            "breakpoint": 1024,
            "settings": {
              "slidesToShow": 3,
              "slidesToScroll": 3,
              "infinite": true,
              "dots": true
            }
          },
          {
            "breakpoint": 600,
            "settings": {
              centerMode: true,
              adaptiveHeight: true,
              "slidesToShow": 2,
              "slidesToScroll": 2,
              "initialSlide": 2
            }
          },
          {
            "breakpoint": 480,
            "settings": {
              centerMode: true,
              adaptiveHeight: true,
              "slidesToShow": 1,
              "slidesToScroll": 1
            }
          }
  ]
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