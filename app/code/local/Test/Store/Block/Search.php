<?php
class Test_Store_Block_Search extends Mage_Core_Block_Template
{
    public function getContent()
    {
    	$params = $this->getRequest()->getParams();
	    $collection = Mage::getModel('store/location')->getCollection();
	    if ($params['search']) {
	    	$collection->addFieldToFilter(
	    		array(
	    			'title',
	    			'state',
	    			'postcode'
	    		), 
	    		array(
	    			array('like' => '%'.$params['search'].'%'),
	    			array('like' => '%'.$params['search'].'%'),
	    			array('like' => '%'.$params['search'].'%')
	    		)
	    	);
	    	$location = $collection->getData();
	    }
	    return $location;
    }
}