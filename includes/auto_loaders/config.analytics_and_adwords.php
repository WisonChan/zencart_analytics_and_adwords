<?php
/**
* @package Gtag Analytics and Adwords
* @copyright (c) 2018 BTU
* @copyright Copyright 2003-2018 Zen Cart Development Team
* @copyright Portions Copyright 2003 osCommerce
* @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
* @version $Id: config.analytics_and_adwords.php 2018-06-24 15:47:36Z kanine $
*/
$autoLoadConfig[90][] = array('autoType'=>'class',
'loadFile'=>'observers/class.analytics_and_adwords.php');
$autoLoadConfig[90][] = array('autoType'=>'classInstantiate',
'className'=>'analytics_and_adwords',
'objectName'=>'analytics_and_adwords');