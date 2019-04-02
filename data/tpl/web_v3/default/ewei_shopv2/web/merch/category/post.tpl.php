<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">

	当前位置：<span class="text-primary"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>商户分组 <small><?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['catename'];?>】<?php  } ?></small></span>
</div>
<div class="page-content">
	<div class="page-sub-toolbar">
		<span class=''>
		<?php if(cv('merch.category.add')) { ?>
			<a class="btn btn-primary btn-sm" href="<?php  echo webUrl('merch/category/add')?>">添加新商户分类</a>
		<?php  } ?>
	</span>
	</div>
	<form <?php if( ce('merch.category' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />

	<div class="form-group">
		<label class="col-lg control-label">排序</label>
		<div class="col-sm-9 col-xs-12">
			<?php if( ce('merch.category' ,$item) ) { ?>
			<input type="text" name="displayorder" id="displayorder" class="form-control" value="<?php  echo $item['displayorder'];?>" />
			<span class='help-block'>数字越大，排名越靠前,如果为空，默认排序方式为创建时间</span>
			<?php  } else { ?>
			<div class='form-control-static'><?php  echo $item['displayorder'];?></div>
			<?php  } ?>
		</div>
	</div>

	 <div class="form-group">
		<label class="col-lg control-label must">分类名称</label>
		<div class="col-sm-9 col-xs-12 ">
			<?php if( ce('merch.category' ,$item) ) { ?>
			<input type="text" id='catename' name="catename" class="form-control" value="<?php  echo $item['catename'];?>" data-rule-required="true" />
			<?php  } else { ?>
			<div class='form-control-static'><?php  echo $item['catename'];?></div>
			<?php  } ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg control-label">分类图片</label>
		<div class="col-sm-9 col-xs-12">
			<?php if( ce('merch.category' ,$item) ) { ?>
			<?php  echo tpl_form_field_image2('thumb', $item['thumb'])?>
			<span class="help-block">建议尺寸: 100*100，或正方型图片 </span>
			<?php  } else { ?>
			<?php  if(!empty($item['thumb'])) { ?>
			<a href='<?php  echo tomedia($item['thumb'])?>' target='_blank'>
			<img src="<?php  echo tomedia($item['thumb'])?>" style='width:100px;border:1px solid #ccc;padding:1px' onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'"/>
			</a>
			<?php  } ?>
			<?php  } ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg control-label">是否首页推荐</label>
		<div class="col-sm-9 col-xs-12">
			<?php if( ce('merch.category' ,$item) ) { ?>
			<label class="radio-inline">
				<input type="radio" name='isrecommand' value="1" <?php  if($item['isrecommand']==1) { ?>checked<?php  } ?> /> 是
			</label>
			<label class="radio-inline">
				<input type="radio" name='isrecommand' value="0" <?php  if(empty($item['isrecommand'])) { ?>checked<?php  } ?> /> 否
			</label>
			<?php  } else { ?>
			<div class='form-control-static'><?php  if(empty($item['isrecommand'])) { ?>否<?php  } else { ?>是<?php  } ?></div>
			<?php  } ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg control-label">是否显示</label>
		<div class="col-sm-9 col-xs-12">
			<?php if( ce('merch.category' ,$item) ) { ?>
			<label class='radio-inline'>
				<input type='radio' name='status' value='1' <?php  if($item['status']==1) { ?>checked<?php  } ?> /> 是
			</label>
			<label class='radio-inline'>
				<input type='radio' name='status' value='0' <?php  if(empty($item['status'])) { ?>checked<?php  } ?> /> 否
			</label>
			<?php  } else { ?>
			<div class='form-control-static'><?php  if(empty($item['status'])) { ?>否<?php  } else { ?>是<?php  } ?></div>
			<?php  } ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg control-label"></label>
		<div class="col-sm-9 col-xs-12">
			<?php if( ce('merch.category' ,$item) ) { ?>
			<input type="submit" value="提交" class="btn btn-primary"  />
			<?php  } ?>
			<input type="button" name="back" onclick='history.back()' <?php if(cv('merch.category.add|merch.category.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
		</div>
	</div>

	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+454mI5p2D5omA5pyJ-->