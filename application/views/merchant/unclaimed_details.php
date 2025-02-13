<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>试用订单管理</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/order_details.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--订单详情-->
    <div class="order_details">
        <!--所在位置-->
        <div class="location_title">
            <ul>
                <li>你所在的位置：</li>
                <li class="order">
                    <a class="personal_active" href="01_personal_center.html">个人中心</a>
                </li>
                <li class="order"><img src="../../images/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a href="0303_order_manage.html">试用订单管理</a>
                </li>
                <li class="order"><img src="../../images/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">订单详情</li>
            </ul>
        </div>
        <!--商品发货状态-->
        <div class="commodity_information">
            <h1>试用信息：</h1>
            <div class="title">
                        <p class="left">
                            <span>2016.11.18</span>
                            <span>活动订单号：123460000</span>
                        </p>
                    </div>
            <div class="details">
                <ul>
                    <li><img src="../../images/sj_grzx_bg_sp_default.png" alt=""></li>
                    <li>
                        <p>商品名称：<span>韩版冬季连帽外套女中长款宽松加厚棉衣xcsdcdsvcd</span></p>
                        <p>商品规格：<span>米色.M</span></p>
                        <p>商品分类：<span><a href="javascript:void(0);">https://wwww.yuntuigpi.com</a></span></p>
                    </li>
                    <li>
                        <p>店铺名称：<span>yingyingyingyingyingyingying</span></p>
                        <p>商品分类：<span>女装</span></p>
                        <p>平台：<span>淘宝</span></p>
                    </li>
                    <li>
                        <p>单间：<span><b>&yen;100.00</b>每单拍 <b>1</b>个</span></p>
                        <p>试用总份数：<span><b>5份</b></span></p>
                        <p>商品运费：<span>全国包邮</span></p>
                    </li>
                    <li>
                        <p>试客：<span>ying****9999</span></p>
                    </li>
                </ul>
            </div>
            <h1>申请信息：</h1>
            <div class="application_information">
                <p class="no_information">暂无申请信息</p>
            </div>
            <!--订单状态-->
            <div class="order_status">
                <p>订单状态：<span>待领取</span></p>
                <p>联系客服：<img src="../../images/sj_grzx_icon_qq_default.png" alt=""></p>
            </div>

        </div>
    </div>
</section>
<footer id="footer"></footer>
<!--弹框--确认发货-->
<div class="delivery_modal ">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>确认发货</span>
            <a class="close" href="javascript:void(0);">
                <img src="../../images/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认发货-->
            <form class="confirm_delivery" action="">
                <label for="logistics">物&nbsp; &nbsp;流</label>
                <input id="logistics" type="text"/>
                <p><span>物流不能为空</span></p>
                <label for="waybill_number">运单号</label>
                <input id="waybill_number" type="text"/>
                <p><span></span></p>
            </form>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>

<script src="../../js/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
        $('#left_nav').load("../common/left_nav.html");

    })
</script>
</body>
</html>









