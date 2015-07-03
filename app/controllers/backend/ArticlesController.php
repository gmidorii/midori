<?php

class ArticlesController extends \BaseController {

	/**
	 * Display a listing of articles
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::orderBy('id', 'DESC')->paginate(10);

		return View::make('backend.articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new article
	 *
	 * @return Response
	 */
	public function create()
	{
        $categories = Category::all()->lists('category', 'id');
		return View::make('backend.articles.create', compact('categories'));
	}

	/**
	 * Store a newly created article in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Article::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
        $data['is_published'] = isset($data['is_published']) ? true : false;
		Article::create($data);
        Notification::success('記事は無事作成されました！');

		return Redirect::action('ArticlesController@index');
	}

	/**
	 * Display the specified article.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::findOrFail($id);

		return View::make('backend.articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified article.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        try{
            $article = Article::findOrFail($id);
            $categories = Category::all()->lists('category', 'id');
            return View::make('backend.articles.edit', compact('article', 'categories'));
        }
        catch(ModelNotFoundException $e){
            Notification::error('Not Found!!');
            return Redirect::action('ArticlesController@index');
        }
	}

	/**
	 * Update the specified article in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try{
            $article = Article::findOrFail($id);
        }
        catch(ModelNotFoundException $e){
            Notification::error('Not Found!!!');
            return Redirect::action('ArticlesController@index');
        }
		$validator = Validator::make($data = Input::all(), Article::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
        $data['is_published'] = isset($data['is_published']) ? true : false;
		$article->update($data);
        Notification::success('記事は無事更新されました！');
		return Redirect::route('backend.articles.index');
	}

	/**
	 * Remove the specified article from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Article::destroy($id);
        Notification::success('記事は削除されました');
		return Redirect::action('ArticlesController@index');
	}

}
