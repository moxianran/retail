<?php
use yii\helpers\Url;

?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">首页</a>
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
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">会员账号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="account"
                                value="<?php echo $data['account']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">登录密码</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pwd"
                                       value="<?php echo $data['pwd']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">取款密码</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="money_pwd"
                                       value="<?php echo $data['money_pwd']; ?>" autocomplete="off">
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
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">社交账号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="qq"
                                       value="<?php echo $data['qq']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">银行卡号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="bank_id"
                                       value="<?php echo $data['bank_id']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">注册域名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="domain"
                                       value="<?php echo $data['domain']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">上级代理</label>

                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" name="agent_id" autocomplete="off" id="agent_id" value="<?php echo $data['agent_id'] ?>">
                                <input type="text" class="form-control" name="agent_name" autocomplete="off" id="check_agent"
                                       value="<?php echo $up_agent_info['real_name'] ?? '';?>">
                                <div class="col-lg-4 m-l-n check_agent_div1" style="float:left;display: none;">
                                    <select class="form-control check_agent_select1" multiple="">
                                        <option value="0">暂无</option>
                                        <?php
                                        if (isset($agentList1) && $agentList1) {
                                            foreach ($agentList1 as $k => $v) {
                                                ?>
                                                <option value="<?php echo $v['id'] ?>"><?php echo $v['real_name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-4 m-l-n check_agent_div2" style="float:left;display: none;">
                                    <select class="form-control check_agent_select2" multiple="">

                                    </select>
                                </div>

                                <div class="col-lg-4 m-l-n check_agent_div3" style="float:left;display: none;">
                                    <select class="form-control check_agent_select3" multiple="">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group row"><label class="col-sm-2 col-form-label">状态</label>
                            <div class="col-sm-2">
                                <select class="form-control m-b" name="is_stop">
                                    <option value="2" <?php if(2 == $data['is_stop']){ echo 'selected="selected"';} ?>>正常</option>
                                    <option value="1" <?php if(1 == $data['is_stop']){ echo 'selected="selected"';} ?>>停用</option>
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
                                    : <input type="text" class="form-control" name="game[<?php echo $k;?>]" autocomplete="off" value="<?php if(isset($userGame[$k]) && $userGame[$k]) { echo $userGame[$k];} ?>">
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

<!-- iCheck -->
<script src="/js/plugins/iCheck/icheck.min.js"></script>
<script>


    $(function(){
        $("#btn_save").click(function(){

            $.ajax({
                url:"<?php echo Url::toRoute(['/user/user/edit']); ?>",
                type:"post",
                data:$("#saveForm").serialize(),
                dataType: 'json',
                success:function(data){
                    if(data.result=="success"){

                        window.location.href = "<?php echo Url::toRoute(['/user/user/list']); ?>";
                    }else{
                        alert(data.info);
                    }
                }
            });
        })
    })


    //下拉
    $(function(){

        $("#check_agent").click(function(){
            $(".check_agent_div1").show();
        })

        $(".check_agent_select1").change(function(){

            var agent_id = $(this).val();
            var text = $(this).find("option:selected").text();

            $("#agent_id").val(agent_id);
            $("#check_agent").val(text);

            $.ajax({
                url:"<?php echo Url::toRoute(['/agent/agent/agent-select']); ?>",
                type:"post",
                data:{
                    id:agent_id,
                    agent_level:2
                },
                dataType: 'json',
                success:function(data){

                    var option2 = '';
                    for ( var i = 0; i <data.info.length; i++){
                        console.log(data.info[i].id);
                        option2 += '<option value="'+ data.info[i].id +'">'+  data.info[i].real_name +'</option>';
                    }
                    $(".check_agent_select2").html(option2);
                }
            });

            $(".check_agent_div2").show();
            $(".check_agent_div3").hide();

        });

        $(".check_agent_select2").change(function(){

            var agent_id = $(this).val();
            var text = $(this).find("option:selected").text();

            $("#agent_id").val(agent_id);
            $("#check_agent").val(text);


            $.ajax({
                url:"<?php echo Url::toRoute(['/agent/agent/agent-select']); ?>",
                type:"post",
                data:{
                    id:agent_id,
                    agent_level:3
                },
                dataType: 'json',
                success:function(data){

                    var option3 = '';
                    for ( var i = 0; i <data.info.length; i++){
                        console.log(data.info[i].id);
                        option3 += '<option value="'+ data.info[i].id +'">'+  data.info[i].real_name +'</option>';
                    }
                    $(".check_agent_select3").html(option3);
                }
            });

            $(".check_agent_div3").show();
        });

        $(".check_agent_select3").change(function(){

            var agent_id = $(this).val();
            var text = $(this).find("option:selected").text();

            $("#agent_id").val(agent_id);
            $("#check_agent").val(text);

        });

    })

</script>
