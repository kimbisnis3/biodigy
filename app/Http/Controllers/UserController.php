<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
      return view('mainview');
    }

    public function getUser()
    {
      $res = DB::select('select * from user');
      return response()->json($res);
    }

    public function createUser()
    {
      $name     = $request->input('name')
      $email    = $request->input('email')
      $username = $request->input('username')
      $password = $request->input('password')
      $profile  = $request->input('profile')
      $skill    = $request->input('skill');
      $insert   = DB::insert('insert into mproduk (name, email, username, password, profile, skill) values (?,?,?,?,?,?)', [$name, $email, $username, $password, $profile, $skill]);
      return response()->json($insert);
    }

    public function login(Request $request)
    {
      $username = $request->input('username');
      $password = $request->input('password');
      $result = DB::select("SELECT * FROM user WHERE username = '$username' AND password = '$password'", [1]);
      if ($result) {
        $token = md5($username.$password);
        return response()->json([
          'header' => ['status' => 200],
          'body' => ['token' => $token, 'profile' => $result[0]->profile],
        ]);
      } else if (!$username || !$password) {
        return response()->json([
          'header' => ['status' => 401],
          'body' => ['message' => 'missing parameter'],
        ]);
      } else {
        return response()->json([
          'header' => ['status' => 401],
          'body' => ['message' => 'invalid login'],
        ]);
      }
    }

    public function logout(Request $request)
    {

    }

}
