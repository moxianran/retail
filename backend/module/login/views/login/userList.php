<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!--    <link href="http://cn.inspinia.cn/html/inspiniaen/css/plugins/toastr/toastr.min.css" rel="stylesheet">-->
    <!--    <link href="http://cn.inspinia.cn/html/inspiniaen/css/animate.css" rel="stylesheet">-->
    <!--    <link href="http://cn.inspinia.cn/html/inspiniaen/css/style.css" rel="stylesheet">-->

</head>

<div class="wrapper wrapper-content animated fadeInRight">


    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">

                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>会员帐号</th>
                                <th>真实姓名</th>
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
                                    </tr>
                                    <?php
                                }}
                            ?>
                            </tbody>
                        </table>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/jquery-3.1.1.min.js"></script>
<!--<script src="/js/popper.min.js"></script>-->
<!--<script src="/js/bootstrap.js"></script>-->
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="/js/plugins/dataTables/datatables.min.js"></script>
<script src="/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>
<script src="http://cn.inspinia.cn/html/inspiniaen/js/plugins/toastr/toastr.min.js"></script>

</body>
</html>


