<?php

class Test_Store_Block_Adminhtml_Location_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id'),
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        $fieldset = $form->addFieldset(
            'general',array(
                'legend' => $this->__('Location Form')
            )
        );

        $fieldset->addField('title', 'text', array(
            'name' => 'title',
            'label'     => Mage::helper('store')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'title'      => 'Tiêu đề'
        ));

        $fieldset->addField('address', 'textarea', array(
            'name' => 'address',
            'label'     => Mage::helper('store')->__('Address'),
            'class'     => 'required-entry',
            'required'  => true,
            'address'      => 'address'
        ));
        $fieldset->addField('state', 'text', array(
            'name' => 'state',
            'label'     => Mage::helper('store')->__('State'),
            'class'     => 'required-entry',
            'required'  => true,
            'state'      => 'state'
        ));
        $fieldset->addField('city', 'text', array(
            'name' => 'city',
            'label'     => Mage::helper('store')->__('City'),
            'class'     => 'required-entry',
            'required'  => true,
            'city'      => 'city'
        ));
        $fieldset->addField('country', 'text', array(
            'name' => 'country',
            'label'     => Mage::helper('store')->__('Country'),
            'class'     => 'required-entry',
            'required'  => true,
            'country'      => 'country'
        ));
        $fieldset->addField('postcode', 'text', array(
            'name' => 'postcode',
            'label'     => Mage::helper('store')->__('Postcode'),
            'class'     => 'required-entry validate-digits',
            'required'  => true,
            'postcode'      => 'postcode'
        ));
        $fieldset->addField('latitude', 'text', array(
            'name' => 'latitude',
            'label'     => Mage::helper('store')->__('Latitude'),
            'class'     => 'required-entry validate-number',
            'required'  => true,
            'latitude'      => 'latitude'
        ));
        $fieldset->addField('longitude', 'text', array(
            'name' => 'longitude',
            'label'     => Mage::helper('store')->__('Longitude'),
            'class'     => 'required-entry validate-number',
            'required'  => true,
            'longitude'      => 'longitude'
        ));
        // day gia tri tu bien toan cuc vao form
        $form->setValues(Mage::registry('location_data')->getData());
        return parent::_prepareForm();
    }
}