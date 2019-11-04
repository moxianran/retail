<?php
use yii\helpers\Url;
?>
<!-- 公告 Start! -->
<?= $this->render('_notice', ['gameNotice' => $gameNotice]) ?>
<!-- 公告 End! -->

<!-- 内容 Start! -->
<div class="page-content">
    <div class="public-page container">
        <?= $this->render('_fl') ?>
        <div class="public-con fr">
            <div class="account">
                <div class="record">
                    <h4>登录记录<span class="logout_btn" style="float:right;cursor: pointer">退出登录</span></h4>
                    <div class="table-wrapper">
                        <table class="record-table2">
                            <thead>
                            <tr>
                                <th>时间</th>
                                <th>IP</th>
                            </tr>
                            </thead>
                            <tbody id="dataBody">
                            <?php
                            if ($loginRecord) {
                                foreach ($loginRecord as $k => $v) {
                            ?>
                            <tr>
                                <td><?php echo date("Y-m-d H:i:s",$v['login_time']); ?></td>
                                <td><?php echo $v['login_ip']; ?></td>
                            </tr>
                            <?php
                                }}
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="record-controll clearfix">
                        <div class="record-page fr" style=" <?php if($totalPage <= 1) { echo "display:none";} ?>">
                            <span>第<?php echo $page ?>页 共<?php echo $totalPage ?>页 总<?php echo $count ?>录 每页10录</span>
                            <a href="<?php echo Url::toRoute(['/member/login','page'=>1]); ?>">首 页</a>
                            <a <?php if($page == 1) { echo 'style="display:none"';} ?>
                                    href="<?php echo Url::toRoute(['/member/login','page'=>$page -1]); ?>">上一页</a>
                            <a <?php if($page == $totalPage) { echo 'style="display:none"';} ?> href="<?php echo Url::toRoute(['/member/login','page'=>$page+1]); ?>"
                                >下一页</a>
                            <a <?php if($page == $totalPage) { echo 'style="display:none"';} ?>
                                    href="<?php echo Url::toRoute(['/member/login','page'=>$totalPage]); ?>"
                                >末 页</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 End! -->

<script type="text/javascript">

    $(function () {


        $(".logout_btn").click(function(){
            $.ajax({
                url:"<?php echo Url::toRoute(['/site/logout']); ?>",
                type:"get",
                data:{},
                dataType: 'json',
                success:function(data){
                    window.location.href = "<?php echo Url::toRoute(['/']); ?>";
                }
            });
        })

    });


</script>