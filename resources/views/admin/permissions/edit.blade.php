<x-admin-master>
    @section('content')
        <h1>Edit Permission: {{$permission->name}}</h1>

        <x-alerts></x-alerts>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{ route('permissions.update', $permission->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{ $permission->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
