<?php
use yii\helpers\Url;
?>
<!-- 轮播图 Start! -->
<div id="banner" class="page-banner join-banner">
    <img src="/images/banner7.jpg">
</div>
<!-- 轮播图 End! -->

<!-- 公告 Start! -->
<?= $this->render('_notice',['gameNotice' => $gameNotice]) ?>
<!-- 公告 End! -->

<!-- 内容 Start! -->
<div class="page-content join page-bg5">
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
            <div class="public-page-title"><span>合作加盟</span></div>
            <div class="join-page">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">方案</li>
                        <li>协议</li>
                        <li>代理注册</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                            <div class="programme public-text">
                                <div class="advantage">
                                    <h4>选择【太阳城集团新式代理】的八大优势</h4>
                                    <p>代理佣金天天结算 不计输赢返佣无上限！欢迎加入新式代理，为梦想创造可能，让梦想照进现实！</p>
                                    <p>1. 独立的易记域名给代理推广</p>
                                    <p>2. 佣金可以一天结算一次</p>
                                    <p>3. 不计输赢，无累积！百分百盈利！</p>
                                    <p>4. 提供免费注册彩金赠送下线会员</p>
                                    <p>5. 我们的电子优惠特别多，客户更喜欢我们的平台</p>
                                    <p>6. 专员一对一教您如何做好代理，发展会员！手把手教程，让您发展无忧！</p>
                                    <p>7. 平台多元化，客户可以根据自己喜欢的平台进行游戏</p>
                                    <p>8. 微信、支付宝支付更加便捷！出款速度快！国际老品牌！客户放心！</p>
                                </div>
                                <br>
                                <h4>代理方案一【真人视讯】：</h4>
                                <table>
                                    <thead>
                                    <tr>
                                        <th>真人视讯和跟对子占打码百分比</th>
                                        <th>有效会员人数</th>
                                        <th>退佣比例</th>
                                        <th>派送方式</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <td>2%以上</td>
                                        <td>5或以上</td>
                                        <td>0.10%</td>
                                        <td rowspan="5"><div class="text">太阳城集团会以每日中午16:30-19:00（北京时间）进行代理入款与流水佣金结算【当日结算】结算完成会自动转到您的账户里面，您可以直接取款或者放在账户里面继续娱乐赚钱</div></td>
                                    </tr>
                                    <tr>
                                        <td>5%以上</td>
                                        <td>5或以上</td>
                                        <td>0.20%</td>
                                    </tr>
                                    <tr>
                                        <td>10%以上</td>
                                        <td>10或以上</td>
                                        <td>0.30%</td>
                                    </tr>
                                    <tr>
                                        <td>15%以上</td>
                                        <td>10或以上</td>
                                        <td>0.40%</td>
                                    </tr>
                                    <tr>
                                        <td>20%以上</td>
                                        <td>15或以上</td>
                                        <td>0.50%</td>
                                    </tr>
                                </table>
                                <p>例： 当天代理线下会员总打码量1000000，其中对子跟和占总打码5%,有效会员为5人退佣为2000元</p>
                                <p>当天代理线下会员总打码量1000000，其中对子跟和占总打码10%,有效会员为5人退佣为2000元</p>
                                <p>当天代理线下会员总打码量1000000，其中对子跟和占总打码10%,有效会员为10人退佣为3000元</p>
                                <br>
                                <h4>代理方案二【电子（不包含桌面游戏）、捕鱼、棋牌】：</h4>
                                <table>
                                    <thead>
                                    <tr>
                                        <th>有效会员人数</th>
                                        <th>退佣比例</th>
                                        <th>派送方式</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <td>5或以上</td>
                                        <td>0.10%</td>
                                        <td rowspan="5"><div class="text">太阳城集团会以每日中午16:30-19:00（北京时间）进行代理入款与流水佣金结算【当日结算】结算完成会自动转到您的账户里面，您可以直接取款或者放在账户里面继续娱乐赚钱</div></td>
                                    </tr>
                                    <tr>
                                        <td>5或以上</td>
                                        <td>0.20%</td>
                                    </tr>
                                    <tr>
                                        <td>10或以上</td>
                                        <td>0.30%</td>
                                    </tr>
                                    <tr>
                                        <td>10或以上</td>
                                        <td>0.40%</td>
                                    </tr>
                                    <tr>
                                        <td>15或以上</td>
                                        <td>0.50%</td>
                                    </tr>
                                </table>
                                <p>例： 当天代理线下会员总打码量1000000，其中有效会员为10人退佣为2000元</p>
                                <br>
                                <p>太阳城集团为您打造了全新的代理模式！ 您只需通过网络发展或介绍身边朋友加入并成为我们的会员，即可安在家中坐收高额回报！</p>
                                <p>佣金天天结算、无需申请，每天自动派送至代理绑定的会员账号内，可直接提款；</p>
                                <p>代理赚取佣金</p>
                                <p>如何成为代理，如何发展下线会员</p>
                                <p>请加我们的代理主管QQ：1511811111手把手教您发展线下会员，盈利更多佣金</p>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="agreement public-text">
                                <br>
                                <div class="agreement-tit">联盟协议</div>
                                <br><br>
                                <h4>一、太阳城集团对代理联盟的权利与义务</h4>
                                <p>太阳城集团的客服部会登记联盟的会员并观察他们的投注情况。联盟及会员必须同意并遵守太阳城集团的会员条例、政策及操作程序。太阳城集团保留拒绝或冻结联盟/会员账户权利</p>
                                <p>代理联盟可随时登入介面观察旗下会员下注情况及会员在网站的活动情况。太阳城集团的客服部会根据代理联盟旗下的会员计算所得佣金。</p>
                                <p>太阳城集团保留可以修改合约书上任何条例，包括：现有的佣金范围、佣金计划、及参考设计的权利，太阳城集团会以电邮、网站公告等方法通知代理联盟。代理联盟对于所做的修改有异议，代理联盟可选择终止合约，或洽客服人员反映意见。如果修改后代理联盟无任何异议，便视作默认合约修改，代理联盟必须遵守更改后的相关规定。</p>
                                <br><br>
                                <h4>二、太阳城集团对代理联盟的权利与义务</h4>
                                <p>太阳城集团的客服部会登记联盟的会员并观察他们的投注情况。联盟及会员必须同意并遵守太阳城集团的会员条例、政策及操作程序。太阳城集团保留拒绝或冻结联盟/会员账户权利</p>
                                <p>代理联盟可随时登入介面观察旗下会员下注情况及会员在网站的活动情况。太阳城集团的客服部会根据代理联盟旗下的会员计算所得佣金。</p>
                                <p>太阳城集团保留可以修改合约书上任何条例，包括：现有的佣金范围、佣金计划、及参考设计的权利，太阳城集团会以电邮、网站公告等方法通知代理联盟。代理联盟对于所做的修改有异议，代理联盟可选择终止合约，或洽客服人员反映意见。如果修改后代理联盟无任何异议，便视作默认合约修改，代理联盟必须遵守更改后的相关规定。</p>
                                <br><br>
                                <h4>三、太阳城集团对代理联盟的权利与义务</h4>
                                <p>
                                <p>太阳城集团保留可以修改合约书上任何条例，包括：现有的佣金范围、佣金计划、及参考设计的权利，太阳城集团会以电邮、网站公告等方法通知代理联盟。代理联盟对于所做的修改有异议，代理联盟可选择终止合约，或洽客服人员反映意见。如果修改后代理联盟无任何异议，便视作默认合约修改，代理联盟必须遵守更改后的相关规定。</p>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="agent_register">
                                <div class="register-page">
                                    <form id="saveForm">
                                        <div class="reg-box">
                                            <div class="reg-title"><img src="/images/ricon1.png">注册信息</div>
                                            <ul>
                                                <li class="row">
                                                    <div class="col-sm-3 col-md-2 name required">代理帐号</div>
                                                    <div class="col-sm-9 col-md-4 col-lg-5 input">
                                                        <input type="text" placeholder="2 - 15字符,字母开头,限字母,数字和底线" name="account">
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-sm-3 col-md-2 name required">代理登录密码</div>
                                                    <div class="col-sm-9 col-md-4 col-lg-5 input">
                                                        <input type="text" placeholder="6 个字符以上,须包含字母及数字" name="pwd">
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-sm-3 col-md-2 name required">确认登录密码</div>
                                                    <div class="col-sm-9 col-md-4 col-lg-5 input">
                                                        <input type="text" placeholder="请确认登录密​​码" name="pwd_again">
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-sm-3 col-md-2 name required">取款密​​码</div>
                                                    <div class="col-sm-9 col-md-4 col-lg-5 input">
                                                        <input type="text" placeholder="请确认取款密​​码" name="money_pwd">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="reg-box">
                                            <div class="reg-title"><img src="/images/ricon2.png">代理信息</div>
                                            <ul>
                                                <li class="row">
                                                    <div class="col-sm-3 col-md-2 name">真实姓名</div>
                                                    <div class="col-sm-9 col-md-4 col-lg-5 input">
                                                        <input type="text" placeholder="必须与提款的银行户口相同,否则无法提款" name="real_name">
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-sm-3 col-md-2 name required">手机号码</div>
                                                    <div class="col-sm-9 col-md-4 col-lg-5 input">
                                                        <input type="text" placeholder="请输入您的手机号码" name="phone">
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-sm-3 col-md-2 name">QQ/微信</div>
                                                    <div class="col-sm-9 col-md-4 col-lg-5 input">
                                                        <input type="text" placeholder="请输入您的QQ或者微信号,非微信昵称" name="qq">
                                                    </div>
                                                </li>
<!--                                                <li class="row">-->
<!--                                                    <div class="col-sm-3 col-md-2 name required">验证码</div>-->
<!--                                                    <div class="col-sm-9 col-md-4 col-lg-5 input ver-code">-->
<!--                                                        <input type="text" placeholder="请输入验证码" name="code">-->
<!--                                                        <a href="javascript:;" class="ver-img">-->
<!--                                                            <img src="/images/ver-img.jpg">-->
<!--                                                        </a>-->
<!--                                                    </div>-->
<!--                                                </li>-->
                                                <li class="row">
                                                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 treaty">
                                                        <input type="checkbox" id="Treaty" name="agree">
                                                        <label for="Treaty">我已届满合法博彩年龄，且同意各项。<a href="javascript:;" class="treaty-show">注册条约</a></label>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 End! -->

<script>

    $("#register_btn").click(function(){
        $.ajax({
            url:"<?php echo Url::toRoute(['/site/join']); ?>",
            type:"post",
            data:$("#saveForm").serialize(),
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#register_btn').attr('disabled',true);
                    alert("注册成功，请等待审核");
                }else{
                    //禁用提交按钮。防止点击起来没完
                    $('#register_btn').attr('disabled',true);
                    alert(data.info);
                }
            }
        });

    })

</script>