<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        // if (! Gate::allows('dashboard_access')) {
        //     return abort(401);
        // }
        $users = User::all();

        return view('admin.dashboard.index');
}
}
