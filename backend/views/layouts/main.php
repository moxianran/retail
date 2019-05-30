<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<!--    <link href="http://cn.inspinia.cn/html/inspiniaen/css/plugins/toastr/toastr.min.css" rel="stylesheet">-->
<!--    <link href="http://cn.inspinia.cn/html/inspiniaen/css/animate.css" rel="stylesheet">-->
<!--    <link href="http://cn.inspinia.cn/html/inspiniaen/css/style.css" rel="stylesheet">-->

</head>

<?php $this->beginBody() ?>

<?php
$adminInfo = Yii::$app->session->get('adminInfo');
?>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="/img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?php echo $adminInfo['real_name']; ?></span>
                            <span class="text-muted text-xs block"><?php echo $adminInfo['positionName']; ?></span>
                        </a>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>

                <?php
                    $list = $this->params['menu'];
                    $power_ids = $this->params['power_id'] ;
                    foreach ($list as $k => $v) {
                        if ($v['pid'] == 0 && (in_array($v['id'],$power_ids) || $adminInfo['position_id'] == 1)) {
                ?>
                        <li <?php if($this->context->module->id == $v['module']) { echo ' class="active"';} ?>>
                            <a href="">
                                <i class="fa fa-th-large"></i>
                                <span class="nav-label"><?php echo $v['name'] ?></span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level collapse ">
                <?php
                    for ($i = 0; $i < count($list); $i++) {
                        if ($v['id'] == $list[$i]['pid']  && (in_array($list[$i]['id'],$power_ids) || $adminInfo['position_id'] == 1)) {
                ?>
                            <li <?php if($this->context->id == $list[$i]['controller']) { echo ' class="active"';} ?>>
                                <a href="<?php echo Url::toRoute(["/".$list[$i]['module']."/".$list[$i]['controller']."/".$list[$i]['action']]); ?>"><?php echo $list[$i]['name'] ;?></a>
                            </li>
                <?php
                    }}
                ?>
                            </ul>
                        </li>
                <?php
                }}
                ?>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"></div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="<?php echo Url::toRoute(['/login/login/logout']); ?>">
                            <i class="fa fa-sign-out"></i> 退出登录
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <?php
        if(isset($this->params['noticeAgent']) && $this->params['noticeAgent']){
        ?>
        <div class="alert alert-success">
            <marquee behavior="scroll" direction="left">
                <?php
                        echo $this->params['noticeAgent']['content'];
                ?>
            </marquee>
        </div>
        <?php
        }
        ?>
        <?= $content ?>
    </div>
</div>

</div>

<?php $this->endBody() ?>
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="/js/plugins/dataTables/datatables.min.js"></script>
<script src="/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>
<script src="http://cn.inspinia.cn/html/inspiniaen/js/plugins/toastr/toastr.min.js"></script>

<script>
    function checkTime(){

        $.ajax({
            url:"<?php echo Url::toRoute(['/center/notice/new-notice']); ?>",
            type:"GET",
            data:{},
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                    var i = -1;
                    var toastCount = 0;
                    var $toastlast;
                    toastr.success(data.info,'最新通知')
                }
            }
        });
    }
    setInterval("checkTime()","5000");
</script>

</body>
</html>
<?php $this->endPage() ?>
