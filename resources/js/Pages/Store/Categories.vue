<template>
    <div>
        <BaseNav/>
        <div class="mb-56 mt-48 md:mt-64 mx-5">
                <h1 class="font-semibold md:text-4xl md:text-center md:my-6 mx-3 mt-3 text-gray-700">Partix car parts catalogue</h1>
                <div class="md:grid md:grid-cols-4 lg:grid-col-5 md:mx-0 mx-3">
                    <div v-for="(category, index) in categories" :key="index">
                        <ToggleMenu class="" :name="category.name" :img="category.img" :side="category.sideCategory">
                            <div class="md:absolute bg-white md:grid md:grid-cols-6 md:left-0 md:max-w-screen-xl md:mx-8 w-full">
                                <div  class="bg-white flex items-center md:mx-2 md:my-2 md:text-xs ml-2 pl-3" v-for="(side, index) in category.sideCategory" :key="index">
                                    <img :src="side.img" alt="" class="h-12 w-12">
                                    <a href="/items" class="capitalize font-medium px-2 text-gray-600">{{side.name}}</a>
                                </div>
                            </div>
                        </ToggleMenu>
                    </div>
                </div>
            </div>
        <BaseFooter/>
    </div>
</template>

<script>
import BaseNav from '../../components/UI/BaseNav'
import ToggleMenu from "../../components/UI/ToggleMenu";
import BaseFooter from '../../components/UI/BaseFooter'
export default {
    components:{
        BaseNav,
        BaseFooter,
        ToggleMenu
    },
    data() {
return {
    showModal: false,
    categories:[
        {
        img:require('../../images/10102.png'), name:'break system',
        sideCategory:[
            {name:'test 1', img:require('../../images/10102.png')},
            {name:'test 1', img:require('../../images/10102.png')},
            {name:'test 1', img:require('../../images/10102.png')},
            {name:'test 1', img:require('../../images/10102.png')},
            {name:'test 1', img:require('../../images/10102.png')},
            {name:'test 1', img:require('../../images/10102.png')},
            {name:'test 1', img:require('../../images/10102.png')},
            {name:'test 1', img:require('../../images/10102.png')},
            {name:'test 1', img:require('../../images/10102.png')},
            {name:'test 1', img:require('../../images/10102.png')}
        ]
        },

        {
        img:require('../../images/10102.png'), name:'oil system',
        sideCategory:[
            {name:'test 9', img:require('../../images/10102.png')},
            {name:'test 9', img:require('../../images/10102.png')},
            {name:'test 9', img:require('../../images/10102.png')},
            {name:'test 9', img:require('../../images/10102.png')}
        ]
        },

        {
        img:require('../../images/10102.png'), name:'food system',
        sideCategory:[
            {name:'test 10', img:require('../../images/10102.png')},
            {name:'test 10', img:require('../../images/10102.png')},
            {name:'test 10', img:require('../../images/10102.png')},
            {name:'test 10', img:require('../../images/10102.png')}
        ]
        },

        {
        img:require('../../images/10102.png'), name:'test system',
        sideCategory:[
            {name:'test 8', img:require('../../images/10102.png')},
            {name:'test 8', img:require('../../images/10102.png')},
            {name:'test 8', img:require('../../images/10102.png')},
            {name:'test 8', img:require('../../images/10102.png')}
        ]
        }
    ]
}
}
}
</script>

<style>

</style>