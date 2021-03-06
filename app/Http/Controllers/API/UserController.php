<?php

namespace App\Http\Controllers\API;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Register
     */
    public function register(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->matricule = $request->matricule;
            $user->email = $request->email;
            $user->grade = $request->grade;
            $user->password = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = 'User register successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $success = true;
            $message = 'User login successfully';
        } else {
            $success = false;
            $message = 'Unauthorised';
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * Logout
     */
    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    public function index()
    {
        $users = User::select(

            "users.id", 

            "users.name",
            
            "users.matricule",

            "grades.libelle as grade",

            "grades.etat_major as etat_major",

            "users.email", 

        )

        ->join("grades", "grades.code", "=", "users.grade")


        ->get();

        return $users;
    }

    public function show(User $user)
    {   

        $users = User::select(

            "users.id", 

            "users.name",
            
            "users.matricule",

            "grades.libelle as grade",

            "grades.etat_major as etat_major",

            "users.email", 

        )

        ->join("grades", "grades.code", "=", "users.grade")

        ->where("users.id", "=", $user->id)

        ->get();


        return $users;
    }

}