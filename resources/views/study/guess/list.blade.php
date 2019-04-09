<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>足球竞猜列表</title>
	<style>
		.tab{width:300px;}
		.tb{text-align: center;}
		.tr{height:35px;line-height: 35px;}
		.td{text-align: center;}
	</style>
</head>
<body>
		<table class="tab" border="1"  cellspacing="0">
			<thead><tr><td class="td">球队</td><td class="td">操作</td></tr></thead>
			<tbody class="tb">
			@if(!empty($list))
				@foreach($list as $k=>$v )
			<tr class="tr"><td>{{$v['team_a']}} VS {{$v['team_b']}}</td>
				<td>
					@if(strtotime($v['end_at']) > time() )
						<a href="/guess/guess?id={{$v['id']}}&user_id=1">竞猜</a>
					@else
						<a href="/guess/result?id={{$v['id']}}&user_id=1">查看结果</a>
						@endif
				</td>
			</tr>
				@endforeach
				@endif
				</tbody>
		</table>
</body>
</html>