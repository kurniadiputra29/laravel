<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(UserStoreRequest $request)
    {
        User::create($request->all());
        return redirect('/users');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update($request->all());
        return redirect('/users');
    }


    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect('/users');
    }
}
