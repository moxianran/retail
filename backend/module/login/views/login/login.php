<?php
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA | Login</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">R</h1>
        </div>
        <h3>欢迎来到后台</h3>
        <form class="m-t" role="form" id="saveForm">
            <div class="form-group">
                <input type="email" class="form-control" name="account" required="" placeholder="请输入账号" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" required="" placeholder="请输入密码" autocomplete="off">
            </div>
            <button type="button" id="submit_btn" class="btn btn-primary block full-width m-b">Login</button>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/artDialog/artDialog.js?skin=default"></script>
<script src="/js/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/js/artDialog/plugins/iframeTools.js"></script>

<script>

    $(function(){
        $("#submit_btn").click(function(){
            $.ajax({
                url:"<?php echo Url::toRoute(['/login/login/login']); ?>",
                type:"post",
                data:$("#saveForm").serialize(),
                dataType: 'json',
                success:function(data){
                    if(data.result=="success"){
                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);

                        art.dialog.tips(data.info+' | 正在跳转..', 3);


                        window.location.href = "<?php echo Url::toRoute(['/center/notice/list']); ?>";
                    }else{

                        art.dialog.tips(data.info);

                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);
                    }
                }
            })
        })
    })

</script>
</body>

</html>
