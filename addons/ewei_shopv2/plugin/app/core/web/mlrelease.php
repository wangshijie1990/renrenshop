<?php
//haha
if (!defined('IN_IA')) {
	exit('Access Denied');
}

class MlRelease_EweiShopV2Page extends PluginWebPage
{
	private $key = 'asdfzhongmuting'; 
	private function ujson_encode($array)
  {
        if(version_compare(PHP_VERSION,'5.4.0','<')){
            $str = json_encode($array);
            $str = preg_replace_callback("#\\\u([0-9a-f]{4})#i",function($matchs){
                 return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
            },$str);
            return $str;
        }else{
            return json_encode($array, JSON_UNESCAPED_UNICODE);
        }
  }
	public function main()
	{
		global $_W;
		$error = NULL;
		$auth = $this->model->getAuth();

		if (is_error($auth)) {
			$error = $auth['message'];
		}
		else {
			$is_auth = (is_array($auth) ? $auth['is_auth'] : false);
			$authUrl = EWEI_SHOPV2_AUTH_WXAPP . '/weixin/xcx/auth.html?site_id=' . SITE_ID . '&uniacid=' . $_W['uniacid'];

			if ($is_auth) {
				$release = $this->model->getRelease($auth['id']);
			}
		}

		include $this->template();
	}

	public function audit()
	{
		global $_W;
		global $_GPC;

		if (!$_W['ispost']) {
			show_json(0, '错误的请求');
		}

		$auth = $this->model->getAuth();

		if (is_error($auth)) {
			show_json(0, $auth['message']);
		}

		$action = trim($_GPC['action']);
		if (($action != 'upload') && ($action != 'audit')) {
			show_json(0, '请求参数错误');
		}

		load()->func('communication');

		if ($action == 'upload') {
			$tabBar = '';
			$app_set = m('common')->getSysset('app');
			if (!empty($app_set)) {
				if (!empty($app_set['tabbar'])) {
					$app_set['tabbar'] = iunserializer($app_set['tabbar']);

					if (!empty($app_set['tabbar'])) {
						$tabBar = $app_set['tabbar'];
					}
				}
			}
			if (is_array($tabBar)) {
				if (is_array($tabBar['list'])) {
					foreach ($tabBar['list'] as $index => &$item) {
						$item['pagePath'] = ltrim($item['pagePath'], '/');
					}
					unset($index);
					unset($item);
				}
				//print_r($tabBar);exit;
				$tabBar = $this->ujson_encode($tabBar);
			}
			//die($tabBar);
			//die(EWEI_SHOPV2_AUTH_WXAPP . '&do=submit&site_id=' . SITE_ID . '&uniacid=' . $_W['uniacid']);
			$request = ihttp_post(EWEI_SHOPV2_AUTH_WXAPP . '/weixin/xcx/submit.html?site_id=' . SITE_ID . '&uniacid=' . $_W['uniacid'], array('tabBar' => $tabBar));
		}
		else {
			$request = ihttp_post(EWEI_SHOPV2_AUTH_WXAPP . '/weixin/xcx/audit.html?site_id=' . SITE_ID . '&uniacid=' . $_W['uniacid'], array());
		}
		//print_r($request);exit;
		if ($request['code'] != 200) {
			show_json(0, '信息查询失败！稍后重试(' . $request['code'] . ')');
		}

		if (empty($request['content'])) {
			show_json(0, '信息查询失败！稍后重试(nodata)');
		}

		$content = json_decode($request['content'], true);

		if (!is_array($content)) {
			show_json(0, '信息查询失败！稍后重试(dataerror)');
		}

		if ($content['status'] != 1) {
			show_json(0, $content['errmsg']);
		}

		show_json(1);
	}

	public function auth()
	{
		global $_W;
		$auth = $this->model->getAuth();

		if (is_error($auth)) {
			$this->message($auth['message']);
		}

		//$authid = $this->encrypt($auth['id'] . $this->key, $this->key);
		header('Location:' . EWEI_SHOPV2_AUTH_WXAPP . '/weixin/xcx/wxauth.html?site_id=' . SITE_ID . '&uniacid=' . $_W['uniacid'].'&library=37');
	}
	public function getqrCode(){
        global $_W;
        global $_GPC;
        $content = file_get_contents($_GPC['url']);
        header("Content-Type: image/jpeg");
        header("Content-Disposition: attachment; filename='qrcode.jpg'");
        file_put_contents("php://output", $content);
  }
	protected function encrypt($data, $key)
	{
		$key = md5($key);
		$char = '';
		$str = '';
		$x = 0;
		$len = strlen($data);
		$l = strlen($key);
		$i = 0;

		while ($i < $len) {
			if ($x == $l) {
				$x = 0;
			}

			$char .= $key[$x];
			++$x;
			++$i;
		}

		$i = 0;

		while ($i < $len) {
			$str .= chr(ord($data[$i]) + (ord($char[$i]) % 256));
			++$i;
		}

		return base64_encode($str);
	}
}

?>
