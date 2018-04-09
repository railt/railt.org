import VueRouter from 'vue-router';

import {NotFound} from "./components/default";
import {Documentation, Home} from "./pages/default";

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/docs',
            component: Documentation,
            children: [
                {
                    path: ':path*',
                    name: 'docs',
                    component: Documentation,
                }
            ]
        },
        {
            path: '*',
            component: NotFound
        }
    ]
});
