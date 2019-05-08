
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-3" onclick="excel('user')">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">导出会员信息</h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> 会员信息
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3" onclick="excel('agent')">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">导出代理信息</h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> 代理信息
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3" onclick="excel('customer')">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">导出客服信息</h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> 客服信息
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3" onclick="excel('director')">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">导出主管信息</h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> 主管信息
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-3" onclick="excel('bet')">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">导出投注记录</h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> 投注记录
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3" onclick="excel('result')">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">导出输赢记录</h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> 输赢记录
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3" onclick="excel('recharge')">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">导出充值记录</h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> 充值记录
                    </h2>
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

<!-- Sparkline -->
<script src="/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Peity -->
<script src="/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>

<script>
    function excel(info){
        window.location.href="/super/export/export-"+info;
    }
</script>
</body>
</html>
