<?php
use yii\helpers\Url;
?>

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>会员后台</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">主页</a>
        </li>
        <li class="breadcrumb-item">
            <a>会员后台</a>
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
                <h5>会员后台</h5>
                <div class="ibox-tools">
                    <a class="btn-sm" href="<?php echo Url::toRoute(['/notice/system/create']); ?>">新增</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
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
                        if(isset($list) && $list) {
                            foreach ($list as $k=>$v) {
                        ?>
                            <tr class="gradeX">
                                <td><?php echo $v['id'] ?></td>
                                <td><?php echo $v['title'] ?></td>
                                <td><?php echo $v['content'] ?></td>
                                <td><?php echo $v['status'] == 1 ? "正常" : '禁用' ;?></td>
                                <td><?php echo date("Y-m-d H:i:s",$v['create_time']) ?></td>

                                <td class="center">

                                    <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                            onclick="goEdit(<?php echo $v['id'] ?>)" >
                                        <strong href="<?php echo Url::toRoute(['/notice/system/edit','id'=>$v['id']]); ?>">编辑</strong>
                                    </button>

                                    <?php
                                        if($v['status'] == 1) {
                                    ?>
                                    <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                            onclick="goStop(<?php echo $v['id'] ?>);"
                                    <strong>禁用</strong>
                                    </button>
                                    <?php } else { ?>
                                    <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                            onclick="goOn(<?php echo $v['id'] ?>);"
                                    <strong>恢复</strong>
                                    </button>
                                    <?php } ?>

                                    <button class="btn btn-sm btn-primary m-t-n-xs" type="button"
                                            onclick="goDelete(<?php echo $v['id'] ?>);">
                                        <strong>删除</strong>
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
                            <th>标题</th>
                            <th>内容</th>
                            <th>状态</th>
                            <th>创建时间</th>
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
        window.location.href="/notice/system/edit?id="+id;
    }

    function goStop(id)
    {
        $.ajax({
            url:"<?php echo Url::toRoute(['/notice/system/stop']); ?>",
            type:"post",
            data:{
                id:id
            },
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                    window.location.href = "<?php echo Url::toRoute(['/notice/system/list']); ?>";
                }else{
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                }
            }
        });
    }

    function goOn(id)
    {
        $.ajax({
            url:"<?php echo Url::toRoute(['/notice/system/recovery']); ?>",
            type:"post",
            data:{
                id:id
            },
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                    window.location.href = "<?php echo Url::toRoute(['/notice/system/list']); ?>";
                }else{
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                }
            }
        });
    }

    function goDelete(id)
    {
        $.ajax({
            url:"<?php echo Url::toRoute(['/notice/system/delete']); ?>",
            type:"post",
            data:{
                id:id
            },
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                    window.location.href = "<?php echo Url::toRoute(['/notice/system/list']); ?>";
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
