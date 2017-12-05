
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>


	</style>
</head>
<body>
	
	<center>
		<?php
		$session = Yii::$app->session;
        $session->open();
        $a = $session->get('id');
      

               ?>
		<form action="?r=site/add_to" method="post">
		<table>
			<tr>

				<td>用户名：</td>
				<td><input type="text" name="user"></td>
				
			</tr>

			<tr>

				<td>密码：</td>
				<td><input type="password" name="pwd"></td>
				
			</tr>

			<tr>

				<td></td>
				<td><input type="submit" value="登录"></td>
				
			</tr>
			
		</table>
	</form>
	</center>
</body>

</html>