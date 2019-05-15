<?php
use yii\helpers\Url;
?>
<!-- 公告 Start! -->
<?= $this->render('_notice',['gameNotice' => $gameNotice]) ?>
<!-- 公告 End! -->

<!-- 内容 Start! -->
<div class="page-content">
    <div class="public-page container">
        <div class="public-menu fl">
            <div class="menu-title"><img src="/images/title4.png"></div>
            <ul class="clearfix">
                <li class="on"><a href="#">账户管理</a></li>
                <li><a href="#">在线取款</a></li>
                <li><a href="#">在线存款</a></li>
                <li><a href="#">充值记录</a></li>
                <li><a href="#">投注记录</a></li>
                <li><a href="#">登录记录</a></li>
                <li><a href="#">公告信息<span>(2)</span></a></li>
            </ul>
            <a href="/" class="menu-logo"><img src="/images/logo2.png"></a>
        </div>
        <div class="public-con fr">
            <div class="public-page-title"><span>账户管理</span></div>
            <div class="account">
                <div class="info-box">
                    <ul class="row">
                        <li class="col-md-6">
                            <img src="/images/aicon1.png">
                            <span>真实姓名：<?php echo $user['real_name']; ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon2.png">
                            <span>手机号码：<?php echo $user['phone']; ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon3.png">
                            <span>电子邮箱：<?php echo $user['email']; ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon4.png">
                            <span>社交账号：<?php echo $user['qq']; ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon7.png">
                            <span>会员密码：<?php echo base64_decode($user['pwd']); ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon8.png">
                            <span>取款密码：<?php echo base64_decode($user['money_pwd']); ?></span>
                            <a href="javascript:;" class="edit-btn"></a>
                        </li>
                        <li class="col-xs-12">
                            <div class="deadline"></div>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon5.png">
                            <span>当前余额：￥<?php echo $user['money']; ?></span>
                        </li>
                        <li class="col-md-6">
                            <img src="/images/aicon5.png">
                            <span>可用余额：￥<?php echo $user['money']; ?></span>
                        </li>
                        <li class="col-xs-12">
                            <img src="/images/aicon9.png">
                            <span>游戏账户：     腾龙厅：123456    百胜厅：123456    帝宝厅：123456    华美厅：123456</span>
                        </li>
                        <li class="col-xs-12">
                            <img src="/images/aicon10.png">
                            <span>游戏密码：     以上各厅游戏密码统一为cs+手机尾数后4位数</span>
                        </li>
                        <!-- <li class="col-md-6 col-md-offset-6 info-btns">
                            <a href="#" class="modify-login">修改登录密码</a>
                            <a href="#" class="modify-withdraw">修改取款密码</a>
                        </li> -->
                    </ul>
                </div>
                <div class="record">
                    <h4>游戏记录</h4>
                    <form class="date-form row">
                        <div class="input col-sm-5">
                            <span>从</span>
                            <input type="text" id="startDate1">
                        </div>
                        <div class="input col-sm-5">
                            <span>到</span>
                            <input type="text" id="endDate1">
                        </div>
                        <div class="button col-sm-2">
                            <button>查询</button>
                        </div>
                    </form>
                    <div class="table-wrapper">
                        <table class="record-table1">
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
                            <tbody>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-blue">庄</td>
                                <td class="text-red">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-red">庄</td>
                                <td class="text-blue">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-blue">庄</td>
                                <td class="text-red">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-red">庄</td>
                                <td class="text-blue">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-blue">庄</td>
                                <td class="text-red">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-red">庄</td>
                                <td class="text-blue">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-blue">庄</td>
                                <td class="text-red">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-red">庄</td>
                                <td class="text-blue">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-blue">庄</td>
                                <td class="text-red">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>百</td>
                                <td>68</td>
                                <td>2591</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>10</td>
                                <td>0</td>
                                <td class="text-red">庄</td>
                                <td class="text-blue">-10</td>
                                <td>1057.9</td>
                                <td>2018-10-06 14:36:24</td>
                                <td>233.104.238.1</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="record-controll clearfix">
                        <div class="result fl">
                            <span>总输赢：-942.1</span>
                            <span>本页输赢：-100</span>
                        </div>
                        <div class="record-page fr">
                            <span>第1页共5页总86录每页20录</span>
                            <a href="#">首 页</a>
                            <a href="#">上一页</a>
                            <a href="#">下一页</a>
                            <a href="#">末 页</a>
                        </div>
                    </div>
                </div>
                <div class="record">
                    <h4>充值记录</h4>
                    <form class="date-form row">
                        <div class="input col-sm-5">
                            <span>从</span>
                            <input type="text" id="startDate2">
                        </div>
                        <div class="input col-sm-5">
                            <span>到</span>
                            <input type="text" id="endDate2">
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
                            <tbody>
                            <tr>
                                <td>103103456021</td>
                                <td>账户充值</td>
                                <td>1000</td>
                                <td>1007.9</td>
                                <td>2018-10-10 17:23</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>账户充值</td>
                                <td>1000</td>
                                <td>1007.9</td>
                                <td>2018-10-10 17:23</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>账户充值</td>
                                <td>1000</td>
                                <td>1007.9</td>
                                <td>2018-10-10 17:23</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>账户充值</td>
                                <td>1000</td>
                                <td>1007.9</td>
                                <td>2018-10-10 17:23</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>账户充值</td>
                                <td>1000</td>
                                <td>1007.9</td>
                                <td>2018-10-10 17:23</td>
                            </tr>
                            <tr>
                                <td>103103456021</td>
                                <td>账户充值</td>
                                <td>1000</td>
                                <td>1007.9</td>
                                <td>2018-10-10 17:23</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="record-controll clearfix">
                        <div class="record-page fr">
                            <span>第1页共5页总86录每页20录</span>
                            <a href="#">首 页</a>
                            <a href="#">上一页</a>
                            <a href="#">下一页</a>
                            <a href="#">末 页</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 End! -->

<script type="text/javascript">
    $(function(){

        layui.use('laydate', function(){
            var laydate = layui.laydate;

            laydate.render({
                elem: '#startDate1',
                theme: '#222222',
            });

            laydate.render({
                elem: '#endDate1',
                theme: '#222222',
            });

            laydate.render({
                elem: '#startDate2',
                theme: '#222222',
            });

            laydate.render({
                elem: '#endDate2',
                theme: '#222222',
            });
        });

    });
</script>