<x-admin-master>
    @section('content')
    <h1>All Posts</h1>

    {{-- @if (session('post-deleted-message'))
        <div class="alert alert-danger">{{ session('post-deleted-message') }}</div>

        @elseif (session('post-created-message'))
        <div class="alert alert-success">{{ session('post-created-message') }}</div>
        @elseif (session('post-updated-message'))
        <div class="alert alert-success">{{ session('post-updated-message') }}</div>
        @elseif($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

     @endif --}}

     <x-alerts></x-alerts>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Owner</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Owner</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Delete</th>

                </tr>
              </tfoot>
              <tbody>
                  @foreach ($posts as $post )
                  <tr>
                      <td>{{ $post->id }}</td>
                      <td>{{ $post->user->name}}</td>
                      <td><a href="{{ route('post.edit',$post->id) }}">{{ $post->title }}</a></td>
                      <td><img height="70px" width="140px" src="{{ $post->post_image }}" alt=""></td>
                      <td>{{ $post->created_at->diffForHumans() }}</td>
                      <td>{{ $post->updated_at->diffForHumans() }}</td>
                      <td><form action="{{ route('post.destroy',$post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form></td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="d-flex">
          <div class="mx-auto">
              {{ $posts->links() }}
          </div>
      </div>
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
            </script>

            <script src=" https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js">
            </script>

    <!-- Page level custom scripts -->
    {{-- <script src="{{asset('js/demo/datatables-demo.js') }}"></script> --}}

    @endsection
</x-admin-master>
