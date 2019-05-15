<?php
use yii\helpers\Url;
?>
<!-- 轮播图 Start! -->
<div id="banner" class="page-banner">
    <img src="/images/banner2.jpg">
</div>
<!-- 轮播图 End! -->

<!-- 公告 Start! -->
<?= $this->render('_notice',['gameNotice' => $gameNotice]) ?>
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