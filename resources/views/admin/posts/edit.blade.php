<x-admin-master>
    @section('content')

    <h1>Edit Post</h1>

      <x-alerts></x-alerts>

    <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" aria-describedby=""
      value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <div><img height="100px" src="{{ $post->post_image }}"></div>
        <label for="file">File</label>
        <input type="file" name="post_image" id="post_image" class="form-control-file" >
      </div>

      <div class="form-group">
          <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
    </x-admin-master>
