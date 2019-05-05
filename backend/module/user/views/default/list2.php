<?php
use yii\helpers\Url;
?>

<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>会员列表</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">主页</a>
                </li>
                <li class="breadcrumb-item">
                    <a>会员列表</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>会员列表</h5>
                        <div class="ibox-tools">
                            <a class="btn-sm" href="<?php echo Url::toRoute(['/user/default/create']); ?>">新增</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>会员帐号</th>
                                    <th>真实姓名</th>
                                    <th>手机号码</th>
                                    <th>电子邮箱</th>
                                    <th>qq</th>
                                    <th>微信</th>
                                    <th>上级代理</th>
                                    <th>注册域名</th>
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
                                            <td><?php echo $v['agent_id'] ?></td>
                                            <td><?php echo $v['register_domain'] ?></td>
                                            <td><?php echo date("Y-m-d H:i:s",$v['register_time']) ?></td>
                                            <td><?php echo $v['register_ip'] ?></td>
                                            <td><?php if($v['is_stop'] == 1) { echo "正常";} else { echo "已禁用";}  ?></td>

                                            <td class="center">
                                                <?php
                                                    if($v['is_stop'] == 1) {
                                                ?>
                                                <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                        onclick="changeStop(<?php echo $v['id'] ?>,2)">
                                                    <strong>禁用</strong>
                                                </button>
                                                <?php
                                                    } else {
                                                ?>
                                                <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                        onclick="changeStop(<?php echo $v['id'] ?>,1)">
                                                    <strong>恢复正常</strong>
                                                </button>
                                                <?php
                                                    }
                                                ?>
                                                <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                                        onclick="goEdit(<?php echo $v['id'] ?>)" >
                                                    <strong>编辑</strong>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }}
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>序号</th>
                                    <th>会员帐号</th>
                                    <th>真实姓名</th>
                                    <th>手机号码</th>
                                    <th>电子邮箱</th>
                                    <th>qq</th>
                                    <th>微信</th>
                                    <th>上级代理</th>
                                    <th>注册域名</th>
                                    <th>注册时间</th>
                                    <th>注册区域IP</th>
                                    <th>操作</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="/js/plugins/dataTables/datatables.min.js"></script>
<script src="/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>

<script>

    function goEdit(id) {
        window.location.href="/user/default/edit?id="+id;
    }

    function changeStop(id,isStop)
    {
        $.ajax({
            url:"<?php echo Url::toRoute(['/user/default/change-stop']); ?>",
            type:"post",
            data:{
                id:id,
                isStop:isStop,
            },
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                    window.location.href = "<?php echo Url::toRoute(['/user/default/list']); ?>";
                }else{
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                }
            }
        });
    }

    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

    });

</script>
</body>
</html>
