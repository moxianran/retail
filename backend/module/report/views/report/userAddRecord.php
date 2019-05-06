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
                            <h5>会员新增记录</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-4 m-b-xs">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label onclick="goList(1);" class="btn btn-sm btn-white <?php echo isset($type) && $type == 1 ? ' active' : '' ?>">
                                            <input type="radio" autocomplete="off" > 今日
                                        </label>
                                        <label onclick="goList(2);" class="btn btn-sm btn-white <?php echo isset($type) &&  $type == 2 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 昨日
                                        </label>
                                        <label onclick="goList(3);" class="btn btn-sm btn-white <?php echo isset($type) &&  $type == 3 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 本周
                                        </label>
                                        <label onclick="goList(4);" class="btn btn-sm btn-white <?php echo isset($type) &&  $type == 4 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 上周
                                        </label>
                                        <label onclick="goList(5);" class="btn btn-sm btn-white <?php echo isset($type) &&  $type == 5 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 本月
                                        </label>
                                        <label onclick="goList(6);" class="btn btn-sm btn-white <?php echo isset($type) &&  $type == 6 ? ' active' : '' ?>">
                                            <input type="radio" name="options autocomplete="off"> 上月
                                        </label>
                                        <label onclick="goList(7);" class="btn btn-sm btn-white <?php echo isset($type) &&  $type == 7 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 本季度
                                        </label>
                                        <label onclick="goList(8);" class="btn btn-sm btn-white <?php echo isset($type) &&  $type == 8 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 上季度
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>会员账号</th>
                                        <th>真实姓名</th>
                                        <th>手机号码</th>
                                        <th>邮箱</th>
                                        <th>注册时间</th>
                                        <th>注册ip</th>
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
                                                <td><?php echo date("Y-m-d H:i:s",$v['create_time']) ?></td>
                                                <td><?php echo $v['create_ip'] ?></td>
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
<script src="/js/plugins/iCheck/icheck.min.js"></script>

<!-- Peity -->
<script src="/js/demo/peity-demo.js"></script>

<script>

    function goList(type)
    {
        window.location.href="/report/report/user-add-record?type="+type;
    }

    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

