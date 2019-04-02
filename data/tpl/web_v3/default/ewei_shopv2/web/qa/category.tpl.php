<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary">问题分类</span>
</div>

<div class="page-content">
<div class="page-sub-toolbar">
    <span class=''>
        <?php if(cv('qa.category.add')) { ?>
        	<a class="btn btn-primary btn-sm" href="<?php  echo webUrl('qa/category/add')?>"><i class="fa fa-plus"></i> 添加分类</a>
        <?php  } ?>
    </span>
</div>
<?php  if(count($list)>0) { ?>
<form action="" method="post">

    <table class="table table-hover table-responsive">
        <thead class="navbar-inner">
            <tr>
                <th style="width:50px;">ID</th>
                <th style='width:70px'>显示顺序</th>
                <th>分类名称</th>
                <th style="width: 50px; text-align: center;">推荐</th>
                <th style="width: 80px; text-align: center;">状态</th>
                <th style="width: 75px;">操作</th>
            </tr>
        </thead>
        <tbody id="sort">
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr>
                <td><?php  echo $row['id'];?></td>
                <td>
                    <?php if(cv('qa.category.edit')) { ?>
                    	<a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('qa/category/displayorder',array('id'=>$row['id']))?>" ><?php  echo $row['displayorder'];?></a>
                    <?php  } else { ?>
                    	<?php  echo $row['displayorder'];?> 
                    <?php  } ?>
                </td>

                <td><img src='<?php  echo tomedia($row['thumb'])?>' style='width:30px;height:30px;padding:1px;border:1px solid #ccc' onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'"/> <?php  echo $row['name'];?></td>
                <td style="text-align: center;">
                    <span class='label <?php  if($row['isrecommand']==1) { ?>label-success<?php  } else { ?>label-default<?php  } ?>'
                    <?php if(cv('qa.question.edit')) { ?>
                    data-toggle='ajaxSwitch'
                    data-switch-value='<?php  echo $row['isrecommand'];?>'
                    data-switch-value0='0|否|label label-default|<?php  echo webUrl('qa/category/isrecommand',array('isrecommand'=>1,'id'=>$row['id']))?>'
                    data-switch-value1='1|是|label label-success|<?php  echo webUrl('qa/category/isrecommand',array('isrecommand'=>0,'id'=>$row['id']))?>'
                    <?php  } ?>
                    >
                    <?php  if($row['isrecommand']==1) { ?>是<?php  } else { ?>否<?php  } ?></span>
                </td>
                <td style="text-align: center;">
                    <span class='label <?php  if($row['enabled']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'
                          <?php if(cv('qa.category.edit')) { ?>
	                          data-toggle='ajaxSwitch' 
	                          data-switch-value='<?php  echo $row['enabled'];?>'
	                          data-switch-value0='0|隐藏|label label-default|<?php  echo webUrl('qa/category/enabled',array('enabled'=>1,'id'=>$row['id']))?>'  
	                          data-switch-value1='1|显示|label label-primary|<?php  echo webUrl('qa/category/enabled',array('enabled'=>0,'id'=>$row['id']))?>'
                          <?php  } ?>
                          >
                          <?php  if($row['enabled']==1) { ?>显示<?php  } else { ?>隐藏<?php  } ?></span>
                    </td>
                    <td style="text-align:left;">
                        <?php if(cv('qa.category.view|qa.category.edit')) { ?>
	                        <a href="<?php  echo webUrl('qa/category/edit', array('id' => $row['id']))?>" class="btn btn-default btn-sm btn-op btn-operation" title="<?php if(cv('qa.category.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>">
                                <span data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php if(cv('qa.category.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>">
                                      <?php if(cv('qa.category.edit')) { ?>
                                        <i class="icow icow-bianji2"></i>
                                        <?php  } else { ?>
                                        <i class="icow icow-chakan-copy"></i>
                                        <?php  } ?>
                                     </span>
	                        </a>
                        <?php  } ?>
                        <?php if(cv('qa.category.delete')) { ?> 
                        	<a data-toggle='ajaxRemove' href="<?php  echo webUrl('qa/category/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm btn-op btn-operation" data-confirm="确认删除此分类?" title="删除">
                               <span data-toggle="tooltip" data-placement="top" title="" data-original-title="删除">
                                        <i class="icow icow-shanchu1"></i>
                                     </span>
                            </a>
                        <?php  } ?>
                    </td>
                </tr>
                <?php  } } ?> 
            </tbody>
        </table>
        <?php  echo $pager;?>
        <?php  } else { ?>
        <div class='panel panel-default'>
            <div class='panel-body' style='text-align: center;padding:30px;'>
                暂时没有任何商品分类
            </div>
            <?php  } ?>


    </form>

</div>
    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>


<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+4-->