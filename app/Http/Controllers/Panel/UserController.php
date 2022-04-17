<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('all'))
        {
            return response()->json([
                'state' => true,
                'message' => 'success!',
                'data' => User::all(['id', 'firstName', 'lastName', 'username']),
            ]);
        }
        return response()->json([
            'state' => true,
            'message' => 'success!',
            'data' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->first_name = $request->input('firstName');
        $user->last_name = $request->input('lastName');
        $user->home_phone = $request->input('home_phone');
        if($user->save())
            return response()->json([
                'state' => true,
                'message' => 'Success',
                'data' => null,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
            'state' => true,
            'message' => 'Success',
            'data' => User::findOrFail($id)->delete(),
        ]);
    }
}
