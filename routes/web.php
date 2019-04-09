<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	//echo "hello Laravel";exit;
    return view('welcome');
});

//学习类的路由组
Route::prefix('study')->group(function(){

    //红包首页路由
    Route::get('bonus/index','Study\BonusController@index');
    //红包添加路由
    Route::post('bonus/add','Study\BonusController@addBonus');
    //红包列表
    Route::get('bonus/list','Study\BonusController@getList');

    Route::get('bonus/record/list','Study\BonusController@getBonusRecord');
   
    Route::any('get/bonus', 'Study\BonusController@getBonus'); //获取红包的路由
     //***************************赌球路由**********************//
    //赌球添加路由
    Route::any('guess/add', 'Study\GuessController@add');
    //赌球执行添加页面
    Route::any('guess/doAdd','Study\GuessController@doAdd');
    //赌球列表页面
    Route::any('guess/list','Study\GuessController@list');
    //
    Route::any('guess/resule','Study\GuessController@checkResult');
    //赌球添加页面doGuess
    Route::any('guess/guess','Study\GuessController@guess');
    //赌球添加页面
    Route::any('guess/doGuess','Study\GuessController@doGuess');
    //************************************************************//
});



//登陆页面
Route::get('admin/login','Admin\LoginController@index');
//执行登陆
Route::post('admin/doLogin','Admin\LoginController@doLogin');
//用户退出
Route::get('admin/logout','Admin\LoginController@logout');

Route::get('403',function(){
    return view('403');
});

