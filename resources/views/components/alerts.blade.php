@if (Session::has('message'))
    <div class="alert alert-danger">{{ session('message') }}</div>
@endif

        {{-- POST Alert --}}
@if (session('post-created-message'))
    <div class="alert alert-success">{{ session('post-created-message') }}</div>
@endif

@if (session('post-deleted-message'))
    <div class="alert alert-danger">{{ session('post-deleted-message') }}</div>
@endif

@if (session('post-updated-message'))
    <div class="alert alert-success">{{ session('post-updated-message') }}</div>
@endif

        {{-- USER Alert --}}
@if (session('user-updated'))
    <div class="alert alert-success">{{ session('user-updated') }}</div>
@endif

@if (session('user-deleted'))
    <div class="alert alert-danger">{{ session('user-deleted') }}</div>
@endif

        {{-- ROLE Alert --}}
@if (session('role-created'))
    <div class="alert alert-success">{{ session('role-created') }}</div>
@endif

         {{-- General Alert --}}
@if (session('updated'))
    <div class="alert alert-success">{{ session('updated') }}</div>
@endif

@if (session('deleted'))
    <div class="alert alert-danger">{{ session('deleted') }}</div>
@endif

