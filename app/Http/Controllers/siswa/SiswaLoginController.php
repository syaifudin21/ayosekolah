<?php

namespace App\Http\Controllers\siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiswaLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:siswa')->except(['logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('siswa.siswa_login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'password' => 'required|min:6'
        ]);
        // dd($request);

        $credential = [
            'nisn' => $request->nisn,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('siswa')->attempt($credential, false)){
            // If login succesful, then redirect to their intended location
            return redirect()->intended(route('siswa'));
        }

        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('nisn', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();
        return redirect('/siswa');
    }
}
