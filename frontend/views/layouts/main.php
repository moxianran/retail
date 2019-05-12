<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/layui/layui.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
</head>
<body>

<div class="top-fixed">
    <!-- 顶部 Start! -->
    <div id="top">
        <div class="container">
            <div class="lang dropdown fl">
                <div class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="/images/flag1.png">
                    <em>简体中文</em>
                    <span class="caret"></span>
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="top-time fl"></div>
            <div class="top-link fr">
                <a href="<?php echo Url::toRoute(['/site/service']); ?>"><img src="/images/icon1.png">新手指南</a>
                <a href="javascript:;" class="game-box-show"><img src="/images/icon2.png">游戏体验</a>
                <a href="javascript:;" class="betting-box-show"><img src="/images/icon3.png">手机投注</a>
            </div>
        </div>
    </div>
    <!-- 顶部 End! -->

    <!-- 头部 Start! -->
    <div id="hd">
        <div class="container">
            <a href="/" class="hd-logo fl">
                <img src="/images/logo.png">
            </a>
            <div class="hd-nav fr">
                <a href="javascript:;" class="nav-close"></a>
                <ul class="clearfix">
                    <li <?php if($this->context->action->id == 'index') { echo ' class="on"';}?>>
                        <a href="<?php echo Url::toRoute(['/']); ?>">
                            <h3>首页</h3>
                            <h4>HOME</h4>
                        </a
                        ></li>
                    <li <?php if($this->context->action->id == 'casino') { echo ' class="on"';}?>>
                        <a href="<?php echo Url::toRoute(['/site/casino']); ?>">
                            <h3>真人视讯</h3>
                            <h4>CASINO</h4>
                        </a></li>
                    <li <?php if($this->context->action->id == 'sports') { echo ' class="on"';}?>>
                        <a href="<?php echo Url::toRoute(['/site/sports']); ?>">
                            <h3>体育赛事</h3>
                            <h4>SPORTS</h4>
                        </a></li>
                    <li <?php if($this->context->action->id == 'game') { echo ' class="on"';}?>>
                        <a href="<?php echo Url::toRoute(['/site/game']); ?>">
                            <h3>电子游艺</h3>
                            <h4>GAME</h4>
                        </a></li>
                    <li <?php if($this->context->action->id == 'lottery') { echo ' class="on"';}?>>
                        <a href="<?php echo Url::toRoute(['/site/lottery']); ?>">
                            <h3>彩票游戏</h3>
                            <h4>LOTTERY</h4>
                        </a></li>
                    <li <?php if($this->context->action->id == 'promotions') { echo ' class="on"';}?>>
                        <a href="<?php echo Url::toRoute(['/site/promotions']); ?>">
                            <h3>优惠活动</h3>
                            <h4>PROMOTIONS</h4>
                        </a></li>
                    <li <?php if($this->context->action->id == 'join') { echo ' class="on"';}?>>
                        <a href="<?php echo Url::toRoute(['/site/join']); ?>">
                            <h3>合作加盟</h3>
                            <h4>JOIN</h4>
                        </a></li>
                    <li <?php if($this->context->action->id == 'service') { echo ' class="on"';}?>>
                        <a href="<?php echo Url::toRoute(['/site/service']); ?>">
                            <h3>在线客服</h3>
                            <h4>SERVICE</h4>
                        </a></li>
                </ul>
                <div class="nav-lang">
                    <a href="#" class="on">简体中文</a>
                    <span>|</span>
                    <a href="#">English</a>
                </div>
                <div class="nav-link">
                    <a href="<?php echo Url::toRoute(['/site/guide']); ?>"><img src="/images/icon1.png">新手指南</a>
                    <a href="javascript:;" class="game-box-show"><img src="/images/icon2.png">游戏体验</a>
                    <a href="javascript:;" class="betting-box-show"><img src="/images/icon3.png">手机投注</a>
                </div>
                <div class="nav-common">
                    <a href="<?php echo Url::toRoute(['/site/about']); ?>">关于我们</a>
                    <a href="#">联系我们</a>
                    <a href="<?php echo Url::toRoute(['/site/join']); ?>">加入代理</a>
                    <a href="#">存款帮助</a>
                    <a href="#">取款帮助</a>
                    <a href="<?php echo Url::toRoute(['/site/help']); ?>">常见问题</a>
                </div>
            </div>
            <a href="javascript:;" class="nav-btn"></a>
        </div>
    </div>
    <!-- 头部 End! -->
