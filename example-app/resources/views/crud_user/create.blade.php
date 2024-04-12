<style>
    main{
        min-height: 80vh;
    }
</style>
@extends('dashboard')

@section('content')
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-5">
                    <div class="card" style="border: 2px solid black;">
                        <h3 class="card-header text-center text-danger" style="font-size: 50px; margin-bottom:20px;">Đăng ký</h3>
                        <div class="card-body">
                            <form action="{{ route('user.postUser') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                           required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                           name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Phone Number" id="phone_number" class="form-control" name="phone_number">
                                     @if ($errors->has('phone_number'))
                                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="profile_image">Vui Lòng Chọn Hình Ảnh:</label>
                                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                                    @if ($errors->has('profile_image'))
                                        <span class="text-danger">{{ $errors->first('profile_image') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit"  style="background-color: aqua; width:200px; margin-left: 200px" class="btn btn-dark btn-block">Đăng Ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-5 bg-dark">
                <div class="container">
                    <p class="m-0 text-center text-white">Lập trình web @ 01/2024</p>
                </div>
            </footer>
@endsection