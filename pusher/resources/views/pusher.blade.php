@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pusher</div>

                <div class="card-body">
                    Pusher tester
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
<script>

</script>
@endsection
