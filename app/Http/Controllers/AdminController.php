<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data_user = User::all();

        return view('admin.index', compact('data_user'));
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        $email = $user->email;
        return redirect('/admin')->with('pesan', "User ${email} berhasil dihapus");
    }

    public function update($id) {
        $user = User::find($id);
        $name = $user->name;
        $email = $user->email;
        $level = $user->level;
        return view('admin.update', compact('id', 'name', 'email', 'level'));
    }

    public function storeUpdate(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->save();
        return redirect('/admin')->with('pesan', "User " . $user->name . " berhasil diupdate");
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/admin')->with('pesan', 'User berhasil ' . $user->email . ' dibuat');
    }

    public function create()
    {
        return view('admin.create');
    }
}
