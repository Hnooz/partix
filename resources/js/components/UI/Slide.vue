<template>
  <div>
    <VueSlickCarousel v-bind="settings" class="mx-4">

      <div class="border mx-4 relative shadow-lg w-1/3">
          <h1 class="border-blue-400 pl-3 py-1 text-gray-600">Original</h1>
          <img class="h-32 mx-auto my-3 object-center object-cover w-32" src="../../images/car.jpeg" alt="">
          <p class="text-gray-700 text-sm pl-3 my-3">$45,8</p>
          <button type="button" class="bg-blue-400 flex focus:outline-none justify-center outline-none py-2 rounded text-white w-full">
              <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-8 h-8">
                  <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
              </svg>
          </button>
          <span class="absolute bg-blue-400 px-4 py-1 right-0 rounded-bl-lg shadow-lg text-sm text-white top-0 tracking-tighter">-23%</span>
       </div>

      <div class="border mx-4 relative shadow-lg w-1/3">
        <h1 class="border-blue-400 pl-3 py-1 text-gray-600">Improved</h1>
        <img class="h-32 mx-auto my-3 object-center object-cover w-32" src="../../images/panda.jpg" alt="">
        <p class="text-gray-700 text-sm pl-3 my-3">$45,8</p>
        <button type="button" class="bg-blue-400 flex focus:outline-none justify-center outline-none py-2 rounded text-white w-full">
          <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-8 h-8">
              <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
          </svg>
        </button>
        <span class="absolute bg-blue-400 px-4 py-1 right-0 rounded-bl-lg shadow-lg text-sm text-white top-0 tracking-tighter">-23%</span>
      </div>

       <div class="border mx-4 relative shadow-lg w-1/3">
          <h1 class="border-blue-400 mb-20 pl-3 py-1 text-gray-600">Used</h1>
          <button type="button" class="bg-blue-400 focus:outline-none mb-10 mx-10 outline-none px-2 py-1 rounded text-white">Order Now</button>
          <p class="text-gray-700 text-sm pl-3 mb-3">$45,8</p>
          <button type="button" class="bg-blue-400 flex focus:outline-none justify-center outline-none py-2 rounded text-white w-full">
              <svg viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-8 h-8">
                  <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
              </svg>
          </button>
      </div>

    </VueSlickCarousel>
  </div>
</template>

<script>
  import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

  export default {
    name: 'MyComponent',
    components: { VueSlickCarousel },
    data() {
      return {
        settings:{
              "dots": false,
              "infinite": true,
              "initialSlide": 2,
              "speed": 500,
              "slidesToShow": 2,
              "slidesToScroll": 1,
              "swipeToSlide": true
            }
      }
    },
  }
</script>