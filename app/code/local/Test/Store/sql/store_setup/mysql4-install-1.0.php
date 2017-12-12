<?php
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
  ->newTable($installer->getTable('location'))
  ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
  'identity' => true,
  'unsigned' => true,
  'nullable' => false,
  'primary' => true,
  ), 'Id')
  ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
  'nullable' => false,
  ), 'Title')
  ->addColumn('address', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
  'nullable' => false,
  ), 'Address')
  ->addColumn('state', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
  'nullable' => false,
  ), 'State')
  ->addColumn('postcode', Varien_Db_Ddl_Table::TYPE_INTEGER, 6, array(
  'nullable' => false,
  ), 'Postcode')
  ->addColumn('city', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
  'nullable' => false,
  ), 'City')
  ->addColumn('country', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
  'nullable' => false,
  ), 'Country')
  ->addColumn('latitude', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
  'nullable' => false,
  ), 'Latitude')
  ->addColumn('longitude', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
  'nullable' => false,
  ), 'Longitude');
$installer->getConnection()->createTable($table);
$installer->endSetup();