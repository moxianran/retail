<?php
use yii\helpers\Url;
?>
<!-- 轮播图 Start! -->
<div id="banner">
    <div id="index-banner" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#index-banner" data-slide-to="0" class="active"></li>
            <li data-target="#index-banner" data-slide-to="1"></li>
            <li data-target="#index-banner" data-slide-to="2"></li>
            <li data-target="#index-banner" data-slide-to="3"></li>
            <li data-target="#index-banner" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active"><img src="/images/banner1.jpg"></div>
            <div class="item"><img src="/images/banner1.jpg"></div>
            <div class="item"><img src="/images/banner1.jpg"></div>
            <div class="item"><img src="/images/banner1.jpg"></div>
            <div class="item"><img src="/images/banner1.jpg"></div>
        </div>
    </div>
    <div class="login-box">
        <img src="/images/login-tit.png" class="login-tit">
        <form id="saveForm">
            <div class="input-group">
                <span class="icon1"></span>
                <input type="text" placeholder="账号" name="account">
            </div>
            <div class="input-group forget">
                <span class="icon2"></span>
                <input type="text" placeholder="密码" name="pwd">
                <a href="#">忘记？</a>
            </div>
            <div class="input-group">
                <span class="icon3"></span>
                <input type="text" placeholder="验证码">
            </div>
            <div class="btns clearfix">
                <a href="javascript:void(0);" class="login-btn" id="login-btn">登录</a>
                <a href="<?php echo Url::toRoute(['/site/register']); ?>" class="register-btn">注册</a>
            </div>
        </form>
    </div>
</div>

<!-- 轮播图 End! -->
<?= $this->render('_notice',['gameNotice' => $gameNotice]) ?>

<!-- 内容 Start! -->
<div id="main">
    <div class="process container">
        <div class="process-wp">
            <div class="process-tit">
                <img src="/images/process-tit.png">
                <p>游戏流程</p>
            </div>
            <ul class="clearfix">
                <li>
                    <img src="/images/process1.png">
                    <p>注册</p>
                </li>
                <li>
                    <img src="/images/process2.png">
                    <p>绑定</p>
                </li>
                <li>
                    <img src="/images/process3.png">
                    <p>存款</p>
                </li>
                <li>
                    <img src="/images/process4.png">
                    <p>游戏</p>
                </li>
                <li>
                    <img src="/images/process5.png">
                    <p>取款</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="index-list container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <a href="#" class="thumbnail">
                    <div class="img">
                        <img src="/images/img1.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4><img src="/images/icon4.png">真人视讯</h4>
                        <p>作用七大真人娱乐平台  真人AV美女荷官</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#" class="thumbnail">
                    <div class="img">
                        <img src="/images/img2.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4><img src="/images/icon5.png">体育赛事</h4>
                        <p>作用七大真人娱乐平台  真人AV美女荷官</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#" class="thumbnail">
                    <div class="img">
                        <img src="/images/img3.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4><img src="/images/icon6.png">电子游艺</h4>
                        <p>欧美最流行MG平台 热门游戏享之无尽</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#" class="thumbnail">
                    <div class="img">
                        <img src="/images/img4.jpg" alt="">
                    </div>
                    <div class="text">
                        <h4><img src="/images/icon7.png">彩票游戏</h4>
                        <p>最专业完善的彩票平台 彩种齐全丰富</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="index-sec1">
        <div class="container">
            <div class="sec-inner fl">
                <div class="tit"><img src="/images/title1.jpg"></div>
                <p>手机投注平台面向全网玩家，提供近万款电子游艺、老虎机‘百家乐以及彩票游戏、体育投注、线上存款及线上取款，一键操作，运用3D即时运算创造真实场景结合立体影像，完整规划的跨系统娱乐平台，整合同步账号和资料传输，达到随时随地不间断娱乐的享受概念。</p>
                <div class="clearfix">
                    <div class="support fr">
                        <h4><img src="/images/ios.png">IOS　<img src="/images/android.png">Android</h4>
                        <h5>支持IOS&Android所有移动设备</h5>
                    </div>
                    <div class="erweima fr">
                        <img src="/images/erweima.jpg">
                        <span class="corner1"></span>
                        <span class="corner2"></span>
                        <span class="corner3"></span>
                        <span class="corner4"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="index-sec2">
        <div class="container">
            <ul class="clearfix">
                <li><span><img src="/images/pay1.png"></span></li>
                <li><span><img src="/images/pay2.png"></span></li>
                <li><span><img src="/images/pay3.png"></span></li>
                <li><span><img src="/images/pay4.png"></span></li>
                <li><span><img src="/images/pay5.png"></span></li>
            </ul>
            <h3><span>安全</span>可靠　 <span>极速</span>充值</h3>
            <p>支持支付宝、微信支付、银联、信用卡、手机银行转账等</p>
        </div>
    </div>
    <div class="index-sec3">
        <div class="container">
            <ul class="clearfix">
                <li class="clearfix">
                    <img src="/images/icon8.png">
                    <div class="text">
                        <h4>亚洲第一博彩品牌</h4>
                        <p>亚洲实力最强劲，最完善的实力赌场</p>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="/images/icon9.png">
                    <div class="text">
                        <h4>游戏产品丰富完善</h4>
                        <p>欧亚当下热门游戏一网打</p>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="/images/icon10.png">
                    <div class="text">
                        <h4>存提速度行业顶尖</h4>
                        <p>存款速度最快30秒，提款1分钟</p>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="/images/icon11.png">
                    <div class="text">
                        <h4>大额无忧资金安全</h4>
                        <p>全程担保会员每一笔存款和取</p>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="/images/icon12.png">
                    <div class="text">
                        <h4>玩家数据安全保障</h4>
                        <p>采用256为SSL加密系统保障安全数据</p>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="/images/icon13.png">
                    <div class="text">
                        <h4>尊贵VIP独享特权</h4>
                        <p>加入VIP即可享受独家特权</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- 内容 End! -->

