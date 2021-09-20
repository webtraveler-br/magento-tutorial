<?php

class Bis2bis_Integration_Model_Cron {
    public function integrate() {
        $orders = Mage::getModel("bis2bis_integration/queue")->getCollection()
            ->addFieldToFilter('integrated_at', '000-00-00 00:00:00')
            ->getItems();
        foreach ($orders as $queue) {
            $order = unserialize($queue->getContent());
            Mage::log('Pedido integrado: '.$order['increment_id'], null, 'bis2bis.log', true);
        }
        $queue->setIntegratedAt(date("Y-m-d H:i:s"));
        $queue->setDebugInfo("Registro Integrado");
        $queue->save();
    }
}
