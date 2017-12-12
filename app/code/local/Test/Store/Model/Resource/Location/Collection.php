<?php
class Test_Store_Model_Resource_Location_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
    protected function _construct()
    {
            $this->_init('store/location');
    }
}