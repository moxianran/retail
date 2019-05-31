
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

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="game">游戏类型</label>
                            <select name="game" id="game" class="form-control">
                                <option value="0" <?php if(!isset($get['game']) || $get['game'] == '0' ) { echo ' selected="selected"';}?>>全部</option>

                                <?php
                                if(isset($game) && !empty($game)) {
                                    foreach($game as $k => $v) {
                                        ?>
                                        <option value="<?php echo $k ?>"  <?php
                                        if(isset($get['game']) && $get['game'] == $k ) { echo ' selected="selected"';}?>
                                        ><?php echo $v; ?></option>
                                        <?php
                                    }}
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="type">结算类型</label>
                            <select name="type" id="type" class="form-control">
                                <option value="0" <?php if(!isset($get['type']) || $get['type'] == '0' ) { echo ' selected="selected"';}?>>全部</option>

                                <?php
                                if(isset($settlement_type) && !empty($settlement_type)) {
                                    foreach($settlement_type as $k => $v) {
                                        ?>
                                        <option value="<?php echo $k; ?>"  <?php
                                        if(isset($get['type']) && $get['type'] == $k ) { echo ' selected="selected"';}?>
                                        ><?php echo $v ?></option>
                                        <?php
                                    }}
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="user_id">代理</label>
                            <select name="agent_id" id="agent_id" class="form-control">
                                <option value="0" <?php if(!isset($get['agent_id']) || $get['agent_id'] == '0' ) { echo ' selected="selected"';}?>>全部</option>

                                <?php
                                if(isset($agent) && !empty($agent)) {
                                    foreach($agent as $k => $v) {
                                        ?>
                                        <option value="<?php echo $v['id'] ?>"  <?php
                                        if(isset($get['agent_id']) && $get['agent_id'] == $v['id'] ) { echo ' selected="selected"';}?>
                                        ><?php echo $v['real_name'] ?></option>
                                        <?php
                                    }}
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
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
                        <div class="form-group">
                            <label class="control-label" for="user_id">充值时间</label>
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" name="start" value="<?php echo $start; ?>">
                                <span class="input-group-addon">至</span>
                                <input type="text" class="input-sm form-control" name="end" value="<?php echo $end; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label class="control-label" for="user_id">.</label>
                            <div class="input-group">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-primary">查询</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>充值记录</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>会员账号</th>
                                    <th>游戏厅</th>
                                    <th>结算类型</th>
                                    <th>上级代理</th>
                                    <th>操作员</th>
                                    <th>充值时间</th>
                                    <th>操作ip</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($list) && $list) {
                                    foreach ($list as $k=>$v) {
                                ?>
                                        <tr class="gradeX">
                                            <td><?php echo $v['id'] ?></td>
                                            <td><?php echo $v['userAccount'] ?></td>
                                            <td><?php echo $v['gameName'] ?></td>
                                            <td><?php echo $v['settlement_type'] ?></td>
                                            <td><?php echo $v['agentAccount'] ?></td>
                                            <td><?php echo $v['operator_id'] ?></td>
                                            <td><?php echo date("Y-m-d H:i:s",$v['create_time']); ?></td>
                                            <td><?php echo $v['ip'] ?></td>

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


    
</script>

