<?php
$is_upload = false;
$msg = null;
$UPLOAD_ADDR = "./";
if(isset($_POST['submit'])){
    $ext_arr = array('jpg','png','gif');
    $file_ext = substr($_FILES['upload_file']['name'],strrpos($_FILES['upload_file']['name'],".")+1);
    if(in_array($file_ext,$ext_arr)){
        $temp_file = $_FILES['upload_file']['tmp_name'];
        $img_path = $UPLOAD_ADDR."/".rand(10, 99).date("YmdHis").".".$file_ext;

        if(move_uploaded_file($temp_file,$img_path)){
            $is_upload = true;
        }
        else{
            $msg = '上传失败！';
        }
    }
    else{
        $msg = "只允许上传.jpg|.png|.gif类型文件！";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


    </style>   
    <title>pai--知识没有止境!</title>
</head>
<body>

<div>
    <div style="text-align: center;">
    <img src="./LOGO/paibaike.png" height="300">
    <h1>注册成为 pai百科的一员！</h1>
    </div>
   
    <ol style="margin-left: 250px" >
        <li>
            <h3>头像</h3>
            <form enctype="multipart/form-data" method="post" onsubmit="return checkFile()">
                <p> 请选择要上传的图片：</p>
                <input class="input_file" type="file" name="upload_file"/>
                <input class="button" type="submit" name="submit" value="上传"/>
            </form>
            <div id="msg">
                <?php 
                    if($msg != null){
                        echo "提示：".$msg;
                    }
                ?>
            </div>
            <div id="img">
                <?php
                    if($is_upload){
                        echo '<img src="'.$img_path.'" width="250px" />';
                    }
                ?>
            </div>
        </li>
        <li>
            <h3>用户名</h3>
            用户名密码什么的就不用填了，念一声“芝麻开门”就好啦！  (#`O′)
        </li>
        <li>
            <h3>完成注册</h3>
        <a href="./index.php">回到主页</a>
        </li>
    </ol>
</div>

</body>
</html>

