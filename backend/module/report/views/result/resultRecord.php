
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
                        <h5>输赢记录</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>类型</th>
                                    <th>账号</th>
                                    <th>姓名</th>
                                    <th>当前余额</th>
                                    <th>投注次数</th>
                                    <th>有效次数</th>
                                    <th>投注金额</th>
                                    <th>有效金额</th>
                                    <th>总洗码量</th>
                                    <th>有效码量</th>
                                    <th>洗码类型</th>
                                    <th>洗码比率</th>
                                    <th>洗码佣金</th>
                                    <th>个人上水金额</th>
                                    <th>公司上水金额</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($list) && $list) {
                                    foreach ($list as $k=>$v) {
                                        ?>
                                        <tr class="gradeX">
                                            <td><?php echo $v['id'] ?></td>
                                            <td><?php echo $v['type'] ?></td>
                                            <td><?php echo $v['account'] ?></td>
                                            <td><?php echo $v['real_name'] ?></td>
                                            <td><?php echo $v['money'] ?></td>
                                            <td><?php echo $v['bet_times'] ?></td>
                                            <td><?php echo $v['success_times'] ?></td>
                                            <td><?php echo $v['bet_money'] ?></td>
                                            <td><?php echo $v['success_money'] ?></td>
                                            <td><?php echo $v['all_clear_code_num'] ?></td>
                                            <td><?php echo $v['success_clear_code_num'] ?></td>
                                            <td><?php echo $v['clear_code_type'] ?></td>
                                            <td><?php echo $v['clear_code_lv'] ?></td>
                                            <td><?php echo $v['clear_code_money'] ?></td>
                                            <td><?php echo $v['person_money'] ?></td>
                                            <td><?php echo $v['company_money'] ?></td>
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

<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>


<script>

    $('.input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });


    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

