<x-admin-master>
@section('content')

<h1>Create</h1>

{{-- @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}



<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
  <label for="title">Title</label>
  <input type="text" name="title" id="title" class="form-control"
  placeholder="Enter Title (minimum 8 required)"
  aria-describedby="">

  @error('title')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

</div>
<div class="form-group">
    <label for="file">File</label>
    <input type="file" name="post_image" id="post_image" class="form-control-file" >
  </div>

  <div class="form-group">
      <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>

      @error('body')
    <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
</x-admin-master>
