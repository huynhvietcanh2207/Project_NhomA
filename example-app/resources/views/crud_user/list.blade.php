<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .login-form {
            text-align: center;
            justify-content: center;
            margin-top: 200px;
            /* Thêm đường viền cho bảng */
        }

        .row {}

        th {
            width: 20px;
            height: 20px;
            border: 3px solid black;
            background-color: lightgray;
            padding: 5px;
        }

        .pagination {
            margin-top: 50px;
            /* Đẩy phân trang lên trên */
            display: flex;
            justify-content: center;
        }

        table {
            margin-bottom: 50px;
        }

        p {
            font-size: 50px;
            color: red;
        }

        main {
            min-height: 60vh;
        }
    </style>
</head>

<body>

</body>

</html>
@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <!-- @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif -->
            <p>Danh Sách User</p>
            <table style="border: 3px solid black;">
                <thead>
                    <tr>
                        <th style="border: 3px solid black; background-color: lightgray;">ID</th>
                        <th style="border: 3px solid black; background-color: lightgray;">Name</th>
                        <th style="border: 3px solid black; background-color: lightgray;">Email</th>
                        <th style="border: 3px solid black; background-color: lightgray;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                            <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                            <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                            <script>
                                function comfirmDelete(){
                                    if (comfirm('bạn có muốn xóa ngay bây giờ không ?')){
                                        window.location.href = '/deleteUser';
                                    }
                                }
                            </script>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{$users->links()}}
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