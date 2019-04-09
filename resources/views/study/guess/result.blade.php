<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>足球竞猜结果页面</title>


	<style>
		.d{ margin:0px auto; }
		.tab{ width: 100%; border:#d4d4d4 1px solid}
		.t1{ width: 300px;text-align: center; font-weight: bold}
		.t2{ width: 300px;text-align: center; font-size: }
		.sp{color: red;}
		.s{font-size: 25px; color: #ff0000;}
	</style>
</head>
<body>


<form action="/guess/doGuess" method="post">
	{{csrf_field()}}
	
	
	<div class="d">
		<table  class="tab">
			<tr>
				<td class="t1">查看结果</td>
			</tr>
			<tr>
				<td class="t2"><span class='s'>对战结果:</span>
				<i>{{$info['team_a']}}
				@if($info['result'] == 1)<span class='sp'>胜</span>@elseif($info['result'] == 2) <span class='sp'>平</span> @else <span class='sp'>负</span> @endif
			 VS {{$info['team_b']}}</i>
				   </td>	
			</tr>
		@if(!empty($info))	
			
			<tr>
				<td class="t2"><span class='s'>您的竞猜: </span>
				<i>{{$info['team_a']}}
				@if($first->g_result == 1)<span class='sp'>胜</span>@elseif($first->g_result == 2) <span class='sp'>平</span> @else <span class='sp'>负 </span>@endif
			 VS {{$info['team_b']}}</i>
				   </td>	
			</tr>
			
			<tr  class="t2">
				<td>
					<span class='s'>结果：</span>@if($first->g_result == $info['result'])恭喜您猜中啦!!!
					 @else 很抱歉您没猜中 @endif
				</td>
			</tr>
			@else
				<tr  class="t2">
				<td>
					<span class='s'>结果：</span>您没有参与这次竞猜哦
					
				</td>
			</tr>
			@endif
		</table>
	</div>
	</form>
</body>
</html>