//管理后台RBAC功能类的路由组
Route::middleware(['admin_auth','permission_auth'])->prefix('admin')->group(function(){

    //管理后台首页
    Route::get('home','Admin\HomeController@home')->name('admin.home');

   /*#############################[权限相关]#############################*/
    //权限列表
    Route::get('/permission/list','Admin\PermissionController@list')->name('admin.permission.list');
    //获取权限的数据
    Route::any('/get/permission/list/{fid?}','Admin\PermissionController@getPermissionList')->name('admin.get.permission.list');
    //权限添加
    Route::get('/permission/create','Admin\PermissionController@create')->name('admin.permission.create');
    //执行权限添加
    Route::post('/permission/doCreate','Admin\PermissionController@doCreate')->name('admin.permission.doCreate');
    //删除权限的操作
    Route::get('/permission/del/{id}','Admin\PermissionController@del')->name('admin.permission.del');

    /*#############################[权限相关]#############################*/



    /*#############################[用户相关]#############################*/
    //用户添加页面
    Route::get('/user/add','Admin\AdminUsersController@create')->name('admin.user.add');
    //执行用户添加
    Route::post('/user/store','Admin\AdminUsersController@store')->name('admin.user.store');

    //用户列表页面
    Route::get('/user/list','Admin\AdminUsersController@list')->name('admin.user.list');

    //用户删除操作
    Route::get('/user/del/{id}','Admin\AdminUsersController@delUser')->name('admin.user.del');

    //用户编辑页面
    Route::get('/user/edit/{id}','Admin\AdminUsersController@edit')->name('admin.user.edit');
    //用户执行编辑页面
    Route::post('/user/doEdit','Admin\AdminUsersController@doEdit')->name('admin.user.doEdit');

     /*#############################[用户相关]#############################*/


     /*#############################[角色相关]#############################*/

     //角色列表
     Route::get('/role/list','Admin\RoleController@list')->name('admin.role.list');
     //角色删除
     Route::get('/role/del/{id}','Admin\RoleController@delRole')->name('admin.role.del');

     //角色添加
     Route::get('/role/create','Admin\RoleController@create')->name('admin.role.create');
     //角色执行添加
     Route::post('/role/store','Admin\RoleController@store')->name('admin.role.store');

     //角色编辑
     Route::get('/role/edit/{id}','Admin\RoleController@edit')->name('admin.role.edit');
     //角色执行编辑
     Route::post('/role/doEdit','Admin\RoleController@doEdit')->name('admin.role.doEdit');

     //角色权限编辑
     Route::get('/role/permission/{id}','Admin\RoleController@rolePermission')->name('admin.role.permission');
     //角色权限执行编辑
     Route::post('/role/permission/save','Admin\RoleController@saveRolePermission')->name('admin.role.permission.save');

     /*#############################[角色相关]#############################*/


     /*#############################[小说相关]#############################*/

     //作者列表
     Route::get('author/list','Admin\AuthorController@list')->name('admin.author.list');
     //作者添加
     Route::get('author/create','Admin\AuthorController@create')->name('admin.author.create');
     //作者执行添加
     Route::post('author/store','Admin\AuthorController@store')->name('admin.author.store');
     //作者执行删除
     Route::get('author/del/{id}','Admin\AuthorController@del')->name('admin.author.del');


     //分类列表
     


      //小说添加
     Route::get('novel/create','Admin\NovelController@create')->name('admin.novel.create');
     //执行小说添加
     Route::post('novel/store','Admin\NovelController@store')->name('admin.novel.store');
     //小说列表
     Route::get('novel/list','Admin\NovelController@list')->name('admin.novel.list');
     //小说编辑
     Route::get('nove/edit/{id}','Admin\NovelController@edit')->name('admin.novel.edit');
     //执行小说编辑
     Route::post('nove/doEdit','Admin\NovelController@doEdit')->name('admin.novel.doEdit');
     //小说的删除
     Route::get('novel/del/{id}','Admin\NovelController@del')->name('admin.novel.del');

     //小说章节添加
     Route::get('chapter/add/{novel_id}','Admin\ChapterController@create')->name('admin.chapter.create');
     //保存小说章节
     Route::post('chapter/store','Admin\ChapterController@store')->name('admin.chapter.store');
     //小说章节列表
     Route::get('chapter/list/{novel_id?}','Admin\ChapterController@list')->name('admin.chapter.list');
     //小说章节删除
     Route::get('chapter/del/{$id}','Admin\ChapterController@del')->name('admin.chapter.del');
     //章节编辑
     Route::get('chapter/edit/{id}','Admin\ChapterController@edit')->name('admin.chapter.edit');
     //执行章节编辑
     Route::post('chapter/doEdit','Admin\ChapterController@doEdit')->name('admin.chapter.doEdit');


      //小说评论列表页面
     Route::get('novel/comment/list','Admin\CommentController@list')->name('admin.novel.comment.list');
     //小说数据
     Route::get('novel/comment/data','Admin\CommentController@getComment')->name('admin.novel.comment.data');
     //小说评论审核
     Route::get('novel/comment/check/{id}','Admin\CommentController@check')->name('admin.novel.comment.check');
     //小说评论删除
     Route::get('novel/comment/del/{id}','Admin\CommentController@del')->name('admin.novel.comment.del');

     
     /*#############################[小说相关]#############################*/

     /*#############################[商品品牌相关]#############################*/
     Route::get('brand/list','Admin\BrandController@list')->name('admin.brand.list');//品牌列表页面
     Route::any('brand/data/list','Admin\BrandController@getListData')->name('admin.brand.data.list');
     //品牌列表数据
     Route::any('brand/add','Admin\BrandController@add')->name('admin.brand.add');//品牌添加页面
     Route::any('brand/doAdd','Admin\BrandController@doAdd')->name('admin.brand.doAdd');//执行商品品牌添加
     Route::any('brand/edit/{id}','Admin\BrandController@edit')->name('admin.brand.edit');//品牌修改页面
     Route::any('brand/doEdit','Admin\BrandController@doEdit')->name('admin.brand.doEdit');//执行商品品牌修改
     Route::any('brand/del/{id}','Admin\BrandController@del')->name('admin.brand.del');//执行删除操作
     Route::any('brand/change/attr','Admin\BrandController@changeAttr')->name('admin.brand.change.attr');//修改品牌的属性值
     /*#############################[商品品牌相关]#############################*/

     /*#############################[商品分类相关]#############################*/
     Route::any('category/list','Admin\CategoryController@lists')->name('admin.category.list');//商品分类列表页面
     Route::any('category/get/data/{fid?}','Admin\CategoryController@getListData')->name('admin.category.get.data');//获取商品接口分类的数据
     Route::any('category/add','Admin\CategoryController@add')->name('admin.category.add');//商品添加页面
     Route::any('category/doAdd','Admin\CategoryController@doAdd')->name('admin.category.doAdd');//商品执行添加
     Route::any('category/edit/{id}','Admin\CategoryController@edit')->name('admin.category.edit');//商品编辑页面
     Route::any('category/doEdit','Admin\CategoryController@doEdit')->name('admin.category.doEdit');//商品执行编辑
     Route::any('category/del/{id}','Admin\CategoryController@del')->name('admin.category.del');//商品删除操作
      /*#############################[商品分类相关]#############################*/

      /*#############################[文章分类相关]#############################*/
      //文章分类列表
     Route::get('article/category/list','Admin\ArticleCategoryController@list')->name('admin.article.category.list');
     //文章分类添加
     Route::get('article/category/add','Admin\ArticleCategoryController@add')->name('admin.article.category.add');
     //文章分类执行添加
     Route::post('article/category/store','Admin\ArticleCategoryController@store')->name('admin.article.category.store');
     //文章分类编辑
     Route::get('article/category/edit/{id}','Admin\ArticleCategoryController@edit')->name('admin.article.category.edit');
     //文章分类执行编辑
     Route::post('article/category/save','Admin\ArticleCategoryController@doEdit')->name('admin.article.category.save');
     //文章分类删除出
     Route::get('article/category/del/{id}','Admin\ArticleCategoryController@del')->name('admin.article.category.del');
      /*#############################[文章分类相关]#############################*/

      /*#############################[文章相关]#############################*/
     //文章列表
     Route::get('article/list','Admin\ArticleController@list')->name('admin.article.list');
     //文章添加
     Route::get('article/add','Admin\ArticleController@add')->name('admin.article.add');
     //文章执行添加
     Route::post('article/store','Admin\ArticleController@store')->name('admin.article.store');
     //文章分类编辑
     Route::get('article/edit/{id}','Admin\ArticleController@edit')->name('admin.article.edit');
     //文章执行分类编辑
     Route::post('article/save','Admin\ArticleController@doEdit')->name('admin.article.save');
     //文章分类删除
     Route::get('article/del/{id}','Admin\ArticleController@del')->name('admin.article.del');
      /*#############################[文章相关]#############################*/

      /*#############################[广告位相关]#############################*/
     //广告位列表
     Route::get('position/list','Admin\AdpositionController@list')->name('admin.position.list');
     //广告位添加页面
     Route::get('position/add','Admin\AdpositionController@add')->name('admin.position.add');
     //广告位执行添加
     Route::post('position/store','Admin\AdpositionController@store')->name('admin.position.store');
     //广告位编辑
     Route::get('position/edit/{id}','Admin\AdpositionController@edit')->name('admin.position.edit');
     //广告位执行编辑
     Route::post('position/save','Admin\AdpositionController@doEdit')->name('admin.position.save');
     //广告位删除
     Route::get('position/del/{id}','Admin\AdpositionController@del')->name('admin.position.del');
      /*#############################[广告位相关]#############################*/

      /*#############################[广告相关]#############################*/
     //广告列表
     Route::get('ad/list','Admin\AdController@list')->name('admin.ad.list');
     //广告添加
     Route::get('ad/add','Admin\AdController@add')->name('admin.ad.add');
     //广告执行添加
     Route::post('ad/store','Admin\AdController@store')->name('admin.ad.store');
     //广告编辑
     Route::get('ad/edit/{id}','Admin\AdController@edit')->name('admin.ad.edit');
     //广告执行编辑
     Route::post('ad/save','Admin\AdController@doEdit')->name('admin.ad.save');
     //广告删除
     Route::get('ad/del/{id}','Admin\AdController@del')->name('admin.ad.del');

      /*#############################[广告相关]#############################*/

      /*#############################[商品类型]#############################*/
      //商品类型列表
      Route::get('goods/type/list','Admin\GoodsTypeController@list')->name('admin.goods.type.list');
      //商品类型添加页面
      Route::get('goods/type/add','Admin\GoodsTypeController@add')->name('admin.goods.type.add');
      //商品添加执行
      Route::post('goods/type/store','Admin\GoodsTypeController@store')->name('admin.goods.type.store');
      //商品类型编辑
      Route::get('goods/type/edit/{id}','Admin\GoodsTypeController@edit')->name('admin.goods.type.edit');
      //商品类型执行编辑
      Route::post('goods/type/save','Admin\GoodsTypeController@doEdit')->name('admin.goods.type.save');
      //商品类型执行删除
      Route::get('goods/type/del/{id}','Admin\GoodsTypeController@del')->name('admin.goods.type.del');
      /*#############################[商品类型]#############################*/

       /*#############################[商品属性]#############################*/
       //商品属性列表
      Route::get('goods/attr/list/{type_id}','Admin\GoodsAttrController@list')->name('admin.goods.attr.list');
      //商品属性添加页面
      Route::get('goods/attr/add','Admin\GoodsAttrController@add')->name('admin.goods.attr.add');
      //商品属性执行添加
      Route::post('goods/attr/store','Admin\GoodsAttrController@store')->name('admin.goods.attr.store');
      //商品属性修改
      Route::get('goods/attr/edit/{id}','Admin\GoodsAttrController@edit')->name('admin.goods.attr.edit');
      //商品属性执行修改
      Route::post('goods/attr/save','Admin\GoodsAttrController@doEdit')->name('admin.goods.attr.save');
      //商品属性删除
      Route::get('goods/attr/del/{id}','Admin\GoodsAttrController@del')->name('admin.goods.attr.del');
       /*#############################[商品属性]#############################*/
});