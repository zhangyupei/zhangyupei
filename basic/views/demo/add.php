<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}
ul{ list-style: none}

.top{ width: 100%; background: rgba(14, 196, 210, 0.99); color: #fff; height: 100px; line-height: 150px; text-align: right;}
.top span{ margin-right: 20px}


.left{ width: 260px; float: left; height: 100%; background: rgba(121, 217, 221, 0.4)}
.left ul{ list-style: none; width: 100%;}
.left ul li{ height: 40px; width: 100%; border: 1px solid #ddd; line-height: 40px; text-align: center;}
.left .selected{ background: rgba(14, 196, 210, 0.99);}
.left .selected a{ color: #fff;}


.right{ float: left; width: 1000px;}
.search-box{ width: 900px; margin: 0 auto; margin-top: 100px; }
.right li{
    margin-top: 20px;
}
.right span{
    display: inline-block;
    width: 200px;
    line-height: 40px;
    height: 40px;
    text-align: right;
    margin-right: 20px;
}

.right .filed-name{
    width: 300px;
    line-height: 40px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
}

.right .length{
    width: 140px;
    line-height: 40px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
}

.submit{
    width: 150px;
    height: 40px;
    line-height: 40px;
    border-radius: 3px;
    border: 1px solid #ddd;
    display: inline-block;
    background: rgba(14, 196, 210, 0.99);
    color: #fff;
    text-align: center;
    margin-left: 200px;
    margin-top: 20px;
}
</style>

<div class="top">
    <span>欢迎管理员：admin</span>
</div>

<div class="left">
    <ul>
        <li><a href="http://localhost/week9/basic/web/index.php?r=demo/show">查看注册字段</a></li>
        <li class="selected"><a href="#">添加注册字段</a></li>
    </ul>
</div>

<div class="right">
    <div class="search-box">
        
            <ul>
 <!--            	zdm'])
zdlx']
zdmrz'
sfbx']
yzgz']
zfcxz'
       -->          <li>
                    <span>请输入字段名称：</span>
                    <input class="filed-name" type="text" id="zdm">
                </li>
                <li>
                    <span>请输入字段默认值：</span>
                    <input class="filed-name" type="text" id="zdmrz">
                </li>
                <li>
                    <span>请选择字段类型：</span>
                    <select name="" id="zdlx">
                        <option value="文本框">文本框</option>
                        <option value="单选框">单选框</option>
                        <option value="密码框">密码框</option>
                        <option value="文本域">文本域</option>
                    </select>
                </li>
                <!-- <li>
                    <span>请填写字段选项：</span>
                    <input type="text" class="filed-name" placeholder="选项1">
                    <input type="text" class="filed-name" placeholder="选项2">
                </li> -->
                <li>
                    <span>是否必填：</span>
                    
                    <select name="" id="sfbx">
                        <option value="必填">必填</option>
                        <option value="不必填">不必填</option>
                        
                    </select>
                </li>
                <li>
                    <span>请选择验证规则：</span>
                    <select name="" id="yzgz">
                        <option value="无">无</option>
                        <option value="手机号码">手机号码</option>
                        <option value="长度">长度</option>
                    </select>
                </li>
                <li>
                    <span>请选择填写长度范围：</span>
                    <input class="length" type="text" value="" placeholder="请输入最小长度" id="cd">
                    ~
                    <input class="length" type="text" value="" placeholder="请输入最大长度" id="cdcd">
                </li>
                <li>
                    <a href="javascript:void(0);" class="submit">提交</a>
                    <!-- <input type="button" value="提交" class="dian"> -->
                </li>
            </ul>
        
    </div>
</div>

<script src="http://localhost/week9/basic/views/site/jquery.1.12.js"></script>
<script>
$(".submit").on("click",function(){

	var zdm = $('#zdm').val();
	var zdmrz = $('#zdmrz').val();
	var zdlx = $('#zdlx').val();
	var sfbx = $("#sfbx").val();
	var yzgz = $("#yzgz").val();
	var length = $('#cd').val()+$('#cdcd').val();

  $.ajax({
  	 type:"post",
  	 url:"http://localhost/week9/basic/web/index.php?r=demo/tian",
  	 data:{zdm:zdm,zdmrz:zdmrz,zdlx:zdlx,sfbx:sfbx,yzgz:yzgz,length:length},
  	 success:function(r){
  	 	if(r==1){
  	 		alert("注册成功");
  	 		 location.href="http://localhost/week9/basic/web/index.php?r=demo/show";
  	 	}else{
  	 		alert("注册失败");
  	 	}
  	 }
  })
})


</script>