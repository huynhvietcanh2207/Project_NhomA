
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          main{
        min-height: 70vh;
    }
    </style>
</head>
<body>
    
</body>
</html>@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="cotainer" style="margin-top:100px;">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card " style="border: 2px solid black;">
                        <h3 class="card-header text-center" style="font-size: 50px; margin-bottom:20px;">Đăng Nhập</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.authUser') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                           autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Ghi Nhớ Đăng Nhập
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit"  style="background-color: aqua; width:200px; margin-left: 200px" class="btn btn-dark btn-block">Đăng Nhập</button>
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
