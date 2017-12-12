<?php
class Test_Store_Block_Position extends Mage_Core_Block_Template
{
    public function getContent()
    {
    	$params = $this->getRequest()->getParams();
	    $collection = Mage::getModel('store/location')->getCollection();
	    if ($params['address']) {
	    	$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($params['address']).'&key=AIzaSyAJnO8_hu8aA-6miQE9aly3qcPwHpSFVY0';
     		$json = json_decode(file_get_contents($url));
     		$lat = $json->results[0]->geometry->location->lat;
     		$lng = $json->results[0]->geometry->location->lng;
     		$title = $json->results[0]->formatted_address;
     		if ($title) {
                $location['latitude'] = $lat;
                $location['longitude'] = $lng;
                $location['title'] = $title;
            } else {
                $location['error'] = 'No Matches';
            }
	    }	
	    if ($params['lat'] && $params['long']) {
	    	$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$params['lat'].','.$params['long'].'&key=AIzaSyAJnO8_hu8aA-6miQE9aly3qcPwHpSFVY0';
	    	$json = json_decode(file_get_contents($url));
	    	$lat = $json->results[0]->geometry->location->lat;
     		$lng = $json->results[0]->geometry->location->lng;
     		$title = $json->results[0]->formatted_address;
            if ($title) {
                $location['latitude'] = $lat;
                $location['longitude'] = $lng;
                $location['title'] = $title;
            } else {
                $location['error'] = 'No Matches';
            }
	    }
	    return $location;
    }
}