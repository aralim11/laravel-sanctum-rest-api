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
        $data = Blog::with(['categoryName', 'userName'])->get();

        if (!empty($data)) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'No Data Found']);
        }
    }

    public function show($id)
    {
        $data = Blog::where('id', $id)->with(['categoryName', 'userName'])->first();

        if (!empty($data)) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'No Data Found']);
        }
    }

    public function simillerCat($cat_id)
    {
        $data = Blog::where('category_id', $cat_id)->inRandomOrder()->limit(4)->get();

        if (!empty($data)) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'No Data Found']);
        }
    }
}
