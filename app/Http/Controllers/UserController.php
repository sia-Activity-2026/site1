<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function getUsers()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    public function add(Request $request)
    {
        $rule = [
            'username' => 'required | string | unique:users,username|max:20',
            'password' => 'required | string | min:6 | max:20',
        ];

        $this->validate($request, $rule);

        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    // or like this 
    public function add_2ndVersion(Request $request)
    {
        $rule = [
            'username' => 'required | string | unique:users,username|max:20',
            'password' => 'required | string | min:6 | max:20',
        ];

        $this->validate($request, $rule);

        $user = User::create($request->all());

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }


    public function show($id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return response()->json($user, 200);
    }


    public function delete($id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            $user->delete();
            return response()->json([
                'message' => 'User deleted successfully'
            ], 200);
        }

        return response()->json([
            'message' => 'User not found'
        ], 404);
    }


    public function update($id, Request $request)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $rule = [
            'username' => 'string | unique:users,username,' . $id . '|max:20',
            'password' => 'string | min:6 | max:20',
        ];

        $this->validate($request, $rule);

        $user->update($request->all());
        return response()->json($user, 200);
    }
    











    //=================================================================================================================================================================================
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function oldshow(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function oldupdate(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }
}
