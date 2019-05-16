<?php
use yii\helpers\Url;
?>
<!-- 公告 Start! -->
<?= $this->render('_notice',['gameNotice' => $gameNotice]) ?>
<!-- 公告 End! -->

<!-- 内容 Start! -->
<div class="page-content">
    <div class="public-page container">
        <?= $this->render('_fl') ?>
        <div class="public-con fr">
            <div class="public-page-title"><span>账户管理</span></div>
            <div class="account">
                <div class="info-box">
                    <ul class="row">
                        <li class="col-md-6">
                            <img src="/images/aicon1.png">
                            <span>真实姓名：<?php echo $user['real_name']; ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon2.png">
                            <span>手机号码：<?php echo $user['phone']; ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon3.png">
                            <span>电子邮箱：<?php echo $user['email']; ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon4.png">
                            <span>社交账号：<?php echo $user['qq']; ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon7.png">
                            <span>会员密码：<?php echo base64_decode($user['pwd']); ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon8.png">
                            <span>取款密码：<?php echo base64_decode($user['money_pwd']); ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-xs-12">
                            <div class="deadline"></div>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon5.png">
                            <span>当前余额：￥<?php echo $user['money']; ?></span>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon5.png">
                            <span>可用余额：￥<?php echo $user['money']; ?></span>
                        </li>
                        <li class="col-xs-12">
                            <img src="/images/aicon9.png">
                            <span>游戏账户：     腾龙厅：123456    百胜厅：123456    帝宝厅：123456    华美厅：123456</span>
                        </li>
                        <li class="col-xs-12">
                            <img src="/images/aicon10.png">
                            <span>游戏密码：     以上各厅游戏密码统一为cs+手机尾数后4位数</span>
                        </li>
                        <!-- <li class="col-md-6 col-md-offset-6 info-btns">
                            <a href="#" class="modify-login">修改登录密码</a>
                            <a href="#" class="modify-withdraw">修改取款密码</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 End! -->

<script type="text/javascript">
    $(function(){

        layui.use('laydate', function(){
            var laydate = layui.laydate;

            laydate.render({
                elem: '#startDate1',
                theme: '#222222',
            });

            laydate.render({
                elem: '#endDate1',
                theme: '#222222',
            });

            laydate.render({
                elem: '#startDate2',
                theme: '#222222',
            });

            laydate.render({
                elem: '#endDate2',
                theme: '#222222',
            });
        });

    });
</script>