<?php
use yii\helpers\Url;

?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">主页</a>
            </li>
            <li class="breadcrumb-item">
                <a><?php echo $moduleTitle; ?></a>
            </li>
            <li class="breadcrumb-item active">
                <strong><?php echo $title; ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="saveForm" action="post">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

                        <div class="form-group  row"><label class="col-sm-2 col-form-label">代理账号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="account"
                                       value="<?php echo $data['account']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">登录密码</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pwd"
                                       value="" placeholder="******" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label">真实姓名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="real_name"
                                       value="<?php echo $data['real_name']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">手机号码</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone"
                                       value="<?php echo $data['phone']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">电子邮箱</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email"
                                       value="<?php echo $data['email']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">qq</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="qq"
                                       value="<?php echo $data['qq']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">微信</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="wechat"
                                       value="<?php echo $data['wechat']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label">禁止登陆</label>
                            <div class="col-sm-10">
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" name="stop_login_start" value="
                                    <?php echo date("m/d/Y",$data['stop_login_start']); ?>">
                                    <span class="input-group-addon">至</span>
                                    <input type="text" class="input-sm form-control" name="stop_login_end" value="
                                    <?php echo date("m/d/Y",$data['stop_login_end']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="col-sm-3 m-b-xs">

                        </div>


                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm" type="button" id="btn_save">保存</button>
                                <button class="btn btn-primary btn-sm" type="button" onclick="history.go(-1)">返回</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Mainly scripts -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<script>

    $('.input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: false
    });

    $(function(){
        $("#btn_save").click(function(){

            $.ajax({
                url:"<?php echo Url::toRoute(['/customer/customer/edit']); ?>",
                type:"post",
                data:$("#saveForm").serialize(),
                dataType: 'json',
                success:function(data){
                    if(data.result=="success"){
                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);
                        window.location.href = "<?php echo Url::toRoute(['/customer/customer/list']); ?>";
                    }else{
                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);
                    }
                }
            });
        })
    })

    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>

</html>
