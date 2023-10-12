<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Exception;
use PDOException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = Category::get();
            return response()->json(['status' => true, 'message' => 'success','data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $validated = $request->validated();
            $data = Category::create($validated);
            return response()->json(['status'=>true, 'message'=>'data berhasil di tambahkan', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'data gagal di tambahkan', 'error_type'=> $e]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
            
            return response()->json(['status'=>true, 'message'=>'data berhasil ditampilkan','data'=>$category]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'gagal menampikan data', 'error_type'=> $e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $validated = $request->validated();
            $category->update($validated);
            return response()->json(['status'=>true, 'message'=>'data berhasil di update']);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'data gagal di update', 'error_type'=> $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $data = $category->delete();
            return response()->json(['status'=>true, 'message'=>'data berhasil di hapus', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'data gagal di hapus', 'error_type'=> $e]);
        }
    }
}
