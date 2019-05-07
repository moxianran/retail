
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

            <div class="ibox-content m-b-sm border-bottom">
                <form id="searchForm" action="" method="get">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="product_name">台号</label>
                                <input type="text" name="platform_id" value="<?php echo $get['platform_id'] ?? '' ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="price">靴号</label>
                                <input type="text" name="series_id" value="<?php echo $get['series_id'] ?? '' ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="quantity">局号</label>
                                <input type="text" name="game_id" value="<?php echo $get['game_id'] ?? '' ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="user_id">会员</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="0" <?php if(!isset($get['user_id']) || $get['user_id'] == '0' ) { echo ' selected="selected"';}?>>全部</option>

                                    <?php
                                    if(isset($user) && !empty($user)) {
                                        foreach($user as $k => $v) {
                                    ?>
                                            <option value="<?php echo $v['id'] ?>"  <?php
                                            if(isset($get['user_id']) && $get['user_id'] == $v['id'] ) { echo ' selected="selected"';}?>
                                            ><?php echo $v['real_name'] ?></option>
                                    <?php
                                        }}
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 m-b-xs">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" name="start" value="<?php echo $start; ?>">
                                <span class="input-group-addon">至</span>
                                <input type="text" class="input-sm form-control" name="end" value="<?php echo $end; ?>">
                            </div>
                        </div>

<!--                        <div class="col-sm-9 m-b-xs">-->
<!--                            <div class="btn-group btn-group-toggle" data-toggle="buttons">-->
<!--                                <label onclick="goList(1);" class="btn btn-sm btn-white ">-->
<!--                                    <input type="radio" name="options" autocomplete="off" > 今日-->
<!--                                </label>-->
<!--                                <label onclick="goList(2);" class="btn btn-sm btn-white">-->
<!--                                    <input type="radio" name="options" autocomplete="off"> 昨日-->
<!--                                </label>-->
<!--                                <label onclick="goList(3);" class="btn btn-sm btn-white ">-->
<!--                                    <input type="radio" name="options" autocomplete="off"> 本周-->
<!--                                </label>-->
<!--                                <label onclick="goList(4);" class="btn btn-sm btn-white ">-->
<!--                                    <input type="radio" name="options" autocomplete="off"> 上周-->
<!--                                </label>-->
<!--                                <label onclick="goList(5);" class="btn btn-sm btn-white ">-->
<!--                                    <input type="radio" name="options" autocomplete="off"> 本月-->
<!--                                </label>-->
<!--                                <label onclick="goList(6);" class="btn btn-sm btn-white ">-->
<!--                                    <input type="radio" name="options" autocomplete="off"> 上月-->
<!--                                </label>-->
<!--                                <label onclick="goList(7);" class="btn btn-sm btn-white ">-->
<!--                                    <input type="radio" name="options" autocomplete="off"> 本季度-->
<!--                                </label>-->
<!--                                <label onclick="goList(8);" class="btn btn-sm btn-white ">-->
<!--                                    <input type="radio" name="options" autocomplete="off"> 上季度-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="col-sm-9"></div>-->
                        <div class="col-sm-3">
                            <div class="input-group">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-primary">查询</button>
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
                            <h5>投注记录</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>编号</th>
                                        <th>游戏</th>
                                        <th>台号</th>
                                        <th>靴号</th>
                                        <th>局好</th>
                                        <th>会员</th>
                                        <th>投注信息</th>
                                        <th>投注时间</th>
                                        <th>投注金额</th>
                                        <th>投注结果</th>
                                        <th>洗码量</th>
                                        <th>结算时间</th>
                                        <th>结算金额</th>
                                        <th>账号余额</th>
                                        <th>区域</th>
                                        <th>其他</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(isset($list) && $list) {
                                        foreach ($list as $k=>$v) {
                                            ?>
                                            <tr class="gradeX">
                                                <td><?php echo $v['id'] ?></td>
                                                <td><?php echo $v['game_title'] ?></td>
                                                <td><?php echo $v['platform_id'] ?></td>
                                                <td><?php echo $v['series_id'] ?></td>
                                                <td><?php echo $v['game_id'] ?></td>
                                                <td><?php echo $v['userName'] ?></td>
                                                <td><?php echo $v['bet_desc'] ?></td>
                                                <td><?php echo date("Y-m-d H:i:s",$v['bet_time']); ?></td>
                                                <td><?php echo $v['bet_money'] / 100 ?></td>
                                                <td><?php echo $v['bet_result'] ?></td>
                                                <td><?php echo $v['code_clear_num'] ?></td>
                                                <td><?php echo date("Y-m-d H:i:s",$v['settlement_time']); ?></td>
                                                <td><?php echo $v['settlement_money'] / 100 ?></td>
                                                <td><?php echo $v['account_money'] ?></td>
                                                <td><?php echo $v['area'] ?></td>
                                                <td><?php echo $v['other'] ?></td>
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

