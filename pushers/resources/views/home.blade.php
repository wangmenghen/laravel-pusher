@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://js.pusher.com/4.0/pusher.min.js"></script> -->
<!-- <script>
    Pusher.logToConsole = true;
 
    var pusher = new Pusher('90d1e9425a6bf3f6041f', {
      cluster: 'ap1',
      encrypted: false
    });
    var channel = pusher.subscribe('rmz');
    channel.bind('rmz-event', function(data) {
        console.log('data', data);
    });
    channel.bind('pusher:subscription_succeeded', function(members) {
        console.log('channel', channel);
    });
</script> -->

@endsection
