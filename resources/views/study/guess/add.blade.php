<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>足球竞猜添加页面</title>


	<style>
		.d{ margin:0px auto; }
		.tab{ width: 100%; border:#d4d4d4 1px solid}
		.t1{ width: 300px;text-align: center; font-weight: bold}
		.t2{ width: 300px;text-align: center}
	</style>
</head>
<body>


<form action="/guess/doAdd" method="post">
	{{csrf_field()}}
	<div class="d">
		<table  class="tab">
			<tr>
				<td class="t1">添加竞猜球队</td>
			</tr>
			<tr>
				<td class="t2"><input type="text" name="team_a"><i><b>VS</b></i>
				<input type="text" name="team_b"></td>
			</tr>
			<tr>
				<td class="t2">竞猜结束时间<input type="text" name="end_at"></td>
				
			</tr>
			<tr>
				<td class="t2"><input type="submit" value="添加"></td>
				
			</tr>
		</table>
	</div>
	</form>
</body>
</html>