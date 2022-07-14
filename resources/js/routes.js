import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComp from './components/pages/HomeComp';
import AboutComp from './components/pages/AboutComp';
import BlogComp from './components/pages/BlogComp';
import ContactsComp from './components/pages/ContactsComp';

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComp
        },
        {
            path: '/about',
            name: 'about',
            component: AboutComp
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogComp
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsComp
        },
    ]
});

export default router;
