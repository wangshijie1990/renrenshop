<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary">系统授权</span>
</div>


<div class="page-content">
<form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data" >




    <div class="form-group">

        <label class="col-sm-2 control-label">域名</label>

        <div class="col-sm-9 col-xs-12">

            <input type="text" name="domain" class="form-control" value="<?php  echo $domain;?>" readonly/>

            <span class="help-block">服务器域名</span>

        </div>

    </div>

    <div class="form-group">

        <label class="col-sm-2 control-label">站点IP</label>

        <div class="col-sm-9 col-xs-12">

            <input type="text" name="ip" class="form-control" value="<?php  echo $ip;?>" readonly/>

            <span class="help-block">站点IP</span>

        </div>

    </div>

 <div style="display:none;" class="form-group">
        <label class="col-sm-2 control-label">模块标识</label>
        <div class="col-sm-9 col-xs-12">
            <input type="text" name="modname" class="form-control" value="<?php  echo $modname;?>" readonly />
            <span class="help-block">请填写模块英文标识</span>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">授权码</label>
        <div class="col-sm-9 col-xs-12">
            <input type="text" name="code" class="form-control" value="<?php  echo $auth['code'];?>" data-rule-required='true' data-msg-required='请填写授权码' />
            <span class="help-block">请联系客服获取，授权码具有唯一性，不能重复给多站点使用，后果自负，切记！</span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">授权状态</label>
        <div class="col-sm-9 col-xs-12">
            <div class='form-control-static'>
              
                <?php  if(!empty($auth['code'])) { ?> 
                <span class='label label-primary'>已授权</span>
                <?php  } else { ?>
                <span class='label label-danger'>未授权,请找客服获取授权码，填在上一栏授权码处，然后点下面的验证授权，出现授权成功即可</span>
                <?php  } ?>

            </div>

        </div>

    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">服务期限</label>
        <div class="col-sm-9 col-xs-12">
            <div class='form-control-static'>
                <?php  echo $term;?>
            </div>
        </div>
    </div> 
	
	
	<div class="form-group">
       <label class="col-sm-2 control-label">官方网站</label>
        <div class="col-sm-9 col-xs-12">
		    <div class='form-control-static'><a href='http://item.taobao.com/item.htm?id=566727092065' target='_blank'>立即购买授权</a></div>
        </div>
    </div>

    <div class="form-group">

        <label class="col-sm-2 control-label">官方客服</label>

        <div class="col-sm-9 col-xs-12">
		
		    <div class='form-control-static'><a target=blank href=tencent://message/?uin=583441274&Site=人人商城&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:583441274:10 alt="点击这里给我发消息"></a>

            <?php  if(empty($result['status'])) { ?>

            <span class='help-block'>如果您正在使用非正版授权，请您尊重我们的劳动成果，谢谢您~</span>

            <span class='help-block'>盗版有风险，请谨慎使用!</span>

            <?php  } else { ?>

            <?php  } ?>

        </div>

    </div>




    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-9 col-xs-12">
            <div class='form-control-static'>

                <input type="submit"  value="验证授权" class="btn btn-primary" />

                <?php  if(!empty($result['status'])) { ?>

                <input type="button" style="margin-left:10px;" onclick="location.href='<?php  echo webUrl('system/auth/upgrade')?>'" value="系统升级" class="btn btn-success" />

                <?php  } ?>



            </div>

        </div>

    </div>

</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>