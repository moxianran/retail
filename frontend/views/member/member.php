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
            <div class="public-page-title"><span>账户管理</span><span class="logout_btn" style="float:right;cursor: pointer">退出登录</span></div>
            <div class="account">
                <div class="info-box">
                    <ul class="row">
                        <li class="col-md-6">
                            <img src="/images/aicon1.png">
                            <span>真实姓名：
                                <b><?php echo $user['real_name']; ?></b>
                                <input type="text" data-field="real_name" class="iptEdit" value="<?php echo $user['real_name']; ?>" style="display: none;"/>
                            </span>
                            <a href="javascript:;" class="edit-btn" ></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon2.png">
                            <span>手机号码：<b>
                                    <?php echo $user['phone']; ?></b>
                            <input type="text" data-field="phone" class="iptEdit" value="<?php echo $user['phone']; ?>" style="display: none;"/>
                            </span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon3.png">
                            <span>电子邮箱：<b><?php echo $user['email']; ?></b>

                            <input type="text" data-field="email" class="iptEdit" value="<?php echo $user['email']; ?>" style="display: none;"/>
                            </span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon4.png">
                            <span>社交账号：<b><?php echo $user['qq']; ?></b>

                            <input type="text" data-field="qq" class="iptEdit" value="<?php echo $user['qq']; ?>" style="display: none;"/>
                            </span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon7.png">
                            <span>会员密码：<b>******</b>
                            <input type="text" data-field="pwd" class="iptEdit" value="<?php echo base64_decode($user['pwd']); ?>" style="display: none;"/>
                            </span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon8.png">
                            <span>取款密码：
                                <b>******</b>
                                                            <input type="text" data-field="money_pwd" class="iptEdit" value="<?php echo base64_decode($user['money_pwd']); ?>" style="display: none;"/>
                            </span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-xs-12">
                            <div class="deadline"></div>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon5.png">
                            <span>当前余额：￥<?php echo $user['money'] / 100; ?></span>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon5.png">
                            <span>可用余额：￥<?php echo $user['money'] / 100; ?></span>
                        </li>
                        <li class="col-xs-12">
                            <img src="/images/aicon9.png">
                            <span>游戏账户：     <?php echo $gameInfo ?></span>
                        </li>
                        <li class="col-xs-12">
                            <img src="/images/aicon10.png">
                            <span>游戏密码：     以上各厅游戏密码统一为cs+手机尾数后4位数
                            <input type="text" name="jjj" id="jjj" />
                            </span>
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
        $(".edit-btn").click(function(){
            $(this).prev().children("input").show()
            $(this).prev().children("b").hide()
        })
    })

    $(".iptEdit").blur(function () {

        var oldVal = $(this).prev().html();
        var field = $(this).attr("data-field");
        var newVal = $(this).val();

        console.log(newVal);

        var a = $(this);
        $.ajax({
            url:"<?php echo Url::toRoute(['/member/edit']); ?>",
            type:"post",
            data:{
                field:field,
                newVal:newVal
            },
            dataType: 'json',
            success:function(data){
                $('#formSubmit').attr('disabled',true);

                if(data.result=="success"){
                    a.prev().html("******");
                }else{

                    a.val(oldVal);
                    a.prev().html("******");

                    layui.use('layer', function(){
                        var layer = layui.layer;
                        layer.msg('操作失败');
                    });

                }
            }
        });
        $(this).prev().show()

        $(this).hide()
    });

    $(".logout_btn").click(function(){
        $.ajax({
            url:"<?php echo Url::toRoute(['/site/logout']); ?>",
            type:"get",
            data:{},
            dataType: 'json',
            success:function(data){
                window.location.href = "<?php echo Url::toRoute(['/']); ?>";
            }
        });
    })

</script>