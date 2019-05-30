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

    <div class="ibox-content m-b-sm border-bottom">
        <form id="searchForm" action="" method="get">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="real_name">姓名</label>
                        <input type="text" name="real_name" value="<?php echo $get['real_name'] ?? '' ?>" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="domain">域名</label>
                        <input type="text" name="domain" value="<?php echo $get['domain'] ?? '' ?>" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="phone">电话</label>
                        <input type="text" name="phone" value="<?php echo $get['phone'] ?? '' ?>" class="form-control" autocomplete="off">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-sm btn-primary">查询</button>
                             <?php
                             if($this->params['position_id'] == 1 || in_array(127,$this->params['power_id'])) {
                                 ?>
                                 <button type="button" class="btn btn-primary" id="export">导出客服列表</button>
                                 <?php
                             }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo $title; ?></h5>
                    <div class="ibox-tools" style="top:10px">
                        <?php
                        if($this->params['position_id'] == 1 || in_array(30,$this->params['power_id'])) {
                            ?>
                            <a class="btn btn-primary btn-sm" href="<?php echo Url::toRoute(['/customer/customer/create']); ?>">新增</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th>序号</th>
                                <th>客服帐号</th>
                                <th>真实姓名</th>
                                <th>手机号码</th>
                                <th>电子邮箱</th>
                                <th>qq</th>
                                <th>微信</th>
                                <th>注册时间</th>
                                <th>注册区域IP</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($list) && $list) {
                                foreach ($list as $k=>$v) {
                                    ?>
                                    <tr class="gradeX">
                                        <td><?php echo $v['id'] ?></td>
                                        <td><?php echo $v['account'] ?></td>
                                        <td><?php echo $v['real_name'] ?></td>
                                        <td><?php echo $v['phone'] ?></td>
                                        <td><?php echo $v['email'] ?></td>
                                        <td><?php echo $v['qq'] ?></td>
                                        <td><?php echo $v['wechat'] ?></td>
                                        <td><?php echo date("Y-m-d H:i:s",$v['create_time']) ?></td>
                                        <td><?php echo $v['create_ip'] ?></td>
                                        <td><?php if($v['status'] == 1) { echo "正常";} else { echo "已禁用";}  ?></td>

                                        <td class="center">

                                    <?php
                                    if($this->params['position_id'] == 1 || in_array(32,$this->params['power_id'])) {
                                        ?>
                                        <?php
                                        if ($v['status'] == 1) {
                                            ?>
                                            <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                    onclick="changeStatus(<?php echo $v['id'] ?>,2)">
                                                <strong>禁用</strong>
                                            </button>
                                            <?php
                                        } else {
                                            ?>
                                            <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                    onclick="changeStatus(<?php echo $v['id'] ?>,1)">
                                                <strong>恢复正常</strong>
                                            </button>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                    }
                                        ?>

                                    <?php
                                    if($this->params['position_id'] == 1 || in_array(31,$this->params['power_id'])) {
                                        ?>
                                        <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                onclick="goEdit(<?php echo $v['id'] ?>)">
                                            <strong>编辑</strong>
                                        </button>

                                        <?php
                                    }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php
                                }}
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="group">
                        <ul class="qinco-pagination pagination-lg">
                            <?php
                            echo yii\widgets\LinkPager::widget([
                                'pagination' => $pagination,
                            ]);
                            ?>
                        </ul>
                    </div>
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

<!-- Peity -->
<script src="/js/plugins/peity/jquery.peity.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->


<script>

    $(function(){
        $("#export").click(function(){
            window.location.href="/customer/customer/export-customer";
        })
    })

    function goEdit(id) {
        window.location.href="/customer/customer/edit?id="+id;
    }

    function changeStatus(id,status)
    {
        $.ajax({
            url:"<?php echo Url::toRoute(['/customer/customer/change-status']); ?>",
            type:"post",
            data:{
                id:id,
                status:status,
            },
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
    }


    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>




