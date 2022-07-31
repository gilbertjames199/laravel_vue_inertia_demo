import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Layout from "./Shared/Layout";
//import { createInertiaApp } from '@inertiajs/inertia-vue3'
createInertiaApp({
  //resolve: name => require(`./Pages/${name}`),
  resolve: async name => {
    //let page = require(`./Pages/${name}`).default;
    /*if(! page.layout){
        page.layout = Layout;
    }*/
    let page = (await import(`./Pages/${name}`)).default;
    if (page.layout === undefined){
      page.layout = Layout;
    }
    //page.layout ??= Layout;
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link",Link)
      .component("Head",Head)
      .mount(el)
      //.component(link)
  },
  //title() => "foo"
  //title: title => title + " -My App"
  title: title => `My App - ${title} `
})

InertiaProgress.init({
    color: 'red',
    showSpinner: true,
})

