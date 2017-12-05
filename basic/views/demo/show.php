<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}

.top{ width: 100%; background: rgba(14, 196, 210, 0.99); color: #fff; height: 100px; line-height: 150px; text-align: right;}
.top span{ margin-right: 20px}


.left{ width: 260px; float: left; height: 100%; background: rgba(121, 217, 221, 0.4)}
.left ul{ list-style: none; width: 100%;}
.left ul li{ height: 40px; width: 100%; border: 1px solid #ddd; line-height: 40px; text-align: center;}
.left .selected{ background: rgba(14, 196, 210, 0.99);}
.left .selected a{ color: #fff;}


.right{ float: left; width: 1000px;}
.title{ background: rgba(14, 196, 210, 0.99); color: #fff}
.search-box{ width: 900px; margin: 0 auto; margin-top: 100px; }
</style>

<div class="top">
    <span>欢迎管理员：admin</span>
</div>

<div class="left">
    <ul>
        <li class="selected"><a href="#">查看注册字段</a></li>
        <li><a href="http://localhost/week9/basic/web/index.php?r=demo/add">添加注册字段</a></li>
    </ul>
</div>

<div class="right">
    <div class="search-box">
        <table>
            <tr class="title">
                <td>ID</td>
                <td>字段名</td>
                <td>字段类型</td>
                <td>字段默认值</td>
                <td>是否必填</td>
                <td>验证规则</td>
                <td>字符数限制</td>
                <td>操作</td>
            </tr>
            <?php foreach($data as $val){?>
            <tr>
                <td><?php print_r($val['id']);?></td>
                <td><?php print_r($val['zdm']);?></td>
                <td><?php print_r($val['zdlx']);?></td>
                <td><?php print_r($val['zdmrz']);?></td>
                <td><?php print_r($val['sfbx']);?></td>
                <td><?php print_r($val['yzgz']);?></td>
                <td><?php print_r($val['zfcxz']);?></td>
                <td>
                    
                    <a href="javascript:void(0);" class="uplode">编辑</a>
                    |
                    <a href="javascript:void(0);" class="del" idd=<?php print_r($val['id']);?>>删除</a>
                </td>
            </tr>
           <?php }?>
        </table>
    </div>
</div>

<script src="http://localhost/week9/basic/views/site/jquery.1.12.js"></script>
<script>
$(".del").on("click",function(){
	var id = $(this).attr("idd");
	$.ajax({
		type:"post",
		url:"http://localhost/week9/basic/web/index.php?r=demo/del",
		data:{id:id},
		success:function(r){
			if(r==1){
				// alert("sss");
				localhost.href="http://localhost/week9/basic/web/index.php?r=demo/show";
			}else{
				alert("删除失败");
			}
		}
	})
})
// $(".uplode").on("c")
</script>