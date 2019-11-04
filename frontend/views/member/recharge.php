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
                    <h4>充值记录<span class="logout_btn" style="float:right;cursor: pointer">退出登录</span></h4>
                    <form class="date-form row" action="">
                        <div class="input col-sm-5">
                            <span>从</span>
                            <input type="text" id="startDate" name="startDate" value="<?php echo $startDate; ?>">
                        </div>
                        <div class="input col-sm-5">
                            <span>到</span>
                            <input type="text" id="endDate" name="endDate" value="<?php echo $endDate; ?>">
                        </div>
                        <div class="button col-sm-2">
                            <button>查询</button>
                        </div>
                    </form>
                    <div class="table-wrapper">
                        <table class="record-table2">
                            <thead>
                            <tr>
                                <th>账户名</th>
                                <th>操作类型</th>
                                <th>金额</th>
                                <th>操作后金额</th>
                                <th>时间</th>
                            </tr>
                            </thead>
                            <tbody id="dataBody">
                            <?php
                            if ($recharge) {
                                foreach ($recharge as $k => $v) {
                            ?>
                            <tr>
                                <td><?php echo $v['account']; ?></td>
                                <td>账户充值</td>
                                <td><?php echo $v['money'] / 100; ?></td>
                                <td><?php echo $v['balance'] / 100; ?></td>
                                <td><?php echo date("Y-m-d H:i:s",$v['create_time']); ?></td>
                            </tr>
                            <?php
                                }}
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="record-controll clearfix">
                        <div class="record-page fr" style=" <?php if($totalPage == 1) { echo "display:none";} ?>">
                            <span>第<?php echo $page ?>页 共<?php echo $totalPage ?>页 总<?php echo $count ?>录 每页10录</span>
                            <a <?php if($page <= 1) { echo 'style="display:none"';} ?> href="<?php echo Url::toRoute(['/member/recharge','page'=>1,'startDate'=>$startDate,'endDate'=>$endDate]); ?>">首 页</a>
                            <a <?php if($page <= 1) { echo 'style="display:none"';} ?>
                                    href="<?php echo Url::toRoute(['/member/recharge','page'=>$page -1,'startDate'=>$startDate,'endDate'=>$endDate]); ?>">上一页</a>
                            <a <?php if($page >= $totalPage) { echo 'style="display:none"';} ?> href="<?php echo Url::toRoute(['/member/recharge','page'=>$page+1,'startDate'=>$startDate,'endDate'=>$endDate]); ?>"
                                >下一页</a>
                            <a <?php if($page >= $totalPage) { echo 'style="display:none"';} ?>
                                    href="<?php echo Url::toRoute(['/member/recharge','page'=>$totalPage,'startDate'=>$startDate,'endDate'=>$endDate]); ?>"
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

        layui.use('laydate', function () {
            var laydate = layui.laydate;

            laydate.render({
                elem: '#startDate',
                theme: '#222222',
            });

            laydate.render({
                elem: '#endDate',
                theme: '#222222',
            });

        });


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