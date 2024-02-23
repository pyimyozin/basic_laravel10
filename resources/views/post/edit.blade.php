@include('../partials/nav')
    <div class="container mt-5">
        <div class="row">
        <div class="col md-3"></div>
        <div class="col md-6">
            <h5 class="text-center">Edit Post</h5>
            <form action="{{ route('post#update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter post title" value="{{$post->title ?? old('title')}}">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3" placeholder="Enter content..." value="">{{$post->content ?? old('content')}}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    @if($post->image)
                        <div class="w-25">
                            <img src="{{ asset('/images/' . $post->image) }}" alt="Existing Image" class="img-fluid mb-2" value="{{ $post->image }}" readonly>
                        </div>
                    @endif
                    
                    <input type="file" name="image" id="image" class="form-control">

                    @if($post->image)
                        <small class="text-muted">Leave it empty if you don't want to change the existing image.</small>
                    @endif
                </div>
                <div class="button d-flex justify-content-center">
                    <button class="btn btn-primary mt-2">Update</button>
                </div>
            </form>
        </div>
        <div class="col md-3"></div>
        </div>
    </div>
@include('../partials/footer');