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
                    <h5><?php echo $title; ?></h5>
                    <div class="ibox-tools" style="top:10px">
                        <?php
                        if($this->params['position_id'] == 1 || in_array(10,$this->params['power_id'])) {
                            ?>
                            <a class="btn btn-primary btn-sm" href="<?php echo Url::toRoute(['/notice/game/create']); ?>">新增消息</a>
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
                                <th>标题</th>
                                <th>内容</th>
                                <th>状态</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($list) && $list) {
                                foreach ($list as $k => $v) {
                                    ?>
                                    <tr class="gradeX">
                                        <td><?php echo $v['id'] ?></td>
                                        <td><?php echo $v['title'] ?></td>
                                        <td><?php echo $v['content'] ?></td>
                                        <td><?php echo $v['status'] == 1 ? "正常" : '禁用'; ?></td>
                                        <td><?php echo date("Y-m-d H:i:s", $v['create_time']) ?></td>

                                        <td class="center">

                                    <?php
                                    if($this->params['position_id'] == 1 || in_array(11,$this->params['power_id'])) {
                                        ?>
                                            <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                    onclick="goEdit(<?php echo $v['id'] ?>)">
                                                <strong>编辑</strong>
                                            </button>
                                        <?php
                                    }
                                    ?>
                                            <?php
                                            if($this->params['position_id'] == 1 || in_array(12,$this->params['power_id'])) {
                                            ?>
                                            <?php
                                            if ($v['status'] == 1) {
                                                ?>
                                                <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                        onclick="changeStatus(<?php echo $v['id']; ?>,2);"
                                                <strong>禁用</strong>
                                                </button>
                                            <?php } else { ?>
                                                <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                        onclick="changeStatus(<?php echo $v['id'] ?>,1);"
                                                <strong>恢复</strong>
                                                </button>
                                            <?php } ?>

                                            <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                    onclick="changeStatus(<?php echo $v['id'] ?>,3);">
                                                <strong>删除</strong>
                                            </button>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
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
<script src="/js/plugins/iCheck/icheck.min.js"></script>

<!-- Peity -->


<script>

    function goEdit(id) {
        window.location.href="/notice/game/edit?id="+id;
    }

    function changeStatus(id,status)
    {
        $.ajax({
            url:"<?php echo Url::toRoute(['/notice/game/change-status']); ?>",
            type:"post",
            data:{
                id:id,
                status:status
            },
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                    location.reload()
                }else{
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                }
            }
        });
    }
</script>

