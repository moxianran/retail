<?php
use yii\helpers\Url;
?><!-- 轮播图 Start! -->
<div id="banner" class="page-banner join-banner register-banner">
    <img src="/images/banner7.jpg">
</div>
<!-- 轮播图 End! -->

<!-- 公告 Start! -->
<?= $this->render('_notice',['gameNotice' => $gameNotice]) ?>
<!-- 公告 End! -->

<!-- 内容 Start! -->
<div class="page-content register page-bg1">
    <div class="public-page container">
        <div class="public-menu fl">
            <div class="menu-title"><img src="/images/title4.png"></div>
            <ul class="clearfix">
                <li class="on"><a href="#">MG电子</a></li>
                <li><a href="#">PT电子</a></li>
                <li><a href="#">BBIN电子</a></li>
                <li><a href="<?php echo Url::toRoute(['/site/casino']); ?>">真人视讯</a></li>
                <li><a href="<?php echo Url::toRoute(['/site/sport']); ?>">体育赛事</a></li>
                <li><a href="<?php echo Url::toRoute(['/site/lottery']); ?>">彩票游戏</a></li>
                <li><a href="#">手机投注</a></li>
                <li><a href="#">AG捕鱼王</a></li>
                <li><a href="#">新霸老虎机</a></li>
            </ul>
            <a href="/" class="menu-logo"><img src="/images/logo2.png"></a>
        </div>
        <div class="public-con fr">
            <!-- <div class="public-page-title register-page-title"><span>账号注册</span></div> -->
            <div class="register-page">
                <div class="welcome-text">
                    <h4>太阳城集团会00081.com真诚的欢迎您!</h4>
                    <p>1. 全网独家时时返水，即玩即送，一键领取返水；</p>
                    <p>2. 服务器全面升级，无需额度转换，充值即可玩各类游戏；</p>
                    <p>3. 每期香港六合彩，神秘特码78.5倍；</p>
                    <p>4. 使用公司入款，入款成功率100%；</p>
                    <p>5. 24小时提款0审核0冻结0手续费不限提款次数，存取款0-3分钟火速到账；</p>
                </div>
                <a href="javascript:;" class="welcome-close"></a>
                <form id="saveForm">
                    <div class="reg-box">
                        <div class="reg-title"><img src="/images/ricon1.png">注册信息</div>
                        <ul>
                            <li class="row">
                                <div class="col-sm-3 col-md-2 name required">会员帐号</div>
                                <div class="col-sm-9 col-md-4 col-lg-5 input">
                                    <input type="text" name="account" placeholder="2 - 15 字符，字母开头，限字母，数字和底线" autocomplete="off">
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-sm-3 col-md-2 name required">会员密码</div>
                                <div class="col-sm-9 col-md-4 col-lg-5 input">
                                    <input type="text" name="pwd" placeholder="6 个字符以上，须包含字母及数字" autocomplete="off">
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-sm-3 col-md-2 name required">确认密码</div>
                                <div class="col-sm-9 col-md-4 col-lg-5 input">
                                    <input type="text" name="pwd_again" placeholder="请确认会员密​​码" autocomplete="off">
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-sm-3 col-md-2 name required">取款密​​码</div>
                                <div class="col-sm-9 col-md-4 col-lg-5 input">
                                    <input type="text" name="money_pwd" placeholder="请确认取款密​​码" autocomplete="off">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="reg-box">
                        <div class="reg-title"><img src="/images/ricon2.png">会员信息</div>
                        <ul>
                            <li class="row">
                                <div class="col-sm-3 col-md-2 name">真实姓名</div>
                                <div class="col-sm-9 col-md-4 col-lg-5 input">
                                    <input type="text" name="real_name" placeholder="必须与提款的银行户口相同，否则无法提款" autocomplete="off">
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-sm-3 col-md-2 name required">手机号码</div>
                                <div class="col-sm-9 col-md-4 col-lg-5 input">
                                    <input type="text" name="phone" placeholder="请输入您的手机号码" autocomplete="off">
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-sm-3 col-md-2 name">QQ/微信</div>
                                <div class="col-sm-9 col-md-4 col-lg-5 input">
                                    <input type="text" name="qq" placeholder="请输入您的QQ或者微信号，非微信昵称" autocomplete="off">
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-sm-3 col-md-2 name required">验证码</div>
                                <div class="col-sm-9 col-md-4 col-lg-5 input ver-code">
                                    <input type="text" name="code" placeholder="请输入验证码" autocomplete="off">
                                    <a href="javascript:;" class="ver-img">
                                        <img src="<?php echo Url::toRoute(['/site/code']); ?>">
                                    </a>
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 treaty">
                                    <input type="checkbox" id="Treaty" name="agree">
                                    <label for="Treaty">我已届满合法博彩年龄，且同意各项。
                                        <a href="javascript:;" class="treaty-show">注册条约</a>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="reg-btns">
                        <button type="button" class="submit-btn" id="register_btn">提交</button>
                        <button type="button" class="reset-btn">重置</button>
                    </div>
                </form>
                <div class="remarks">
                    <h4>备注：</h4>
                    <p>标记有<span>★</span>者为必填项目。</p>
                    <p>手机与取款密码为取款金额时的凭证,请会员务必填写详细资料。</p>
                    <p>若公司有其他活动会E-MAIL通知，请客户填写清楚。</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 End! -->

