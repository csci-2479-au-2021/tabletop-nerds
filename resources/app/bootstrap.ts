import Alpine from 'alpinejs';

// this imports everything we exported in src/index.ts
import tabletop from './src';

// define the properties we'll be adding to the window object
declare global {
    interface Window {
        _: any;
        axios: any;
        tabletop: any;
        Alpine: any;
    }
}

// add our app to the window object
window.tabletop = tabletop;
tabletop.games.initGamelist();

window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

// init AlpineJS
Alpine.start();

export { Alpine };
