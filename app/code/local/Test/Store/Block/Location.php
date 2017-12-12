<?php
class Test_Store_Block_Location extends Mage_Core_Block_Template
{
    public function getContent()
    {
    	$collection = Mage::getModel('store/location')->getCollection() ;
		return $collection;
    }
}