<!-- 侧边栏 Start! -->
<div class="slide-bar slide-left">
    <div class="slide-bg"></div>
    <div class="slide-con">
        <div class="slide-img">
            <img src="/images/logo1.png">
        </div>
        <div class="tit">
            <img src="/images/title.png">
        </div>
        <a href="#" class="to-game">立即游戏</a>
        <div class="slide-contact">
            <h4><img src="/images/icon14.png">热线电话：</h4>
            <h3>13308830738</h3>
        </div>
        <div class="slide-contact">
            <h4><img src="/images/icon15.png">客服QQ：</h4>
            <h3>1165439888</h3>
        </div>
        <div class="erweima">
            <img src="/images/erweima.jpg">
        </div>
        <a href="javascript:;" class="slide-close close-btn"></a>
    </div>
</div>
<div class="slide-bar slide-right">
    <div class="slide-bg"></div>
    <div class="slide-con">
        <div class="slide-img">
            <img src="/images/logo1.png">
        </div>
        <div class="tit">
            <img src="/images/title.png">
        </div>
        <a href="#" class="to-game">立即游戏</a>
        <div class="slide-contact">
            <h4><img src="/images/icon14.png">热线电话：</h4>
            <h3>13308830738</h3>
        </div>
        <div class="slide-contact">
            <h4><img src="/images/icon15.png">客服QQ：</h4>
            <h3>1165439888</h3>
        </div>
        <div class="erweima">
            <img src="/images/erweima.jpg">
        </div>
        <a href="javascript:;" class="slide-close close-btn"></a>
    </div>
</div>
<!-- 侧边栏 End! -->

<!-- 弹窗 Start! -->
<div class="filter-bg index-popup">
    <div class="popup">
        <a href="javascript:;" class="popup-close close-btn"></a>
        <div class="popup-con">
            <p>祝您2018年中秋佳节快乐、抢红包赢豪礼，参加优惠活动好运连连。</p>
            <img src="/images/popup-img.jpg">
        </div>
    </div>
</div>
<!-- 弹窗 End! -->

<script type="text/javascript">
    $(function(){
        $("#login-btn").click(function(){
            $.ajax({
                url:"<?php echo Url::toRoute(['/site/login']); ?>",
                type:"post",
                data:$("#saveForm").serialize(),
                dataType: 'json',
                success:function(data){
                    if(data.result=="success"){
                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);
                        window.location.href = "<?php echo Url::toRoute(['/site/member']); ?>";
                    }else{
                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);
                        alert(data.info);
                    }
                }
            });
        })
    })

    $(function(){

        setTimeout(function(){
            $('.index-popup').fadeIn();
        },1000);

        setTimeout(function(){
            if($('.index-popup').is(':visible')){
                $('.index-popup').fadeOut();
            }
        },6000);

        $('.slide-close').on('click',function(){
            $(this).parents('.slide-bar').fadeOut();
        })

    });
</script>