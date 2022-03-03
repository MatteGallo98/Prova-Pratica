/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import axios from 'axios'
import VueAxios from 'vue-axios'
require('./bootstrap');

InertiaProgress.init();

createInertiaApp({
  resolve: name => import(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(VueAxios, axios)
      .mixin({methods: {route}})
      .mount(el)
  },
});
