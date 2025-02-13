<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/personal_center.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧个人中心-->
        <div class="content left">
            <!--会员信息及试用押金说明-->
            <div class="member_power">
                <!--个人信息-->
                <div class="left personal_details">
                    <div class="left  avatar">
                        <img src="images/merchant/sj_grzx_icon_touxiang_default.png" alt="">
                    </div>
                    <div class="left username">
                        <h1><?php echo $sellerinfo['account']?></h1>
                        <p>会员等级：<span>试用会员</span> <b><?php echo substr($sellerinfo['end_time'],0,10);?>到期</b></p>
                        <input type="button" value="购买正式会员"/>
                    </div>
                </div>
                <!--试用任务-->
                <div class="left try_task">
                    <div class="try_monery">
                        <input type="button" value="发布试用任务"/>
                        可用押金：<span><?php echo $sellerinfo['avail_deposit']?></span>元
                        <a href="#">充值押金</a>
                        冻结押金：<span><?php echo $sellerinfo['freeze_deposit']?></span>元
                    </div>
                    <p>
                        押&nbsp; &nbsp;&nbsp; &nbsp;金：可用来支付平台一切费用，可提现。
                    </p>
                    <p>
                        冻结押金：试用任务中支付的押金和保证金费用，试用任务结束，押金打给试客，保证金返还到银行卡上。
                    </p>
                </div>
            </div>
            <!--任务说明-->
            <div class="task_specification">
                <h1>
                    <span>任务进展</span>
                    下方如有提示请点击操作，超过48小时未操作，平台自动确认。
                </h1>
                <!--所有订单的状态种类-->
                <div class="order_status">
                    <ul>
                        <li class="order"><a <?php if(!$order_status):?>class="personal_active" <?php endif;?> href="/merchant_personal?order_status=0">所有订单（<span><?php echo $sum_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 1):?>class="personal_active" <?php endif;?> href="/merchant_personal?order_status=1">待发货订单（<span><?php echo $sum_1_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 2):?>class="personal_active" <?php endif;?> href="/merchant_personal?order_status=2">已审核评价订单（<span><?php echo $sum_2_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 3):?>class="personal_active" <?php endif;?> href="/merchant_personal?order_status=3">待确认评价订单（<span><?php echo $sum_3_order_list['count'];?></span>）</a></li>
                    </ul>
                </div>
                <!--商品发货状态-->
                <?php foreach($order_list as $v):?>
                    <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span><?php echo substr($sellerinfo['end_time'],0,10);?></span>
                            <span>任务编号：<?php echo $v['order_id'];?></span>
                            <span>淘宝商品订单号：<?php echo $v['out_sorderid']?></span>
                        </p>
                        <p class="right">
                            <a href="#">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="images/merchant/order_<?php echo $v['order_id'];?>.png" alt=""></li>
                            <li>
                                <p class="clothes_name"><?php echo $v['product_name'];?>
                                <p class="two"><span>店铺：</span><?php echo $v['shopname'];?></p>
                                <p><span>来源：</span><?php  echo ($v['platform_id']==1 ? '淘宝':'天猫');?></p>
                            </li>
                            <li>
                                <p><span>试客：</span><?php echo $v['shikename'];?></p>
                            </li>

                            <?php if($v['status'] == 1):?>
                            <li>
                                <p>待发货</p>
                            </li>
                            <li>
                                <p class="status" id="delivery" onclick="show_deliver_modal(<?php echo $v['order_id'];?>);"><input type="button" value="确认发货"/></p>
                                <p><span>还剩48小时00分00秒</span></p>
                            </li>
                            <?php endif;?>

                            <?php if($v['status'] == 2):?>
                                 <li>
                                <p>待审核</p>
                            </li>
                            <li>
                                <p class="status" id="audit" onclick="show_audit_modal(<?php echo $v['order_id'];?>);"><input type="button" value="确认审核"/></p>
                                <p><span>还剩48小时00分00秒</span></p>
                            </li>
                            <?php endif;?>

                            <?php if($v['status'] == 3):?>
                                <li>
                                <p>待确认评价</p>
                            </li>
                            <li>
                                <p class="status"><!-- <input type="button" value="确认评价"/> --></p>
                                <p><span>还剩48小时00分00秒</span></p>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
                <?php endforeach ?>
               <!--  <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span>2016.11.18</span>
                            <span>任务编号：123460000</span>
                            <span>淘宝商品订单号：2222222222</span>
                        </p>
                        <p class="right">
                            <a href="#">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="images/merchant/sj_grzx_bg_sp_default.png" alt=""></li>
                            <li>
                                <p class="clothes_name">韩版冬季连帽外套女中长款宽松加厚棉衣xcsdcdsvcdp/>
                                <p class="two"><span>店铺：</span>夏季尼官方旗舰店</p>
                                <p><span>来源：</span>淘宝</p>
                            </li>
                            <li>
                                <p><span>试客：</span>li***ying</p>
                            </li>
                            <li>
                                <p>待发货</p>
                            </li>
                            <li>
                                <p class="status" id="delivery"><input type="button" value="确认发货"/></p>
                                <p><span>还剩48小时00分00秒</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span>2016.11.18</span>
                            <span>任务编号：123460000</span>
                            <span>淘宝商品订单号：2222222222</span>
                        </p>
                        <p class="right">
                            <a href="#">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="images/merchant/sj_grzx_bg_sp_default.png" alt=""></li>
                            <li>
                                <p class="clothes_name">韩版冬季连帽外套女中长款宽松加厚棉衣xcsdcdsvcdp/>
                                <p class="two"><span>店铺：</span>夏季尼官方旗舰店</p>
                                <p><span>来源：</span>淘宝</p>
                            </li>
                            <li>
                                <p><span>试客：</span>li***ying</p>
                            </li>
                            <li>
                                <p>待发货</p>
                            </li>
                            <li>
                                <p class="status">试用待领取</p>
                                <p><span>还剩48小时00分00秒</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span>2016.11.18</span>
                            <span>任务编号：123460000</span>
                            <span>淘宝商品订单号：2222222222</span>
                        </p>
                        <p class="right">
                            <a href="#">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="images/merchant/sj_grzx_bg_sp_default.png" alt=""></li>
                            <li>
                                <p class="clothes_name">韩版冬季连帽外套女中长款宽松加厚棉衣xcsdcdsvcdp/>
                                <p class="two"><span>店铺：</span>夏季尼官方旗舰店</p>
                                <p><span>来源：</span>淘宝</p>
                            </li>
                            <li>
                                <p><span>试客：</span>li***ying</p>
                            </li>
                            <li>
                                <p>待发货</p>
                            </li>
                            <li>
                                <p class="status">试用待领取</p>
                                <p><span>联系客服QQ:</span><a href="javascript:void(0);"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span>2016.11.18</span>
                            <span>任务编号：123460000</span>
                            <span>淘宝商品订单号：2222222222</span>
                        </p>
                        <p class="right">
                            <a href="#">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="images/merchant/sj_grzx_bg_sp_default.png" alt=""></li>
                            <li>
                                <p class="clothes_name">韩版冬季连帽外套女中长款宽松加厚棉衣xcsdcdsvcdp/>
                                <p class="two"><span>店铺：</span>夏季尼官方旗舰店</p>
                                <p><span>来源：</span>淘宝</p>
                            </li>
                            <li>
                                <p><span>试客：</span>li***ying</p>
                            </li>
                            <li>
                                <p>待发货</p>
                            </li>
                            <li>
                                <p class="status" id="audit"><input type="button" value="审核通过"/></p>
                                <p><span>还剩48小时00分00秒</span></p>
                            </li>
                        </ul>
                    </div>
                </div> -->

                <!--查看更多按钮-->
                <div class="see_more">
                    <input onclick="location.href='0303_order_manage.html'" type="button"/>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="hidden_orderid">
