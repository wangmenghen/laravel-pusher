
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
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
console.log(token)
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.log('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// 1111
import Echo from 'laravel-echo'
import userinfo from '../js/api/getUserInfo'
window.io = require('socket.io-client')
// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: '90d1e9425a6bf3f6041f',
//     cluster: 'ap1',
//     encrypted: true
// });
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: 'https://pushers.test:2053'
});
// window.Echo.channel('rmz')
//     .listen('.rmz-event', function (data) {
//         console.log('data');
//         console.log(data);
//     });
// window.Echo.channel('chat-room.1')
//     .listen('.login', function (data) {
//         console.log(data.user, data.chatMessage);
//     });
let userId;
userinfo().then((data)=>{
    console.log(data.data.user.id);
    userId = data.data.user.id;
    window.Echo.private(`notice.user.${userId}`)
    .listen('PushPersonalNotice', (e) => {
      console.log(e)
    })
});

// window.Echo.private('channel-name')
//     .listen('Event', function (data) {
//         console.log('private');
//         console.log(data);
//     });
window.Echo.channel('notice')
    .listen('PushNoticeToAllUsers', function (data) {
        console.log(data);
    });

async function testAsync() {
    let res = await userinfo();
    console.log('res', res.data.user.id)
    let id = res.data.user.id;
    window.Echo.private(`notice.user.${id}`)
    .listen('PushPersonalNotice', (e) => {
      console.log(e)
    })
}
testAsync()
