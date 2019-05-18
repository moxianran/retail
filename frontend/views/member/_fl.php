<?php
use yii\helpers\Url;
?>
<div class="public-menu fl">
    <div class="menu-title"><img src="/images/title4.png"></div>
    <ul class="clearfix">
        <li<?php if($this->context->action->id == 'member'){ echo ' class="on"';} ?>>
            <a href="<?php echo Url::toRoute(['/member/member']); ?>">账户管理</a>
        </li>
        <li><a href="#">在线取款</a></li>
        <li><a href="#">在线存款</a></li>
        <li<?php if($this->context->action->id == 'recharge'){ echo ' class="on"';} ?>>
            <a href="<?php echo Url::toRoute(['/member/recharge']); ?>">充值记录</a>
        </li>
        <li<?php if($this->context->action->id == 'bet'){ echo ' class="on"';} ?>>
            <a href="<?php echo Url::toRoute(['/member/bet']); ?>">投注记录</a>
        </li>
        <li<?php if($this->context->action->id == 'login'){ echo ' class="on"';} ?>>
            <a href="<?php echo Url::toRoute(['/member/login']); ?>">登录记录</a>
        </li>
        <li<?php if($this->context->action->id == 'notice'){ echo ' class="on"';} ?>>
            <a href="<?php echo Url::toRoute(['/member/notice']); ?>">公告信息</a>
        </li>
    </ul>
    <a href="/" class="menu-logo"><img src="/images/logo2.png"></a>
</div>