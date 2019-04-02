<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">当前位置：<span class="text-primary">淘宝助手客户端</span> </div>
<div class="page-content">
	<div class="alert alert-primary">
		提示：
		<br/>1.请联系客服下载淘宝助手客户端
		<br/>2.复制“接口访问地址”到客户端，同时输入账号密码登录。
	</div>

<form id="setform"  <?php if(cv('taobao.set.edit')) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate">

<div class="form-group">
	<label class="col-lg control-label">接口访问地址</label>
	<div class="col-sm-9 col-xs-12">
		<p class='form-control-static'>
			<a href='javascript:;' class="js-clip" title='点击复制链接' data-url="<?php  echo $siteroot;?><?php  echo $_W['uniacid'];?>/0.html" >
				<?php  echo $siteroot;?><?php  echo $_W['uniacid'];?>/0.html
			</a>
		</p>
	</div>
</div>

<div class="form-group">
	<label class="col-lg control-label">是否开启接口</label>
	<div class="col-sm-8">
		<?php if(cv('taobao.set.edit')) { ?>
		<label class="radio-inline"><input type="radio"  name="status" value="1" <?php  if($data['taobao_status'] ==1) { ?> checked="checked"<?php  } ?> /> 开启</label>
		<label class="radio-inline"><input type="radio"  name="status" value="0" <?php  if($data['taobao_status'] ==0) { ?> checked="checked"<?php  } ?> /> 关闭</label>
		<div class='help-block'></div>
		<?php  } else { ?>
		<?php  if($data['status'] ==0) { ?>关闭<?php  } else { ?>开启<?php  } ?>
		<?php  } ?>
	</div>
</div>


<?php if(cv('taobao.set.edit')) { ?>
    <div class="form-group">
		<label class="col-lg control-label"></label>
		<div class="col-sm-9 col-xs-12">
			<input type="submit"  value="提交" class="btn btn-primary" />
		</div>
    </div>
<?php  } ?>

</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>