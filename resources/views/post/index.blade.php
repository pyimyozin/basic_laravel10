@include('../partials/nav')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h5 class="text-">Post Lists</h5>
                <a href="{{url('/posts/create')}}" style="text-decoration: none;">
                    <button class="btn btn-primary btn-sm mb-2" style="float: right;"><i class="fa fa-plus-circle"></i> Add New </button>
                </a>
                @if(session('successAlert'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <strong>{{ session('successAlert') }}</strong>
                        <button class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->excerpt()}}</td>
                            <td>
                                <a href="{{route('post#show',$post->id)}}" style="text-decoration: none;">
                                    <button type="button" class="btn btn-info sm text-white"><i class="fa fa-file"></i>View</button>
                                </a>                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    @include('../partials/footer');