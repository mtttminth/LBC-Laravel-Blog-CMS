<x-admin-master>
    @section('content')
        <h1>Edit Role: {{$role->name}}</h1>

        <x-alerts></x-alerts>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{ $role->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

        @if ($permissions->isNotEmpty())
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4 mt-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                                <th>Options</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                          </tfoot>
                          <tbody>
                              @foreach ($permissions as $permission)
                              <tr>
                                <td>
                                    <input type="checkbox" name="" id=""
                                    @foreach ($role->permissions as $rolePermission)
                                        @if ($rolePermission->slug == $permission->slug)
                                            checked
                                        @endif
                                    @endforeach
                                    >
                                </td>
                                <td>{{ $permission->id }}</td>
                                <td><a href="{{ route('permissions.edit', $permission) }}">{{ $permission->name }}</a></td>
                                <td>{{ $permission->slug }}</td>
                                <td>
                                    <form action="{{ route('roles.permission.attach', $role) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="permission" value="{{$permission->id}}">
                                        <button class="btn btn-success"
                                        @if ($role->permissions->contains($permission))
                                            disabled
                                        @endif
                                        >Attach</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('roles.permission.detach', $role) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="permission" value="{{$permission->id}}">
                                        <button class="btn btn-danger"
                                        @if (!$role->permissions->contains($permission))
                                            disabled
                                        @endif
                                        >Detach</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endsection
</x-admin-master>
