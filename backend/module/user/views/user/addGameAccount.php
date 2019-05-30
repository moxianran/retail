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
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="saveForm" action="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <?php
                        foreach ($allGame as $k => $v) {
                            ?>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label"><?php echo $v['name'] ?></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="<?php echo $v['id'] ?>"
                                       value="<?php echo $data[$v['id']] ?? ''; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <?php
                        }
                        ?>

                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm" type="button" id="btn_save">保存</button>
                            </div>
                        </div>
                    </form>
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

<!-- Custom and plugin javascript -->
<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="/js/plugins/iCheck/icheck.min.js"></script>
<script>


    $(function(){
        $("#btn_save").click(function(){

            $.ajax({
                url:"<?php echo Url::toRoute(['/user/user/add-game-account']); ?>",
                type:"post",
                data:$("#saveForm").serialize(),
                dataType: 'json',
                success:function(data){
                    if(data.result=="success"){
                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);
                        window.location.href = "<?php echo Url::toRoute(['/user/user/list']); ?>";
                    }else{
                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);
                    }
                }
            });
        })
    })

    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
