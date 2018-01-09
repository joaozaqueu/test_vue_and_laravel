<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        return response()->json(User::all(), 200);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $user = new User([
            'name' => $request->request->get('name'),
            'email' => $request->request->get('email'),
            'password' => bcrypt($request->request->get('password'))
        ]);
        $user->save();

        return response()->json('Sucess');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        return response()->json('Success');
    }
}
