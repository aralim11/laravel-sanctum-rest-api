<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::where('user_id', Auth::user()->id)->get();

        if (!empty($data)) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'No Data Found']);
        }
    }


    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|unique:blogs,title',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validator->errors()]);
        } else {

            $data = Blog::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'details' => $request->details,
            ]);

            if ($data) {
                return response()->json(['status' => 'success', 'msg' => 'Blog Add Successfully!!']);
            } else {
                return response()->json(['status' => 'error', 'msg' => "Blog Add Failed!!"]);
            }
        }
    }


    public function show($id)
    {
        $data = Blog::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if ($data) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'error', 'msg' => "Blog Not Found!!"]);
        }
    }


    public function edit($id)
    {
        $data = Blog::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if ($data) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'error', 'msg' => "Blog Not Found!!"]);
        }
    }


    public function update(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|unique:blogs,title',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validator->errors()]);
        } else {

            $data = Blog::where('id', $id)
                        ->update(['category_id' => $request->category_id, 'title' => $request->title, 'details' => $request->details,]);

            if ($data) {
                return response()->json(['status' => 'success', 'msg' => 'Blog Update Successfully!!']);
            } else {
                return response()->json(['status' => 'error', 'msg' => "Blog Update Failed!!"]);
            }
        }
    }

    public function destroy($id)
    {
        $deleted = Blog::where('id', $id)->where('user_id', Auth::user()->id)->delete();

        if ($deleted) {
            return response()->json(['status' => 'success', 'msg' => 'Blog Delete Successfully!!']);
        } else {
            return response()->json(['status' => 'error', 'msg' => "Blog Not Found!!"]);
        }
    }
}
