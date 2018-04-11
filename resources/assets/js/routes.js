import VueRouter from 'vue-router';
import Home from './components/Home';
import Account from './components/Account';
import Documentation from './components/Documentation';
import Error from './components/Error';


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
                    path: ':path+',
                    name: 'docs',
                    component: Documentation,
                }
            ]
        },
        {
            path: '/account',
            name: 'account',
            component: Account
        },
        {
            path: '*',
            component: Error
        }
    ]
});
