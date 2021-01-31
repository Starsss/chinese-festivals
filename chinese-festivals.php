<?php
/*
Plugin Name: Chinese Festivals
Plugin URI: https://www.jkxuexi.com/1440.html
Description: 中国节日之春节，给网站加上漂亮的灯笼或者吉祥的福字，迎接一年一度的春节
Version: 1.0.2
Author: 六岁小少年
Author URI: https://www.jkxuexi.com
*/

define('CHNF_VERSION', '1.0.1');
define('CHNF_URL', plugins_url('', __FILE__));
define('CHNF_PATH', dirname(__FILE__));
define('CHNF_ADMIN_URL', admin_url());
define('CHNF_NAME', 'chinese-festivals');


require CHNF_PATH . '/class.option.php';
require CHNF_PATH . '/class.festival.php';



global $CFOPT, $FES;

if ( !isset($CFOPT) ) {
    $CFOPT = new CHNF_Option();
}

if ( !isset($FES) ) {
    $FES = new ChineseFestivals($CFOPT);
    $FES->load();
}
