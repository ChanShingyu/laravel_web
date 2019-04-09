<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('index',function(){
	return 'Api请求接口成功';
});
//*************[首页]*************//
//首页banner接口图
Route::any('home/banners','Api\HomeController@banners');
//首页最新小说的接口
Route::any('home/news','Api\HomeController@newsList');
//首页点击排行
Route::any('home/clicks','Api\HomeController@clicksList');
//分类列表接口
 Route::any('category/list','Api\CategoryController@getCategory');
//分类小说列表接口
 Route::any('category/list','Api\CategoryController@getCategoryNovel');
//小说搜索接口
 Route::any('search/novel','Api\SearchController@getSearchList');
//小说书单接口
 Route::any('book/list','Api\NovelController@bookList');
 //小说阅读榜单接口
 Route::any('read/rank','Api\NovelController@bookRank');
 //小说详情接口
 Route::any('novel/detail/{id}','Api\NovelController@detail');
 Route::any('novel/clicks/{id}','Api\NovelController@clicks');
 Route::any('novel/resd/{id}','Api\NovelController@readNum');
 //小说章节列表接口
 Route::any('chapter/list/{novel_id}','Api\ChapterController@chapterList');
 Route::any('chapter/info/{id}','Api\ChapterController@chapterInfo');