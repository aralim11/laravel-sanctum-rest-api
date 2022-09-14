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
        $data = Blog::select('id', 'title', 'image', 'created_at')->get();

        if (!empty($data)) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'No Data Found']);
        }
    }

    public function show($id)
    {
        $data = Blog::select('id', 'title', 'image', 'created_at', 'category_id', 'user_id', 'details')->where('id', $id)->with(['categoryName', 'userName'])->first();

        if (!empty($data)) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'No Data Found']);
        }
    }

    public function simillerCat($cat_id)
    {
        $data = Blog::select('id', 'title', 'image', 'created_at')->where('category_id', $cat_id)->inRandomOrder()->limit(4)->get();

        if (!empty($data)) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'No Data Found']);
        }
    }
}
