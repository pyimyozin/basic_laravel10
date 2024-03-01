@include('../partials/nav')
{{-- @section('content') --}}
    <div class="container m-auto">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" value="{{old('email')}}">
                        @error('content')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Email Password" value="{{old('password')}}">
                        @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="button mx-auto">
                        <button class="btn btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
{{-- @endsection --}}
@include('../partials/footer')
