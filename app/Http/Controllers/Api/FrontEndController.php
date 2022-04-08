<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

class FrontEndController extends Controller
{
    public function index()
    {
        $data = Blog::with('categoryName')->get();

        if (!empty($data)) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'No Data Found']);
        }
    }

    public function show($id)
    {
        $data = Blog::with('categoryName')->where('id', $id)->first();

        if ($data) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'error', 'msg' => "Blog Not Found!!"]);
        }
    }
}
