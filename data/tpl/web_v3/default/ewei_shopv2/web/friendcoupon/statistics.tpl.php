<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header" style="padding-bottom: 20px">
    当前位置：<span class="text-primary" style="margin-top: 10px">数据统计</span>
</div>


<div class="page-content">
    <div class="page-toolbar row m-b-sm m-t-sm">
        <form action="" method="get">
            <input type="hidden" name="c" value="site">
            <input type="hidden" name="a" value="entry">
            <input type="hidden" name="m" value="ewei_shopv2">
            <input type="hidden" name="do" value="web">
            <input type="hidden" name="r" value="friendcoupon.statistics">
            <div class="col-sm-4 pull-right">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" name="keyword" value="" placeholder="请输入活动名称"> <span class="input-group-btn">
                    <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
                </div>
            </div>
        </form>
    </div>
    <form action="" method="post">
        <table class="table table-hover table-responsive left-align">
            <thead>
            <tr style="text-align: left;">
                <!--<th style="width:25px;text-align: center;"><input type="checkbox"></th>-->
                <th style="width:150px;">活动名称</th>
                <th style="width:150px;">瓜分面额（元）</th>
                <th style="width:100px;">发起总次数</th>
                <th style="width:100px;">成功次数</th>
                <th style="width: 150px;">瓜分总金额</th>
                <th style="width: 100px;">参与人数</th>
                <th style="width: 130px;">活动状态</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(empty($list)) { ?>
            <tr>
                <td colspan="7" style="text-align: center;border-bottom: 1px solid #efefef">无统计记录</td>
            </tr>
            <?php  } else { ?>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                    <tr style="text-align: left;">
                        <td><?php  echo $item['title'];?></td>
                        <td><?php  echo $item['coupon_money'];?></td>
                        <td><?php  echo $item['launches_count'];?></td>
                        <td><?php  echo $item['successCount'];?></td>
                        <td><?php  echo $item['total'];?></td>
                        <td><?php  echo $item['takePartPeopleCount'];?></td>
                        <td>
                            <?php  if($item['deleted'] == 0) { ?>
                                <?php  if($item['status']== -1) { ?>
                                    <?php  if($item['stop_time']) { ?>
                                    手动停止
                                    <?php  } else { ?>
                                    已结束
                                    <?php  } ?>
                                <?php  } else if($item['status'] == 0) { ?>
                                未开始
                                <?php  } else if($item['status'] == 1) { ?>
                                进行中
                                <?php  } ?>
                            <?php  } else { ?>
                                已删除
                            <?php  } ?>
                        </td>
                    </tr>
                <?php  } } ?>
            <?php  } ?>

            </tbody>
        </table>
        <div class="pull-right"><?php  echo $pager;?></div>

    </form>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>