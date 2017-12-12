<?php
class Test_Store_Model_Import extends Mage_Core_Model_Config_Data {
	public function _afterSave()
    {
        Mage::getResourceModel('store/location')->uploadAndImport($this);
    }
}