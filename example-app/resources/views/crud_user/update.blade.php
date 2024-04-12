@extends('dashboard')

@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="card text-center" style="padding:15px;">
                <h4 class="text-primary">UPDATE</h4>
            </div><br><br>
            <div class="container ">
                <div class="container" style="border: 2px solid black;">
                    <form action="{{ route('user.postUpdateUser') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($user)
                        <input name="id" type="hidden" value="{{$user->id}}">
                        @endisset

                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input name="name" type="text" class="form-control" placeholder="nhap ma sinh vien" value="{{ $user->name }}" id="name" required autofocus>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" placeholder="Email" id="email_address" class="form-control" value="{{ $user->email }}" name="email" required autofocus>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">nhập password mới</label>
                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">nhập phone</label>
                            <input type="text" placeholder="phone_number" id="phone_number" class="form-control" value="{{ $user->phone_number }}" name="phone_number" required>
                            @if ($errors->has('phone_number'))
                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="#">Ảnh hiện tại :</label>

                            <td>
                                @if (!empty($user->profile_image))
                                <img src="data:image/jpeg;base64,{{ base64_encode($user->profile_image) }}" alt="Profile Image">
                                @else
                                <p>Không có hình ảnh</p>
                                @endif
                            </td>
                            <br>
                            <label for="profile_image">Vui Lòng Chọn Hình Ảnh Để Sửa:</label>
                            <input type="file" name="profile_image" id="profile_image" class="form-control">
                            @if ($errors->has('profile_image'))
                            <span class="text-danger">{{ $errors->first('profile_image') }}</span>
                            @endif
                        </div>


                        <input type="submit" name="submit" class="btn btn-primary" style="float:left;" value="Update">
                    </form>

                </div>
                <br><br><br><br>
            </div>
            <footer class="py-5 bg-dark">
                <div class="container">
                    <p class="m-0 text-center text-white">Lập trình web @ 01/2024</p>
                </div>
            </footer>



        </div>
    </div>
</main>
@endsection