<?php

class Test_Store_Block_Adminhtml_Location_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      // id cua grid
      $this->setId('locationGrid');
      // mac dinh sort theo
      $this->setDefaultDir('DESC');
      // luu tham so trong session hay ko?
      $this->setSaveParametersInSession(true);
      // co su dung ajax trong viec sort hay ko
      $this->setUseAjax(true);
  }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('store/location')->getCollection();
        // lay du lieu de do ra cac column duoi
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

  protected function _prepareColumns()
  {
      $this->addColumn('title', array(
          'header'    => Mage::helper('store')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

      $this->addColumn('address', array(
          'header'    => Mage::helper('store')->__('Address'),
          'align'     =>'left',
          'index'     => 'address',
      ));
      $this->addColumn('state', array(
          'header'    => Mage::helper('store')->__('State'),
          'align'     =>'left',
          'index'     => 'state',
      ));
      $this->addColumn('city', array(
          'header'    => Mage::helper('store')->__('City'),
          'align'     =>'left',
          'index'     => 'city',
      ));
      $this->addColumn('country', array(
          'header'    => Mage::helper('store')->__('Country'),
          'align'     =>'left',
          'index'     => 'country',
      ));
      $this->addColumn('postcode', array(
          'header'    => Mage::helper('store')->__('Postcode'),
          'align'     =>'left',
          'index'     => 'postcode',
      ));
      $this->addColumn('latitude', array(
          'header'    => Mage::helper('store')->__('Latitude'),
          'align'     =>'left',
          'index'     => 'latitude',
      ));
      $this->addColumn('longitude', array(
          'header'    => Mage::helper('store')->__('Longitude'),
          'align'     =>'left',
          'index'     => 'longitude',
      ));
      $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('store')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('store')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'entity_id'
        ));
      // ham export ra csv
	     $this->addExportType('*/*/exportCsv', Mage::helper('store')->__('CSV')); 
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('location_id');
        $this->getMassactionBlock()->setFormFieldName('location_id');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('store')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('store')->__('Are you sure?')
        ));


        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('store')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('store')->__('Status'),
                         //'values' => $statuses
                     )
             )
        ));
        return $this;
    }
  // them ID cho tung ban ghi de edit
  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}