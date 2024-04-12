<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('crud_user.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Đăng Nhập Thành Công!');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Registration page
     */
    public function createUser()
    {
        return view('crud_user.create');
    }







    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone_number' => 'nullable|numeric',
            'profile_image' => 'required|image',
        ]);

        // ghi lại dữ liệu nhị phân từ hình ảnh nha và lưu trữ vào cột 'profile_image'
        $imageContent = file_get_contents($request->file('profile_image')->path());

        // Tạo một bản ghi mới trong bảng 'users'
        $check = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'profile_image' => $imageContent,
        ]);

        return redirect("login");
    }






    /**
     * View user detail page
     */
    public function readUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.read', ['messi' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);
    
        return redirect("list")->withSuccess('Bạn đã xóa thành công!!');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
{
    // lấy input từ request
    $input = $request->all();

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $input['id'],
        'password' => 'required|min:6',
        'phone_number' => 'nullable|numeric',
        'profile_image' => 'nullable|image',
    ]);

    $user = User::find($input['id']);

    // update user
    $user->name = $input['name'];
    $user->email = $input['email'];
    $user->password = $input['password'];
    $user->phone_number = $input['phone_number'];

    // kiểm tra tải lên hình ảnh chưa ấy
    if ($request->hasFile('profile_image')) {
        //ghi dữ liệu ở database ấy vào cột 'profile_image'
        $imageContent = file_get_contents($request->file('profile_image')->path());
        $user->profile_image = $imageContent; // Sửa lại tên cột thành 'profile_image'
    }

    // Lưu 
    $user->save();

    return redirect("list")->withSuccess('You have signed-in');
}

    


    /**
     * List of users
     */
    public function listUser()
    {
        if (Auth::check()) {
            //Số lượng người dùng trên mỗi trang
            $perpage = 3;
            //Lấy danh sách người dùng được phân trang
            $users = User::paginate($perpage);
            return view('crud_user.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out
     */
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
