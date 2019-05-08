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
                <a href="guide.html"><img src="/images/icon1.png">新手指南</a>
                <a href="javascript:;" class="game-box-show"><img src="/images/icon2.png">游戏体验</a>
                <a href="javascript:;" class="betting-box-show"><img src="/images/icon3.png">手机投注</a>
            </div>
        </div>
    </div>
    <!-- 顶部 End! -->

    <!-- 头部 Start! -->
    <div id="hd">
        <div class="container">
            <a href="index.html" class="hd-logo fl">
                <img src="/images/logo.png">
            </a>
            <div class="hd-nav fr">
                <a href="javascript:;" class="nav-close"></a>
                <ul class="clearfix">
                    <li class="on">
                        <a href="<?php echo Url::toRoute(['/']); ?>">
                            <h3>首页</h3>
                            <h4>HOME</h4>
                        </a
                        ></li>
                    <li><a href="<?php echo Url::toRoute(['/site/casino']); ?>">
                            <h3>真人视讯</h3>
                            <h4>CASINO</h4>
                        </a></li>
                    <li><a href="<?php echo Url::toRoute(['/site/sports']); ?>">
                            <h3>体育赛事</h3>
                            <h4>SPORTS</h4>
                        </a></li>
                    <li><a href="<?php echo Url::toRoute(['/site/game']); ?>">
                            <h3>电子游艺</h3>
                            <h4>GAME</h4>
                        </a></li>
                    <li><a href="<?php echo Url::toRoute(['/site/lottery']); ?>">
                            <h3>彩票游戏</h3>
                            <h4>LOTTERY</h4>
                        </a></li>
                    <li><a href="<?php echo Url::toRoute(['/site/promotions']); ?>">
                            <h3>优惠活动</h3>
                            <h4>PROMOTIONS</h4>
                        </a></li>
                    <li><a href="<?php echo Url::toRoute(['/site/join']); ?>">
                            <h3>合作加盟</h3>
                            <h4>JOIN</h4>
                        </a></li>
                    <li><a href="<?php echo Url::toRoute(['/site/service']); ?>">
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
                    <a href="guide.html"><img src="/images/icon1.png">新手指南</a>
                    <a href="javascript:;" class="game-box-show"><img src="/images/icon2.png">游戏体验</a>
                    <a href="javascript:;" class="betting-box-show"><img src="/images/icon3.png">手机投注</a>
                </div>
                <div class="nav-common">
                    <a href="about.html">关于我们</a>
                    <a href="contact.html">联系我们</a>
                    <a href="join.html">加入代理</a>
                    <a href="#">存款帮助</a>
                    <a href="#">取款帮助</a>
                    <a href="help.html">常见问题</a>
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
            <a href="about.html">关于我们</a>
            <span>｜</span>
            <a href="contact.html">联系我们</a>
            <span>｜</span>
            <a href="guide.html">新手指南</a>
            <span>｜</span>
            <a href="#">存款帮助</a>
            <span>｜</span>
            <a href="help.html">常见问题</a>
            <span>｜</span>
            <a href="join.html">加入代理</a>
            <span>｜</span>
            <a href="help.html">常见问题</a>
        </div>
    </div>
    <div class="copyright">Copyright © 太阳城集团 Reserved</div>
</div>
<!-- 页脚 End! -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
