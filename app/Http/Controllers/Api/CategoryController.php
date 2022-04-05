<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::where('user_id', Auth::user()->id)->get();

        if (!empty($data)) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'No Data Found']);
        }
    }

    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'cat_name' => 'required|unique:categories,cat_name',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validator->errors()]);
        } else {

            $data = Category::create([
                'user_id' => Auth::user()->id,
                'cat_name' => $request->cat_name,
            ]);

            if ($data) {
                return response()->json(['status' => 'success', 'msg' => 'Category Add Successfully!!']);
            } else {
                return response()->json(['status' => 'error', 'msg' => "Category Add Failed!!"]);
            }
        }
    }

    
    public function show($id)
    {
        $data = Category::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if ($data) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'error', 'msg' => "Category Not Found!!"]);
        }
    }

    public function edit($id)
    {
        $data = Category::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if ($data) {
            return response()->json(['status' => 'success', 'msg' => $data]);
        } else {
            return response()->json(['status' => 'error', 'msg' => "Category Not Found!!"]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'cat_name' => 'required|unique:categories,cat_name,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validator->errors()]);
        } else {

            $data = Category::where('id', $id)
                        ->where('user_id', Auth::user()->id)
                        ->update(['cat_name' => $request->cat_name]);

            if ($data) {
                return response()->json(['status' => 'success', 'msg' => 'Category Update Successfully!!']);
            } else {
                return response()->json(['status' => 'error', 'msg' => "Category Update Failed!!"]);
            }
        }
    }

    public function destroy($id)
    {
        $deleted = Category::where('id', $id)->where('user_id', Auth::user()->id)->delete();

        if ($deleted) {
            return response()->json(['status' => 'success', 'msg' => 'Category Delete Successfully!!']);
        } else {
            return response()->json(['status' => 'error', 'msg' => "Category Not Found!!"]);
        }
    }
}