<footer id="footer"></footer>
<!--弹框--确认发货-->
<div class="delivery_modal ">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>确认发货</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认发货-->
            <div class="confirm_delivery" action="">
                <label for="logistics">物&nbsp; &nbsp;流</label>
                <input id="logistics" type="text"/>
                <p><span>物流不能为空</span></p>
                <label for="waybill_number">运单号</label>
                <input id="waybill_number" type="text"/>
                <p><span></span></p>
            </div>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="post_yundan()">
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--弹框--确认审核-->
<div class="audit_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>确认审核</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认审核-->
           <p class="confirm_audit">确认审核通过</p>
        </div>
        <div class="modal_submit">
            <input type="button" value="确定通过" onclick="post_shenhe()"/>
            <input class="confirm" type="button" value="取消"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>

<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/modal_scrollbar.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
        $('#left_nav').load("../common/left_nav.html");
//        标题的点击事件
        $('.order').bind('click',function(){
            $(this).find('a').addClass('personal_active');
            $(this).siblings().find('a').removeClass('personal_active');
        });
//          弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        确认发货
        // $('#delivery').bind('click',function(){
        //     $('.delivery_modal').css('display','block');
        //     disableScroll();
        // });
//        确认审核
        // $('#audit').bind('click',function(){
        //     $('.audit_modal').css('display','block');
        //     disableScroll();
        // });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.delivery_modal,.audit_modal').css('display','none');
            enableScroll();
        });
    })
