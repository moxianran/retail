<?php
use yii\helpers\Url;
?>
<!-- 轮播图 Start! -->
<div id="banner" class="page-banner">
    <img src="/images/banner5.jpg">
</div>
<!-- 轮播图 End! -->

<!-- 公告 Start! -->
<?= $this->render('_notice',['gameNotice' => $gameNotice]) ?>
<!-- 公告 End! -->

<!-- 内容 Start! -->
<div class="page-content page-bg4">
    <div class="lottery container">
        <ul class="row">
            <li class="col-xs-6 col-sm-4">
                <div class="thumbnail">
                    <div class="img">
                        <img src="/images/lottery1.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4>BBIN彩票</h4>
                        <p>亚洲最大最流行的彩票平台之一</p>
                        <div class="more-btn"><a href="#">立即开始</a></div>
                    </div>
                </div>
            </li>
            <li class="col-xs-6 col-sm-4">
                <div class="thumbnail">
                    <div class="img">
                        <img src="/images/lottery2.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4>IG六合彩</h4>
                        <p>亚洲最大最流行的彩票平台之一</p>
                        <div class="more-btn"><a href="#">立即开始</a></div>
                    </div>
                </div>
            </li>
            <li class="col-xs-6 col-sm-4">
                <div class="thumbnail">
                    <div class="img">
                        <img src="/images/lottery3.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4>IG彩票</h4>
                        <p>亚洲最大最流行的彩票平台之一</p>
                        <div class="more-btn"><a href="#">立即开始</a></div>
                    </div>
                </div>
            </li>
            <li class="col-xs-6 col-sm-4">
                <div class="thumbnail">
                    <div class="img">
                        <img src="/images/lottery4.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4>LX豪彩</h4>
                        <p>亚洲最大最流行的彩票平台之一</p>
                        <div class="more-btn"><a href="#">立即开始</a></div>
                    </div>
                </div>
            </li>
            <li class="col-xs-6 col-sm-4">
                <div class="thumbnail">
                    <div class="img">
                        <img src="/images/lottery-no.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4>敬请期待</h4>
                        <p>COMING SOON</p>
                        <div class="more-btn"></div>
                    </div>
                </div>
            </li>
            <li class="col-xs-6 col-sm-4">
                <div class="thumbnail">
                    <div class="img">
                        <img src="/images/lottery-no.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4>敬请期待</h4>
                        <p>COMING SOON</p>
                        <div class="more-btn"></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- 内容 End! -->