</div>
<div class="hd-space"></div>

<?= $content ?>
<!-- 页脚 Start! -->
<div id="ft">
    <div class="container">
        <div class="contact">
            <div class="contact-tit">
                <img src="/images/contact-tit.png">
            </div>
            <ul class="row clearfix">
                <li class="col-xs-6 col-md-3">
                    <h4><img src="/images/icon14.png">热线电话：</h4>
                    <h3>13308830738</h3>
                </li>
                <li class="col-xs-6 col-md-3">
                    <h4><img src="/images/icon16.png">微信客服：</h4>
                    <h3>13308830738</h3>
                </li>
                <li class="col-xs-6 col-md-3">
                    <h4><img src="/images/icon15.png">客服QQ：</h4>
                    <h3>1165439888</h3>
                </li>
                <li class="col-xs-6 col-md-3">
                    <h4><img src="/images/icon17.png">在线客服：</h4>
                    <h3>7*24小时在线客服</h3>
                </li>
            </ul>
        </div>
        <div class="ft-link">
            <a href="#"><img src="/images/link1.png"></a>
            <a href="#"><img src="/images/link2.png"></a>
            <a href="#"><img src="/images/link3.png"></a>
            <a href="#"><img src="/images/link4.png"></a>
            <a href="#"><img src="/images/link5.png"></a>
            <a href="#"><img src="/images/link6.png"></a>
            <a href="#"><img src="/images/link7.png"></a>
            <a href="#"><img src="/images/link8.png"></a>
            <a href="#"><img src="/images/link9.png"></a>
            <a href="#"><img src="/images/link10.png"></a>
            <a href="#"><img src="/images/link11.png"></a>
        </div>
        <div class="ft-nav">
            <a href="<?php echo Url::toRoute(['/site/about']); ?>">关于我们</a>
            <span>｜</span>
            <a href="#<?php //echo Url::toRoute(['/site/contact']); ?>">联系我们</a>
            <span>｜</span>
            <a href="<?php echo Url::toRoute(['/site/service']); ?>">新手指南</a>
            <span>｜</span>
            <a href="#">存款帮助</a>
            <span>｜</span>
            <a href="<?php echo Url::toRoute(['/site/help']); ?>">常见问题</a>
            <span>｜</span>
            <a href="<?php echo Url::toRoute(['/site/join']); ?>">加入代理</a>
            <span>｜</span>
            <a href="<?php echo Url::toRoute(['/site/help']); ?>">常见问题</a>
        </div>
    </div>
    <div class="copyright">Copyright © 太阳城集团 Reserved</div>
</div>
<!-- 页脚 End! -->

<div id="bottom">
    <a href="/">
        <span class="icon1"></span>
        <p>首页</p>
    </a>
    <a href="javascript:;" class="wap-login-btn">
        <span class="icon5"></span>
        <p>登录</p>
    </a>
    <a href="<?php echo Url::toRoute(['/site/register']); ?>">
        <span class="icon2"></span>
        <p>注册</p>
    </a>
    <a href="javascript:;" class="betting-box-show">
        <span class="icon3"></span>
        <p>游戏</p>
    </a>
    <a href="javascript:;" class="service-popup-show">
        <span class="icon4"></span>
        <p>客服</p>
    </a>
</div>


<!-- 回到顶部 Start! -->
<div class="back-top"></div>
<!-- 回到顶部 End! -->

<!-- 移动端登录弹窗 Start! -->
<div class="filter-bg login-popup">
    <div class="popup">
        <a href="javascript:;" class="popup-close close-btn"></a>
        <div class="login-box wap-login-box">
            <img src="/images/login-tit.png" class="login-tit">
            <form>
                <div class="input-group">
                    <span class="icon1"></span>
                    <input type="text" placeholder="账号">
                </div>
                <div class="input-group forget">
                    <span class="icon2"></span>
                    <input type="text" placeholder="密码">
                    <a href="#">忘记？</a>
                </div>
                <div class="input-group">
                    <span class="icon3"></span>
                    <input type="text" placeholder="验证码">
                </div>
                <div class="btns clearfix">
                    <a href="javascript:;" class="login-btn">登录</a>
                    <a href="<?php echo Url::toRoute(['/site/register']); ?>" class="register-btn">注册</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 移动端登录弹窗 End! -->

