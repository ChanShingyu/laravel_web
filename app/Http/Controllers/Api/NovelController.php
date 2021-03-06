<?php 
 namespace App\Http\Controllers\Api;

 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use App\Model\Novel;
 use App\Model\Chapter;

 class NovelController extends Controller{
 	//小说书单接口
 	public function bookList(Request $request){
 		$novel = new Novel();
 		$list = $novel->getLists()->toArray();
 		$return =[
 			'code' =>2000,
 			'msg' =>'获取小说书单成功',
 			'data'=>[
 				'page' =>$list['current_page'],//当前页
 				'total_page' => $list['last_page'],//总页数
 				'list' =>$list['data']
 			]
 		];
 		return json_encode($return);
 	}
 	public function detail($id){
 		$novel =new Novel();
 		$chapter = new Chapter();
 		$detail = $novel->getApiNovelDetail($id);
 		$first = $chapter->getFirstChapter($id);//小说第一章节的id
 		if (empty($first)) {
 			$chapterId = 0;
 		}else{
 			$chapterId = $first->id;
 		}
 		$return = [
 			'code' =>2000,
 			'msg' =>'获取小说详情成功',
 			'data' =>[
 				'chapter_id'=>$chapterId,
 				'detail' =>$detail
 			]
 		];
 		return json_encode($return);
 	}
 	//小说点击次数接口
 	public function clicks($id){
 		$novel = new Novel();
 		$novel->updateClicks($id);
 		$return = [
 			'code' =>2000,
 			'msg' =>'更新次数点击成功'
 		];
 		return json_encode($return);
 	}

 }

 ?>