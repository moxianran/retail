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
                    <h4>投注记录<span class="logout_btn" style="float:right;cursor: pointer">退出登录</span></h4>
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
                                <th>游戏</th>
                                <th>桌号</th>
                                <th>场</th>
                                <th>次</th>
                                <th>庄/龙</th>
                                <th>闲/虎</th>
                                <th>和</th>
                                <th>庄对/翻</th>
                                <th>闲对/翻</th>
                                <th>结果</th>
                                <th>输赢</th>
                                <th>余额</th>
                                <th>结算时间</th>
                                <th>IP</th>
                            </tr>
                            </thead>
                            <tbody id="dataBody">
                            <?php
                            if ($bet) {
                                foreach ($bet as $k => $v) {
                            ?>
                            <tr>
                                <td><?php echo $v['account']; ?></td>
                                <td><?php echo $v['gameTitle']; ?></td>
                                <td><?php echo $v['series_id']; ?></td>
                                <td><?php echo $v['platform_id']; ?></td>
                                <td><?php echo $v['inning_id']; ?></td>
                                <td><?php if($v['bet_door'] == 1) { echo $v['bet_money'];} else { echo 0;}  ?></td>
                                <td><?php if($v['bet_door'] == 2) { echo $v['bet_money'];} else { echo 0;}  ?></td>
                                <td><?php if($v['bet_door'] == 3) { echo $v['bet_money'];} else { echo 0;}  ?></td>
                                <td><?php if($v['bet_door'] == 4) { echo $v['bet_money'];} else { echo 0;}  ?></td>
                                <td><?php if($v['bet_door'] == 5) { echo $v['bet_money'];} else { echo 0;}  ?></td>

                                <?php
                                if($v['bet_result'] == 1) {
                                    echo '<td class="text-red">庄</td>';
                                } else if($v['bet_result'] == 2){
                                    echo '<td class="text-red">闲</td>';
                                } else if($v['bet_result'] == 3){
                                    echo '<td class="text-red">平</td>';
                                } else if($v['bet_result'] == 4){
                                    echo '<td class="text-red">庄对</td>';
                                } else if($v['bet_result'] == 5){
                                    echo '<td class="text-red">闲对</td>';
                                }
                                ?>

                                <td class="text-red"><?php echo $v['result_money'] / 100 ; ?></td>
                                <td><?php echo $v['account_money'] / 100; ?></td>
                                <td><?php echo date("Y-m-d H:i:s",$v['create_time']); ?></td>
                                <td><?php echo $v['ip']; ?></td>
                            </tr>
                            <?php
                                }}
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="record-controll clearfix">
                        <div class="result fl">
                            <span>总输赢：<?php echo $allResult ?></span>
                            <span>本页输赢：<?php echo $pageResult ?></span>
                        </div>
                        <div class="record-page fr" style=" <?php if($totalPage == 1) { echo "display:none";} ?>">
                            <span>第<?php echo $page ?>页 共<?php echo $totalPage ?>页 总<?php echo $count ?>录 每页10录</span>
                            <a <?php if($page <= 1) { echo 'style="display:none"';} ?> href="<?php echo Url::toRoute(['/member/bet','page'=>1,'startDate'=>$startDate,'endDate'=>$endDate]); ?>">首 页</a>
                            <a <?php if($page <= 1) { echo 'style="display:none"';} ?>
                                    href="<?php echo Url::toRoute(['/member/bet','page'=>$page -1,'startDate'=>$startDate,'endDate'=>$endDate]); ?>">上一页</a>
                            <a <?php if($page >= $totalPage) { echo 'style="display:none"';} ?> href="<?php echo Url::toRoute(['/member/bet','page'=>$page+1,'startDate'=>$startDate,'endDate'=>$endDate]); ?>"
                                >下一页</a>
                            <a <?php if($page >= $totalPage) { echo 'style="display:none"';} ?>
                                    href="<?php echo Url::toRoute(['/member/bet','page'=>$totalPage,'startDate'=>$startDate,'endDate'=>$endDate]); ?>"
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