<!-- 手机投注 Start! -->
<div class="filter-bg betting-box">
    <div class="popup">
        <a href="javascript:;" class="popup-close close-btn"></a>
        <div class="popup-con">
            <div class="title"><img src="/images/title2.png"></div>
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">腾龙厅</li>
                    <li>华美厅</li>
                    <li>帝宝厅</li>
                    <li>名称厅</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <div class="img">
                            <img src="/images/betting.jpg">
                        </div>
                        <div class="text">APP下载链接：
                            <a href="#"><img src="/images/icon21.png">链接一</a>
                            <a href="#"><img src="/images/icon22.png">链接二</a>
                            <a href="#"><img src="/images/icon23.png">链接三</a>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="img">
                            <img src="/images/betting.jpg">
                        </div>
                        <div class="text">APP下载链接：
                            <a href="#"><img src="/images/icon21.png">链接四</a>
                            <a href="#"><img src="/images/icon22.png">链接五</a>
                            <a href="#"><img src="/images/icon23.png">链接六</a>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="img">
                            <img src="/images/betting.jpg">
                        </div>
                        <div class="text">APP下载链接：
                            <a href="#"><img src="/images/icon21.png">链接七</a>
                            <a href="#"><img src="/images/icon22.png">链接八</a>
                            <a href="#"><img src="/images/icon23.png">链接九</a>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="img">
                            <img src="/images/betting.jpg">
                        </div>
                        <div class="text">APP下载链接：
                            <a href="#"><img src="/images/icon21.png">链接三</a>
                            <a href="#"><img src="/images/icon22.png">链接二</a>
                            <a href="#"><img src="/images/icon23.png">链接一</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 手机投注 End! -->

<!-- 游戏选择 Start! -->
<div class="filter-bg game-select">
    <div class="popup">
        <a href="javascript:;" class="popup-close close-btn"></a>
        <div class="popup-con">
            <div class="title"><img src="/images/title3.png"></div>
            <ul class="row">
                <li class="col-xs-6 col-sm-3">
                    <div class="thumbnail">
                        <div class="img">
                            <img src="/images/game.jpg">
                        </div>
                        <div class="text">
                            <h4>腾龙厅</h4>
                            <div class="link">
                                <a href="#">线路一</a>
                                <a href="#">线路二</a>
                                <a href="#">线路三</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <div class="thumbnail">
                        <div class="img">
                            <img src="/images/game.jpg">
                        </div>
                        <div class="text">
                            <h4>华美厅</h4>
                            <div class="link">
                                <a href="#">线路一</a>
                                <a href="#">线路二</a>
                                <a href="#">线路三</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <div class="thumbnail">
                        <div class="img">
                            <img src="/images/game.jpg">
                        </div>
                        <div class="text">
                            <h4>帝宝厅</h4>
                            <div class="link">
                                <a href="#">线路一</a>
                                <a href="#">线路二</a>
                                <a href="#">线路三</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-xs-6 col-sm-3">
                    <div class="thumbnail">
                        <div class="img">
                            <img src="/images/game.jpg">
                        </div>
                        <div class="text">
                            <h4>名称厅</h4>
                            <div class="link">
                                <a href="#">线路一</a>
                                <a href="#">线路二</a>
                                <a href="#">线路三</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="btns">
                <a href="#">申请试玩</a>
                <a href="#" class="account-btn">立即开户</a>
            </div>
        </div>
    </div>
</div>
<!-- 游戏选择 End! -->

<!-- 客服边栏 Start! -->
<div class="filter-bg filter-service"></div>
<div class="service-bar">
    <a href="javascript:;" class="service-bar-close"></a>
    <div class="service-list">
        <a href="#"><img src="/images/service1.png">电话咨询</a>
        <a href="#"><img src="/images/service2.png">短信咨询</a>
        <a href="#"><img src="/images/service3.png">在线客服</a>
        <a href="#"><img src="/images/service4.png">QQ客服</a>
    </div>
    <div class="erweima">
        <img src="/images/erweima.jpg">
    </div>
</div>
<!-- 客服边栏 End! -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
