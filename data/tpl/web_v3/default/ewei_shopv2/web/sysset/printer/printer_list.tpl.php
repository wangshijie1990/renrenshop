<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">小票打印机管理</span>
 </div>

<div class="page-content">
    <form action="" method="post">


        <form action="./index.php" method="get" class="form-horizontal form-search" role="form">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="ewei_shopv2" />
            <input type="hidden" name="do" value="web" />
            <input type="hidden" name="r"  value="sysset.printer.printer_list" />
            <div class="page-toolbar ">

                <span class='pull-left'>
            <?php if(cv('sysset.printer.printer_add')) { ?>
               <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('sysset/printer/printer_add')?>"><i class="fa fa-plus"></i> 添加打印机</a>
              <?php  } ?>

                 </span>
                <div class="col-sm-6 pull-right">


                    <div class="input-group">
                        <input type="text" class=" form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">

                                     <button class="btn btn-primary" type="submit"> 搜索</button> </span>
                    </div>

                </div>
            </div>
        </form>


        <?php  if(count($list)>0) { ?>
        <div class="page-table-header">
            <input type='checkbox' />
            <div class="btn-group">
                <?php if(cv('sysset.printer.printer_delete')) { ?>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('sysset/printer/printer_delete')?>">
                    <i class='icow icow-shanchu1'></i> 删除</button>
                <?php  } ?>
            </div>
        </div>
        <table class="table table-responsive table-hover">
            <thead>
            <tr>
                <th style="width:25px;"></th>
                <th >打印机名称</th>
                <th >打印机品牌</th>
                <th style="width: 65px">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr><td>
                <input type='checkbox'   value="<?php  echo $row['id'];?>"/>
            </td>
                <td><?php  echo $row['title'];?></td>
                <td>
                    <span><?php echo isset($printer[$row['type']]) ? $printer[$row['type']] : '未知';?></span>
                </td>
                <td>
                    <?php if(cv('sysset.printer.printer_edit')) { ?>
                    <a class='btn btn-op btn-operation' href="<?php  echo webUrl('sysset/printer/printer_edit', array('id' => $row['id']))?>" >
                        <span data-toggle="tooltip" data-placement="top" data-original-title="<?php if(cv('sysset.printer.printer_edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>">
                            <i class='icow icow-bianji2'></i>
                        </span>
                    </a>
                    <?php  } ?>
                    <?php if(cv('sysset.printer.printer_delete')) { ?>
                    <a class='btn btn-op btn-operation'  data-toggle='ajaxRemove' href="<?php  echo webUrl('sysset/printer/printer_delete', array('id' => $row['id']))?>" data-confirm="确认删除此模板吗？" >
                        <span data-toggle="tooltip" data-placement="top" data-original-title="删除">
                            <i class='icow icow-shanchu1'></i>
                        </span>
                    </a>
                    <?php  } ?>
            </tr>
            <?php  } } ?>

            </tbody>
            <tfoot>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                            <div class="btn-group">
                                <?php if(cv('sysset.printer.printer_delete')) { ?>
                                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('sysset/printer/printer_delete')?>">
                                    <i class='icow icow-shanchu1'></i> 删除</button>
                                <?php  } ?>
                            </div>
                    </td>
                    <td colspan="2" style="text-align: right">
                        <?php  echo $pager;?>
                    </td>
                </tr>
            </tfoot>
        </table>

        <?php  } else { ?>
        <div class='panel panel-default'>
            <div class='panel-body' style='text-align: center;padding:30px;'>
                暂时没有任何小票打印机!
            </div>
        </div>
        <?php  } ?>


</form>
</div>
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+454mI5p2D5omA5pyJ-->