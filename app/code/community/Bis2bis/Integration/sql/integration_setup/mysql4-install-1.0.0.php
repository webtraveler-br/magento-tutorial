<?php

$installer = $this;
$installer->startSetup();
$tableName = $installer->getTable("bis2bis_integration/queue");

/* $sql = "CREATE TABLE $tableName (
    `log_id` int(8) NOT NULL,
    `event` varchar(100) DEFAULT NULL COMMENT 'Magento Event',
    `integration_type` varchar(100) DEFAULT NULL,
    `content` text DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `integrated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
    `debug_info` text DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Integration Queues';
"; */

$queueTable = $installer->getConnection()->newTable($tableName)
    ->addColumn('log_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'length' => 8,
        'nullable' => false,
        'primary' => true,
    ), 'Log id')
    ->addColumn('event', Varien_Db_Ddl_Table::TYPE_TEXT, 100, array(
        'length' => 100,
        'comment' => 'Magento Event'
    ))
    ->addColumn('integration_type', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'length' => 100,
    ))
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array())
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => false,
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
    ))
    ->addColumn('integrated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'default' => '0000-00-00 00:00:00',
        'nullable' => true,
    ))
    ->addColumn('debug_info', Varien_Db_Ddl_Table::TYPE_TEXT, null, array())
    ->setComment('Integration Queue');

if ($installer->tableExists($tableName)) {
    $installer->getConnection()->dropTable($tableName);
}
$installer->getConnection()->createTable($queueTable);
/* $installer->run($sql); */
$installer->endSetup();