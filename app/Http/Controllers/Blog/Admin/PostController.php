<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;
use App\Repositories\BlogPostRepository;

/**
 * Управление постами блога
 * @package App\Http\Controllers\Blog\Admin
 *
 */

class PostController extends BaseController
{

	/**
	 *
	 * @var BlogPostRepository
	 */
	private $blogPostRepository;

	/**
	 * @var BlogCategoryRepository;
	 */
	private $blogCategoryRepository;

	/**
	 * PostController constructor.
	 */
	public function __construct() {

	parent::__construct();

	$this->blogPostRepository = app(BlogPostRepository::class);
	$this->blogCategoryRepository = app(BlogCategoryRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$paginator = $this->blogPostRepository->getAllWithPaginate();

        return view('blog.admin.posts.index',compact('paginator'));
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
    public function show($id)
    {
		dd(__METHOD__);

	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$item = $this->blogPostRepository->getEdit($id);
		if(empty($item)){
			abort(404);
		}
		$categoryList = $this->blogCategoryRepository->getForComboBox();

		return view('blog.admin.posts.edit', compact('item','categoryList'));
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
		dd(__METHOD__);

	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		dd(__METHOD__);

	}
}
