<?php
use yii\helpers\Url;
?>
<!-- 轮播图 Start! -->
<div id="banner" class="page-banner">
    <img src="/images/banner2.jpg">
</div>
<!-- 轮播图 End! -->

<!-- 公告 Start! -->
<div class="notice">
    <div class="container">
        <div class="notice-wp">
            <img src="/images/notice.png" class="notice-tit">
            <img src="/images/notice-m.png" class="notice-tit-m">
            <marquee behavior="scroll" direction="left">重要通知：由于腾讯进行微信排查封号 jjxpj111（蜜儿）已被冻结,请添加新微信号 pkyw1356 （颖儿）进行咨询 ,给您带来不便敬请谅解！</marquee>
        </div>
    </div>
</div>
<!-- 公告 End! -->

<!-- 内容 Start! -->
<div class="page-content page-bg1">
    <div class="casino container">
        <div class="casino-wrapper">
            <div class="casino-head clearfix">
                <a href="#" class="left-img fl">
                    <img src="/images/casino1.jpg">
                </a>
                <div id="myCarousel" class="carousel slide fr" data-ride="carousel" autoplay="false">
                    <ol class="carousel-indicators dot-style">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active"><img src="/images/casino2.jpg"></div>
                        <div class="item"><img src="/images/casino2.jpg"></div>
                        <div class="item"><img src="/images/casino2.jpg"></div>
                    </div>
                </div>
            </div>
            <ul class="casino-list clearfix">
                <li>
                    <a href="#">
                        <img src="/images/casinolist1.jpg">
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/images/casinolist2.jpg">
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/images/casinolist3.jpg">
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/images/casinolist4.jpg">
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/images/casinolist5.jpg">
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/images/casinolist6.jpg">
                        <span></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- 内容 End! -->

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
                    <h4><img src="/images/icon15.png">客服QQ：</h4>
                    <h3>1165439888</h3>
                </li>
                <li class="col-xs-6 col-md-3">
                    <h4><img src="/images/icon16.png">微信客服：</h4>
                    <h3>13308830738</h3>
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
            <a href="#">关于我们</a>
            <span>｜</span>
            <a href="#">联系我们</a>
            <span>｜</span>
            <a href="#">加入代理</a>
            <span>｜</span>
            <a href="#">存款帮助</a>
            <span>｜</span>
            <a href="#">取款帮助</a>
            <span>｜</span>
            <a href="#">常见问题</a>
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
</body>
</html>