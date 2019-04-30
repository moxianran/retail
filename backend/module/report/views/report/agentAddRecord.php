<div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="/img/a7.jpg">
                                    </a>
                                    <div class="media-body">
                                        <small class="float-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="/img/a4.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="float-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="/img/profile.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="float-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html" class="dropdown-item">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="float-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="profile.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="float-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="grid_options.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="float-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html" class="dropdown-item">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>代理新增记录</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">首页</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>代理新增记录</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>代理新增记录</strong>
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
                            <h5>代理新增记录</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-4 m-b-xs">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label onclick="goList(1);" class="btn btn-sm btn-white <?php echo $type == 1 ? ' active' : '' ?>">
                                            <input type="radio" autocomplete="off" > 今日
                                        </label>
                                        <label onclick="goList(2);" class="btn btn-sm btn-white <?php echo $type == 2 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 昨日
                                        </label>
                                        <label onclick="goList(3);" class="btn btn-sm btn-white <?php echo $type == 3 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 本周
                                        </label>
                                        <label onclick="goList(4);" class="btn btn-sm btn-white <?php echo $type == 4 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 上周
                                        </label>
                                        <label onclick="goList(5);" class="btn btn-sm btn-white <?php echo $type == 5 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 本月
                                        </label>
                                        <label onclick="goList(6);" class="btn btn-sm btn-white <?php echo $type == 6 ? ' active' : '' ?>">
                                            <input type="radio" name="options autocomplete="off"> 上月
                                        </label>
                                        <label onclick="goList(7);" class="btn btn-sm btn-white <?php echo $type == 7 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 本季度
                                        </label>
                                        <label onclick="goList(8);" class="btn btn-sm btn-white <?php echo $type == 8 ? ' active' : '' ?>">
                                            <input type="radio" name="options" autocomplete="off"> 上季度
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>代理账号</th>
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
                                                <td><?php echo $v['email'] ?></td>
                                                <td><?php echo $v['register_ip'] ?></td>
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
        window.location.href="/report/report/agent-add-record?type="+type;

    }

    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

