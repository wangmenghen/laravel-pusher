import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '90d1e9425a6bf3f6041f',
    cluster: 'ap1',
    encrypted: false
});
Echo.channel('rmz')
    .listen('rmz-event', function (data) {
        console.log('data');
        console.log(data);
    });