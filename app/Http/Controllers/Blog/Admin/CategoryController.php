<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;


class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$paginator = BlogCategory::paginate(15);

		return view('blog.admin.category.index',compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		dd(__METHOD__);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function edit($id)
    {
		//dd(__METHOD__);

		$item = BlogCategory::findOrFail($id);
		$categorylist = BlogCategory::all();
		return view('blog.admin.category.edit',compact('item','categorylist'));



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
		dd(__METHOD__, $request->all(), $id);


    }


}
