<?php
if (!class_exists('msDeliveryInterface')) {
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/minishop2/model/minishop2/msdeliveryhandler.class.php';
}

class ms2extDeliveryHandler extends msDeliveryHandler implements msDeliveryInterface
{

}