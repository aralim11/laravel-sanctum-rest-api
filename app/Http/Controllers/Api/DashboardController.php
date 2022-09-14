<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function dash($id)
    {
        $total = Blog::where('user_id', $id)->count();
        $active = Blog::where('user_id', $id)->where('status', 'Active')->count();
        $deactive = Blog::where('user_id', $id)->where('status', 'Deactive')->count();
        $pending = Blog::where('user_id', $id)->where('status', 'Pending')->count();

        return response()->json(['status' => 'success', 'msg' => ['total' => $total, 'active' => $active, 'deactive' => $deactive,'pending' => $pending]]);
    }
}
