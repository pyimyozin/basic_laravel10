<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller {
    public function index() {
        $users = User::paginate(5);
        return view('user/index',compact('users'));
    }

    public function registration() {
        return view('user/register');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);

        if($user) {
            return redirect()->route('user#registration')->with('success', 'User created failed.');
        }
        return redirect()->route('users#index')->with('success', 'User created successfully');
    }

    public function showLoginForm()
    {
        return view('user/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
            return redirect('/posts')->with("success","Login successed.");
        } else {
            return redirect('/login')->with("login failed","Creditionals do not match our record.");

        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}