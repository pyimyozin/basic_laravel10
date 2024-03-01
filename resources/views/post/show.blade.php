@include('../partials/nav')
    <div class="col-md-2"></div>
    <div class="container col-md-8 my-2">
        <a href="{{url('/posts')}}"><button type="button" class="btn btn-dark">Back</button></a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(isset($post->image))
            <div class="image w-75 d-flex justify-content-center m-auto">
                <img src="{{ asset('/images') }}/{{$post->image}}" alt="Post Image" class="w-100">
            </div>  
        @endif
        <div class="content d-flex justify-content-center">
            <p>{{$post->content}}</p>
        </div>
        <form action="{{route('post#destory',$post->id)}}" method="POST" class="d-flex justify-content-center">
            @csrf
            @method('DELETE')
            <a href="{{route('post#edit',$post->id)}}" style="text-decoration: none;" class="pe-2">
                <button type="button" class="btn btn-success sm"><i class="fa fa-edit"></i>edit</button>
            </a>
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to sure to delete?')"><i class="fa fa-trash"></i>delete</button>
        </form>
    </div>
    <div class="col-md-2"></div>
@include('../partials/footer');