<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index()
    {
        if (!Auth::user() || Auth::user()->role_id != 1) {
            abort(404);
        }
        $query = User::query();
        $query->where('role_id', '2');
        $users = $query->get();
        return view('admin.users')->with('users', $users);
    }

    function export()
    {
        if (!Auth::user() || Auth::user()->role_id != 1) {
            abort(404);
        }
        header('Content-Type: application/ms-excel; charset=UTF-8');
        header('Content-Disposition: attachment; filename="UsersExport_' . date('Ymd') . '-' . date('hms') . '.csv"');
        $query = User::query();
        $query->where('role_id', '2');
        $users = $query->get();
        $content = "";
        $content = "id,name,email";
        foreach ($users as $user) {
            $line = "";
            $line = $line . "\n" . $user->id . ",";
            $line = $line . $user->name . ",";
            $line = $line . $user->email;
            $content = $content . $line;
        }
        echo $content;
    }
}
