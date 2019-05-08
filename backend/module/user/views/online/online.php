<?php
use yii\helpers\Url;
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">首页</a>
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
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>会员帐号</th>
                                <th>真实姓名</th>
                                <th>登录时间</th>
                                <th>登录区域</th>
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
                                        <td><?php echo date("Y-m-d H:i:s",$v['login_time']) ?></td>
                                        <td><?php echo $v['login_ip'] ?></td>
                                        <td class="center">
                                            <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                    onclick="kickOut(<?php echo $v['id'] ?>)" >
                                                <strong>踢出</strong>
                                            </button>
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


    function kickOut(id)
    {
        $.ajax({
            url:"<?php echo Url::toRoute(['/user/online/kick-out']); ?>",
            type:"post",
            data:{
                id:id,
            },
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                    window.location.href = "<?php echo Url::toRoute(['/user/online/online']); ?>";
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


</script>
</body>
</html>

