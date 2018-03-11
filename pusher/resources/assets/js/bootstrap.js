
window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
import Pusher from 'pusher-js'
window.Pusher = Pusher;

import Echo from 'laravel-echo'
import userinfo from '../js/api/getUserInfo'

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '90d1e9425a6bf3f6041f',
    cluster: 'ap1',
    encrypted: true
});
window.Echo.channel('rmz')
    .listen('.rmz-event', function (data) {
        console.log('data');
        console.log(data);
    });

let userId;
userinfo().then((data)=>{
    console.log(data.data.user.id);
    userId = data.data.user.id;
});
// window.Echo.private(`order.${userId}`)
//     .listen('.home', function (data) {
//         console.log('private');
//         console.log(data.user, data.chatMessage);
    // });
// window.Echo.channel('chat-room.1')
//     .listen('.ChatMessageWasReceived', function (data) {
//         console.log(data.user, data.chatMessage);
//     });
// window.Echo.private('chat-room.1')
//     .listen('ChatMessageWasReceived', function (data) {
//         console.log(data.user, data.chatMessage);
//     // });
window.Echo.private('App-User.1')
        .notification((notification) => {
            console.log(notification);
        });
window.Echo.private('App-User.1')
        .listen('ChatMessageWasReceived', (e) => {
            console.log(e);
        });

window.Echo.join('chat-room-presence.1')
        .here(function (a) {
            console.log(a);
        })
        .joining(function (joiningMember, members) {
            // runs when another member joins
            console.log(joiningMember);
            console.table(joiningMember);
        })
        .leaving(function (leavingMember, members) {
            // runs when another member leaves
            console.log(leavingMember);
            console.table(leavingMember);
        });
