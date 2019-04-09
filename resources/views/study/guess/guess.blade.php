<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>足球竞猜添加页面</title>
</head>
<body style="margin:0px auto;">
	<form action="/study/guess/doGuess" method="post">
		{{csrf_field()}}
		<input type="hidden" value="{{$user_id}}" name="user_id">
		<input type="hidden" value="{{$info['id']}}" name="team_id">
		<table style="whidth:100%px;border:#d4d4d4 1px solid;">
			<tr><td style="width:300px;text-align:center;font-weight:bold;">我要竞猜</td></tr>
			<tr><td style="width:300px;text-align:center;">{{$info['team_a']}} VS {{$info['team_b']}}</td></tr>
		<tr><td style="width:300px;text-align:center;">
			<input type="radio" name="g_result" value="1">胜
			<input type="radio" name="g_result" value="2">平
			<input type="radio" name="g_result" value="3">负
		</td></tr>
		<tr><td style="width:300px;text-align:center;"><input type="submit" value="竞猜"></td></tr>
		</table>
	</form>
</body>
</html>