</script>
<script>
    function post_yundan(){
        var wuliu = $("#logistics").val();
        var yundan = $("#waybill_number").val();
        var order_id = $("#hidden_orderid").val();
        $.ajax({
        url : admin.url+'merchant_personal/update_confirm_ship',
        data:{wuliu:wuliu,yundan:yundan,order_id:order_id},
        type : 'post',
        cache : false,
        success : function (data){
            console.log(data);
            if(data == 'true'){
                alert("确认发货成功");
                location.reload();
            }
            else{
                alert("确认发货失败");
            }
        },
        error : function (XMLHttpRequest, textStatus){
            alert(2);
        }
    })
    }

    function post_shenhe(){
        var order_id = $("#hidden_orderid").val();
        $.ajax({
        url : admin.url+'merchant_personal/update_shenhe',
        data:{order_id:order_id},
        type : 'post',
        cache : false,
        success : function (data){
            console.log(data);
            if(data == 'true'){
                alert("确认审核成功");
                location.reload();
            }
            else{
                alert("确认审核失败");
            }
        },
        error : function (XMLHttpRequest, textStatus){
            alert(2);
        }
    })
    }

    function show_deliver_modal(o){
        $('.delivery_modal').css('display','block');
        disableScroll();
        $('#hidden_orderid').val(o);
    }

    function show_audit_modal(o){
        $('.audit_modal').css('display','block');
        disableScroll();
        $('#hidden_orderid').val(o);
    }
    // function post_yundan(){
    //     var wuliu = $("#logistics").val();
    //     var yundan = $("#waybill_number").val();
    //     var order_id = $("#hidden_orderid").val();
    //     $.ajax({
    //     url : admin.url+'merchant_personal/update_confirm_ship',
    //     data:{wuliu:wuliu,yundan:yundan,order_id:order_id},
    //     type : 'post',
    //     cache : false,
    //     success : function (data){
    //         console.log(data);
    //         if(data == 'true'){
    //             alert("确认发货成功");
    //             location.reload();
    //         }
    //         else{
    //             alert("确认发货失败");
    //         }
    //     },
    //     error : function (XMLHttpRequest, textStatus){
    //         alert(2);
    //     }
    // })
    // }
</script>
</body>
</html>









