<template>
<div>
  <VueSlickCarousel v-bind="settings" class="my-6">
    <div @click="(isOpen = !isOpen) && (cat = super_cat) && (super_id = cat)" v-for="super_cat in super_category" :key="super_cat.index">
        <img class="w-56 h-56 object-center object-cover mx-auto" :src="super_cat.url[0]" alt="">
    </div>
  </VueSlickCarousel>

  <!-- <div v-if="isOpen" class="flex justify-center">
    <div  v-for="category in categories" :key="category.index">
      <inertia-link :href="'/items/'+category.id" class="flex justify-center mx-2">
        <img v-if="category.super_category_id == cat.id" class="h-12 mx-auto my-2 object-center object-cover w-12" :src="category.url[0]" alt="">
      </inertia-link>
    </div>
  </div> -->
  
  <slot class="mt-5 block" v-if="isOpen" :super_id="super_id"></slot>
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
    props:{
      super_category:Array,
      categories:Array,
    },
    data() {
      return {
        isOpen:false,
        super_id:[],
        cat:[],
        settings: {
          "centerMode": true,
          "infinite": true,
          "speed": 500,
          "slidesToShow": 3,
          "slidesToScroll": 3,
          "touchThreshold": 5,
          "adaptiveHeight": true,
          "focusOnSelect":false
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