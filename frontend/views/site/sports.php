<?php
use yii\helpers\Url;
?>
<!-- 轮播图 Start! -->
<div id="banner" class="page-banner">
    <img src="/images/banner3.jpg">
</div>
<!-- 轮播图 End! -->

<!-- 公告 Start! -->
<?= $this->render('_notice',['gameNotice' => $gameNotice]) ?>
<!-- 公告 End! -->

<!-- 内容 Start! -->
<div class="page-content page-bg2">
    <div class="sports container">
        <div class="page-menu clearfix">
            <img class="sport_img" src="/images/sports_logo.png" alt="">
        </div>
        <div class="sports-wrapper">
            <div class="sports-header">
                <div class="us-tiem">美东时间：2018/09/25 - 22:44:48</div>
                <div class="img-bg"><img src="/images/sports1.jpg"></div>
                <div class="item-wp clearfix">
                    <ul class="row fl">
                        <li class="col-xs-6"><a href="#">
                                <img src="/images/sicon1.png">
                                <p>今日-足球</p>
                            </a></li>
                        <li class="col-xs-6"><a href="#">
                                <img src="/images/sicon2.png">
                                <p>今日-蓝球</p>
                            </a></li>
                        <li class="col-xs-6"><a href="#">
                                <img src="/images/sicon3.png">
                                <p>冠军赛</p>
                            </a></li>
                        <li class="col-xs-6"><a href="#">
                                <img src="/images/sicon4.png">
                                <p>过关</p>
                            </a></li>
                    </ul>
                    <div class="text fr">
                        <h1>BB SPORTS</h1>
                        <h3>投注首选 BB体育</h3>
                        <a href="#">立即登录</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 sports-item">
                    <div class="sports-inner">
                        <div class="item-tit"><img src="/images/sicon5.png">滚球 LIVE</div>
                        <div class="item-con">
                            <ul class="item-list">
                                <li class="row">
                                    <div class="col-xs-3 live">
                                        <h4>LIVE</h4>
                                        <h5>8:1</h5>
                                    </div>
                                    <div class="col-xs-6 name">
                                        <h4>MLB 美国职业棒球</h4>
                                        <p>阿美利加会</p>
                                        <p>费城费城人</p>
                                    </div>
                                    <div class="col-xs-3 more-btn">
                                        <a href="#">更多</a>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-xs-3 live">
                                        <h4>LIVE</h4>
                                        <h5>8:1</h5>
                                    </div>
                                    <div class="col-xs-6 name">
                                        <h4>MLB 美国职业棒球</h4>
                                        <p>阿美利加会</p>
                                        <p>费城费城人</p>
                                    </div>
                                    <div class="col-xs-3 more-btn">
                                        <a href="#">更多</a>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-xs-3 live">
                                        <h4>LIVE</h4>
                                        <h5>8:1</h5>
                                    </div>
                                    <div class="col-xs-6 name">
                                        <h4>MLB 美国职业棒球</h4>
                                        <p>阿美利加会</p>
                                        <p>费城费城人</p>
                                    </div>
                                    <div class="col-xs-3 more-btn">
                                        <a href="#">更多</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 sports-item">
                    <div class="sports-inner">
                        <div class="item-tit"><img src="/images/sicon5.png">即将开赛</div>
                        <div class="item-con">
                            <div class="video-player" poster="/images/poster.jpg">
                                <video controls>
                                    <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 sports-item">
                    <div class="sports-inner">
                        <div class="item-tit"><img src="/images/sicon5.png">最新赛果</div>
                        <div class="item-con">
                            <ul class="item-list">
                                <li class="row">
                                    <div class="col-xs-3 live">
                                        <h4>9/25</h4>
                                        <h5>8:1</h5>
                                    </div>
                                    <div class="col-xs-9 name">
                                        <h4>MLB 美国职业棒球</h4>
                                        <p>阿美利加会</p>
                                        <p>费城费城人</p>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-xs-3 live">
                                        <h4>9/25</h4>
                                        <h5>8:1</h5>
                                    </div>
                                    <div class="col-xs-9 name">
                                        <h4>MLB 美国职业棒球</h4>
                                        <p>阿美利加会</p>
                                        <p>费城费城人</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 sports-item">
                    <div class="sports-inner">
                        <div id="sportsCarousel" class="carousel slide fr" data-ride="carousel" autoplay="false">
                            <ol class="carousel-indicators dot-style">
                                <li data-target="#sportsCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#sportsCarousel" data-slide-to="1"></li>
                                <li data-target="#sportsCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active"><img src="/images/sports2.jpg"></div>
                                <div class="item"><img src="/images/sports2.jpg"></div>
                                <div class="item"><img src="/images/sports2.jpg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 End! -->