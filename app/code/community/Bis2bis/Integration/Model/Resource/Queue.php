<?php

class Bis2bis_Integration_Model_Resource_Queue extends Mage_Core_Model_Resource_Db_Abstract {
    protected function _construct() {
        $this->_init("bis2bis_integration/queue", "log_id");
    }
}
