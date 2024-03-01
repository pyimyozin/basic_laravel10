@include('../partials/nav')
    <div class="container my-5">
        <div class="row">
        <div class="col md-3"></div>
        <div class="col md-6">
            <h5 class="text-center">Registration Users</h5>
            <form action="{{route('user#store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" value="{{old('email')}}">
                    @error('content')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Email Verify" value="{{old('password')}}">
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
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