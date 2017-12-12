<?php
class Test_Store_Block_Adminhtml_Location extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct()
    {
        // su dung block ten store;
        $this->_blockGroup = 'store';
        // controller trong duong dan adminhtml/location
        $this->_controller = 'adminhtml_location';
        $this->_headerText = Mage::helper('store')->__('Store Manager');
        $this->_addButtonLabel = $this->__('Thêm Mới');
        $this->_backButtonLabel = $this->__('Trở lại');
        parent::_construct();
    }

    public function getCreateUrl()
    {
        return $this->getUrl(
            'location/adminhtml_location/edit'
        );
    }
}