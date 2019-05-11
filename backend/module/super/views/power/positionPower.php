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

                <input type="hidden" id="position_id" value="<?php echo $position_id;?>" />


                <?php
                foreach ($list as $k => $v) {
                if ($v['pid'] == 0) {

                    ?>

                    <div class="ibox-title">
                        <h5><?php echo $v['name']; ?></h5>
                    </div>
                    <div class="ibox-content">

                        <?php

                        for ($i = 0; $i < count($list); $i++) {
                        if($v['id'] == $list[$i]['pid']) {
                            ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"><?php echo $list[$i]['name']; ?></label>

                                <div class="col-sm-10">

                                    <?php
                                    for ($ii = 0; $ii < count($list); $ii++) {
                                    if($list[$i]['id'] == $list[$ii]['pid']) {
                                        ?>
                                        <label>
                                            <input type="checkbox" value="<?php echo $list[$ii]['id']; ?>" class="powerInput[]"
                                            <?php
                                            if(in_array($list[$ii]['id'],$data)) { echo ' checked="checked"';}

                                            ?>

                                            >
                                            <?php echo $list[$ii]['name']; ?>
                                        </label>

                                        <?php
                                    }}
                                    ?>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <?php
                        }}
                        ?>
                    </div>

                    <?php

                }}
                ?>
                <div class="ibox-content">

                <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary btn-sm" type="button" id="savePower">保存</button>
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

<!-- Custom and plugin javascript -->
<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="/js/plugins/iCheck/icheck.min.js"></script>
<script>

    $(function(){


        $("#savePower").click(function(){

            var arr = new Array();
            $('input[type=checkbox]:checked').each(function(i){
                arr[i] = $(this).val();
            });
            var vals = arr.join(",");
            console.log(vals);

            // var powerInput = $('input[type=checkbox]:checked');
            //
            // console.log(powerInput);

            var position_id = $("#position_id").val();

            $.ajax({
                url:"<?php echo Url::toRoute(['/super/power/save-power']); ?>",
                type:"post",
                data:{
                    position_id:position_id,
                    power:arr
                },
                dataType: 'json',
                success:function(data){
                    if(data.result=="success"){
                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);
                        location.reload()
                    }else{
                        //禁用提交按钮。防止点击起来没完
                        $('#formSubmit').attr('disabled',true);
                    }
                }
            });
        })
    })

</script>
</body>

</html>
