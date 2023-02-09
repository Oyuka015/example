<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }  
    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->where('password', md5($credentials['password']))->first();

        if($user)
        {
            Auth::login($user);
            if(Auth::check()){
                $user = Auth::user();

                if($user->role_id == 1)
                {
                    Session::put('login_user', $user);
                    return redirect('/admin/dashboard');
                }
                else{
                    Session::put('login_user', $user);

                    return redirect('/');
                }
               
            }
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        else
        {
            return redirect("login")->withSuccess('Хэрэглэгчийн нэр, эсвэл нууц үг буруу байна.');
        }
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return redirect('/');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    public function doLogOut(){
		Session::flush();
        Auth::logout();
        return redirect('/');
    }
    
}