<?php
 
class Test_Store_Block_Adminhtml_Location_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'store';
        $this->_controller = 'adminhtml_location';
        $this->_mode = 'edit';
 
    }
    // tạo ra header cho form nếu là thêm thì hiển thị New Post còn nếu là sửa thì header sẽ là Edit Post + title.
    public function getHeaderText()
    {
        if (Mage::registry('location_data') && Mage::registry('location_data')->getId())
        {
            return Mage::helper('store')->__('Edit Location "%s"', $this->htmlEscape(Mage::registry('location_data')->getTitle()));
        } else {
            return Mage::helper('store')->__('New Location');
        }
    }
}