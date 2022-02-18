@if (Session::has('message'))
    <div class="alert alert-danger">{{ session('message') }}</div>
@endif

@if (session('post-created-message'))
    <div class="alert alert-success">{{ session('post-created-message') }}</div>
@endif

@if (session('user-deleted'))
    <div class="alert alert-danger">{{ session('user-deleted') }}</div>
@endif

@if (session('updated'))
    <div class="alert alert-success">{{ session('updated') }}</div>
@endif

@if (session('deleted'))
    <div class="alert alert-danger">{{ session('deleted') }}</div>
@endif
