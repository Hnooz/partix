require('./bootstrap');

import {InertiaApp} from '@inertiajs/inertia-vue'
import Vue from 'vue'
import vSelect from 'vue-select'
Vue.component('base-select', vSelect)
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('base-nav', require('./components/UI/BaseNav').default);
Vue.component('base-sidebar', require('./components/UI/BaseSidebar').default);
Vue.component('base-panel', require('./components/UI/BasePanel').default);
Vue.component('base-button', require('./components/UI/BaseButton').default);
Vue.component('base-input', require('./components/UI/BaseInput').default);
Vue.component('base-footer', require('./components/UI/BaseFooter').default);

Vue.use(InertiaApp)

Vue.prototype.$route = (...args) => route(...args).url();

Vue.mixin({
    methods: {
        route: route
    }
});
Vue.mixin(require('./base'))
const app = document.getElementById('app')

if (app) {
    new Vue({
        mounted() {
            window.addEventListener('popstate', () => {
                this.$page.popstate = true;
            })
        },
        render: h => h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default,
            },
        }),
    }).$mount(app)
}
