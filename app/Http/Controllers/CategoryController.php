<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return  response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view ('admin.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = Category::create($request->all());
        if ($categories)
        {
            return response()->json([
                'success'    => true,
                'categories' => $categories
            ]);
        }
        else
            {
                return response()->json
                ([
                    'success' => false,
                    'message' => 'Data is failed to save'
                ]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return response()->json($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Category::find($id)->update($request->all());
        if ($categories)
        {
            return  response()->json([
                'success'    => true,
                'categories' => $categories
            ]);
        }
        else
        {
            return response()->json
            ([
                'success' => false,
                'message' => 'Data is failed to Update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id)->delete();
        if ($categories)
        {
            return  response()->json([
                'success'    => true,
                'message' => 'Data Deleted Successfully'
            ]);
        }
        else
        {
            return response()->json
            ([
                'success' => false,
                'message' => 'Data is Not Deleted'
            ]);
        }
    }
}
