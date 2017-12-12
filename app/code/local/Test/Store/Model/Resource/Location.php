<?php
class Test_Store_Model_Resource_Location extends Mage_Core_Model_Resource_Db_Abstract {
	protected function _construct()
    {
        $this->_init('store/location', 'id');
    }
    public function uploadAndImport(Varien_Object $object)
    {
        $csvFile = $_FILES['groups']['tmp_name']['test']['fields']['import']['value'];       
	}
}