<!-- 开户协议弹窗 Start! -->
<div class="filter-bg opening-treaty">
    <div class="popup">
        <a href="javascript:;" class="popup-close close-btn"></a>
        <div class="popup-con">
            <div class="title"><img src="/images/title6.png"></div>
            <div class="treaty-con">
                <P>1. 在开户后进行一次有效存款，恭喜您成为【太阳城集团】有效会员！</P>
                <P>2. 存款免手续费，开户最低入款金额100人民币。</P>
                <P>3.【太阳城集团】严禁会员有重复申请账号行为，每位玩家、每一住址 、每一电子邮箱、每一电话号码、相同支付卡/信用卡号码，及共享计算机环境(例如网吧、其他公共用计算机等)只能拥有一个帐户数据。</P>
                <P>4.【太阳城集团】是提供互联网投注服务的机构。请会员在注册前参考当地政府的法律，在博彩不被允许的地区，如有会员在【太阳城集团】注册、下注，为会员个人行为，【太阳城集团】不负责、承担任何相关责任。</P>
                <P>5. 无论是个人或是团体，如有任何威胁、滥用【太阳城集团】名义的行为，【太阳城集团】保留权利取消、收回玩家账号。</P>
                <P>6. 玩家注册信息有争议时，为确保双方利益、杜绝身份盗用行为，【太阳城集团】保留权利要求客户向我们提供充足有效的档，并以各种方式辨别客户是否符合资格享有我们的任何优惠。</P>
                <h4>本公司是使用GPK所提供的在线娱乐软件，若发现您在同系统的娱乐城上开设多个会员账户，并进行套利下注；本公司有权取消您的会员账号并将所有下注营利取消！</h4>
            </div>
        </div>
    </div>
</div>
<!-- 开户协议弹窗 End! -->

<!-- 注册成功弹窗 Start! -->
<div class="filter-bg reg-success">
    <div class="popup">
        <a href="javascript:;" class="popup-close close-btn"></a>
        <div class="popup-con">
            <div class="title"><img src="/images/title7.png"></div>
            <div class="reg-success-box">
                <p>注册成功，请联系客服激活帐号!!!</p>
                <div class="reg-success-btns">
                    <a href="/">返回首页</a>
                    <a href="#">联系客服</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 注册成功弹窗 End! -->

<!-- 表单错误弹窗 Start! -->
<div class="filter-bg reg-error">
    <div class="popup">
        <a href="javascript:;" class="popup-close close-btn"></a>
        <div class="popup-con">
            <div class="title"><img src="/images/title8.png"></div>
            <div class="reg-error-box">
                <p>手机号格式不正确!</p>
            </div>
        </div>
    </div>
</div>
<!-- 表单错误弹窗 End! -->

<script type="text/javascript">
    $(function(){

        $('.treaty-show').on('click',function(){
            $('.opening-treaty').fadeIn();
        });

        // $('.submit-btn').on('click',function(){
        //     $('.reg-success').fadeIn();
        // });

        $('.welcome-close').on('click',function(){
            $(this).hide();
            $('.welcome-text').hide();
        })



        //注册
        $("#register_btn").click(function(){
            $.ajax({
                url:"<?php echo Url::toRoute(['/site/register']); ?>",
                type:"post",
                data:$("#saveForm").serialize(),
                dataType: 'json',
                success:function(data){
                    if(data.result=="success"){

                        $("#saveForm input").val("");

                        //禁用提交按钮。防止点击起来没完
                        $('#register_btn').attr('disabled',false);
                        $('.reg-success').fadeIn();
                    }else{
                        //禁用提交按钮。防止点击起来没完
                        $('#register_btn').attr('disabled',false);
                        alert(data.info);
                    }
                }
            });
        })

    });
</script>