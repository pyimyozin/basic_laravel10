@include('../partials/nav')
    <div class="container my-5">
        <div class="row">
        <div class="col md-3"></div>
        <div class="col md-6">
            <h5 class="text-center">Create Post</h5>
            <form action="{{route('post#store')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter post title" value="{{old('title')}}">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3" placeholder="Enter content..." value="">{{old('content')}}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="button mx-auto">
                    <button class="btn btn-primary mt-2">Submit</button>
                </div>
            </form>
        </div>
        <div class="col md-3"></div>
        </div>
    </div>
@include('../partials/footer');