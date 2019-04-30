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
</head>

<?php $this->beginBody() ?>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="/img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">张三</span>
                            <span class="text-muted text-xs block">销售<b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>

                <li <?php if($this->context->module->id == 'notice') { echo ' class="active"';} ?>>
                    <a href="">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">通知板块</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse ">
                        <li <?php if($this->context->id == 'website') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/notice/website/list']); ?>">网站公告</a>
                        </li>
                        <li <?php if($this->context->id == 'system') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/notice/system/list']); ?>">会员后台</a>
                        </li>
                        <li <?php if($this->context->id == 'game') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/notice/game/list']); ?>">游戏大厅</a>
                        </li>
                        <li <?php if($this->context->id == 'agent') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/notice/agent/list']); ?>">代理后台</a>
                        </li>
                    </ul>
                </li>

                <li <?php if($this->context->module->id == 'user') { echo ' class="active"';} ?>>
                    <a href="">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">会员管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse ">
                        <li <?php if($this->context->module->id == 'user' && $this->context->action->id == 'list') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/user/default/list']); ?>">会员列表</a>
                        </li>
                        <li <?php if($this->context->module->id == 'user' && $this->context->action->id == 'examine') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/user/default/examine']); ?>">会员审核</a>
                        </li>
                        <li <?php if($this->context->module->id == 'user' && $this->context->action->id == 'online') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/user/default/online']); ?>">会员在线</a>
                        </li>

                    </ul>
                </li>

                <li <?php if($this->context->module->id == 'admin' && $this->context->id == 'agent') { echo ' class="active"';} ?>>
                    <a href="">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">代理管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse ">
                        <li <?php if($this->context->action->id == 'list') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/admin/agent/list']); ?>">代理列表</a>
                        </li>
                        <li <?php if($this->context->action->id == 'examine') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/admin/agent/examine']); ?>">代理审核</a>
                        </li>

                    </ul>
                </li>

                <li <?php if($this->context->module->id == 'admin' && $this->context->id == 'customer') { echo ' class="active"';} ?>>
                    <a href="">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">客服管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse ">
                        <li <?php if($this->context->id == 'customer') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/admin/customer/list']); ?>">客服列表</a>
                        </li>
                    </ul>
                </li>

                <li <?php if($this->context->module->id == 'admin' && $this->context->id == 'director') { echo ' class="active"';} ?>>
                    <a href="">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">主管管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse ">
                        <li <?php if($this->context->id == 'director') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/admin/director/list']); ?>">主管列表</a>
                        </li>
                    </ul>
                </li>


                <li <?php if($this->context->module->id == 'report') { echo ' class="active"';} ?>>
                    <a href="">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">报表管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse ">
                        <li <?php if($this->context->module->id == 'report' && $this->context->action->id == 'user-add-record') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/report/report/user-add-record']); ?>">会员新增记录</a>
                        </li>
                        <li <?php if($this->context->module->id == 'report' && $this->context->action->id == 'agent-add-record') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/report/report/agent-add-record']); ?>">代理新增记录</a>
                        </li>
                        <li <?php if($this->context->module->id == 'report' && $this->context->action->id == 'bet') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/report/report/bet']); ?>">投注记录</a>
                        </li>
                        <li <?php if($this->context->module->id == 'report' && $this->context->action->id == 'recharge') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/report/report/recharge']); ?>">充值记录</a>
                        </li>
                        <li <?php if($this->context->module->id == 'report' && $this->context->action->id == 'result') { echo ' class="active"';} ?>>
                            <a href="<?php echo Url::toRoute(['/report/report/result']); ?>">输赢报表</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
<?= $content ?>
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
</body>
</html>
<?php $this->endPage() ?>
