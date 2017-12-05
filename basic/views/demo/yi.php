<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}

.top{ width: 100%; text-align: center;}
.top h2{ margin-top: 50px;}

form{ width: 450px; margin: 0 auto; margin-top: 50px;}
form input{
    width: 300px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding-left: 5px;
    font-size: 14px;
}

form p{
    margin-top: 20px;
    width: 100%;
}

form span{
    width: 100px;
    text-align: right;
    display: inline-block;
}

.a_button{
    width: 150px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: green;
    color: #fff;
    display: block;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}
</style>

<div class="top">
    <h2>欢迎注册</h2>
</div>

<div class="main">
    <form>
        <p>
            <span>手机号：</span>
            <input type="text" placeholder="请输入手机号" class="sjh">
        </p>
        <p>
            <span>密码：</span>
            <input type="password" placeholder="请输入密码" class="mm">
        </p>
        <p>
            <span>确认密码：</span>
            <input type="password" placeholder="请输入确认密码" class="qrmm">
        </p>
        <p>
            <a class="a_button" href="#">下一步</a>
            <!-- <input type="submit" class="a_button" value="下一步"> -->
        </p>
    </form>
</div>
<script src="http://localhost/week9/basic/views/site/jquery.1.12.js"></script>
<script>
$(".a_button").on("click",function(){
	var sjh = $(".sjh").val();
	var mm = $(".mm").val();

	var qrmm = $(".qrmm").val();
	if(mm == qrmm)
	{
			$.ajax({
			type:"post",
			url:"http://localhost/week9/basic/web/index.php?r=demo/gg",
			data:{sjh:sjh,mm:mm,qrmm:qrmm},
			success:function(r){
				if(r==1){
					location.href = "http://localhost/week9/basic/web/index.php?r=demo/er";

				}else{
					alert("填写有误");
				}
			}
		})
		}else{
			alert("两次输入密码不一样");
		}
	


})
</script>
