import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import { ZiggyVue  } from 'ziggy-js';
import { Ziggy } from './ziggy.js';
// import { Inertia } from '@inertiajs/inertia';
import NProgress from 'nprogress'
import { router } from '@inertiajs/vue3'
router.on('start', () => NProgress.start())

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    // return pages[`./Pages/${name}.vue`]
    const page =  pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || MainLayout
    return page
  },

  progress: {
    // The delay after which the progress bar will appear, in milliseconds...
    delay: 250,
    // The color of the progress bar...
    color: '#29d',
    // Whether to include the default NProgress styles...
    includeCSS: true,
    // Whether the NProgress spinner will be shown...
    showSpinner: true,
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue,Ziggy)
      .mount(el)
  },
})