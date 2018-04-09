
import {HttpLink} from 'apollo-link-http';

/**
 * We will register the CSRF Token as a common header so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let csrf = document.head.querySelector('meta[name="csrf-token"]');

if (! csrf) {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Next we will register the Auth Token as a common header.
 */

let auth = document.head.querySelector('meta[name="auth-token"]');

if (! auth) {
    console.error('Auth token not found');
}


export default new HttpLink({
    uri: process.env.MIX_GRAPHQL_URI,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-Token': csrf.content,
        'Authorization': `Bearer ${auth.content}`
    }
});
