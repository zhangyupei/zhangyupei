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

.handler-button{
    text-align: center;
}

.a_button{
    width: 150px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: green;
    color: #fff;
    display: inline-block;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}
</style>

<div class="top">
    <h2>欢迎注册</h2>
</div>

<div class="main">
    <form action="">
        <p>
            <span>昵称：</span>
            <input type="text" placeholder="请输入昵称" class="nc">
        </p>
        <p>
            <span>生日：</span>
            <input type="password" placeholder="请输入您的出生年月日，格式 xxxx-xx-xx" class="sr">
        </p>
        <p>
            <span>工作地址：</span>
            <input type="password" placeholder="请输入您现在的工作地址" class="gzdz">
        </p>
        <p class="handler-button">
            <a class="a_button" href="http://localhost/week9/basic/web/index.php?r=demo/yi">上一步</a>
            <a class="a_button" href="#" id="xia">下一步</a>
        </p>
    </form>
</div>
<script src="http://localhost/week9/basic/views/site/jquery.1.12.js"></script>
<script>
$("#xia").on("click",function(){
    var nc = $('.nc').val();
    var sr = $('.sr').val();
    var gzdz = $('.gzdz').val();
    $.ajax({
        type:"post",
        url:"http://localhost/week9/basic/web/index.php?r=demo/gg",
        data:{nc:nc,sr:sr,gzdz:gzdz},
        success:function(r){
            if(r==1){
                    location.href = "http://localhost/week9/basic/web/index.php?r=demo/san";

                }else{
                    alert("填写有误");
                }
        }
    })
})
</script>