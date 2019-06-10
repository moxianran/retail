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
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">会员账号</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="account" autocomplete="off">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">登录密码</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pwd" autocomplete="off">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">取款密码</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="money_pwd" autocomplete="off">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">真实姓名</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="real_name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">手机号码</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" autocomplete="off">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">电子邮箱</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" autocomplete="off">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">社交账号</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="qq" autocomplete="off">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group  row"><label class="col-sm-2 col-form-label">银行卡号</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="bank_id" autocomplete="off">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">注册域名</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="domain" autocomplete="off">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">上级代理</label>
                                    <div class="col-sm-3">
                                        <select class="form-control m-b" name="agent_id1">
                                            <option value="0">暂无</option>
                                            <?php
                                            if(isset($agentList1) && $agentList1) {
                                                foreach ($agentList1 as $k => $v) {
                                            ?>
                                            <option value="<?php echo $v['id'] ?>"><?php echo $v['real_name'] ?></option>

                                            <?php
                                                }}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control m-b" name="agent_id2">
                                            <option value="0">暂无</option>

                                            <?php
                                            if(isset($agentList2) && $agentList2) {
                                                foreach ($agentList2 as $k => $v) {
                                                    ?>
                                                    <option value="<?php echo $v['id'] ?>"><?php echo $v['real_name'] ?></option>
                                                    <?php
                                                }}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control m-b" name="agent_id3">
                                            <option value="0">暂无</option>

                                            <?php
                                            if(isset($agentList3) && $agentList3) {
                                                foreach ($agentList3 as $k => $v) {
                                                    ?>
                                                    <option value="<?php echo $v['id'] ?>"><?php echo $v['real_name'] ?></option>

                                                    <?php
                                                }}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">状态</label>
                                    <div class="col-sm-2">
                                        <select class="form-control m-b" name="is_stop">
                                                <option value="2">正常</option>
                                                <option value="1">停用</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group  row"><label class="col-sm-2 col-form-label">游戏账号</label>
                                    <div class="col-sm-10">

                                        <?php
                                        foreach ($gameList as $k => $v) {
                                            ?>
                                            <?php echo $v ?>
                                            : <input type="text" class="form-control" name="game[<?php echo $k;?>]" autocomplete="off">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

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

<script>

    $(function(){
        $("#btn_save").click(function(){

            $.ajax({
                url:"<?php echo Url::toRoute(['/user/user/create']); ?>",
                type:"post",
                data:$("#saveForm").serialize(),
                dataType: 'json',
                success:function(data){
                    if(data.result=="success"){
                        window.location.href = "<?php echo Url::toRoute(['/user/examine/examine']); ?>";
                    }else{
                        alert(data.info);
                    }
                }
            });
        })
    })
</script>