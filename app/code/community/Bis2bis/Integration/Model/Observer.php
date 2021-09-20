<?php

class Bis2bis_Integration_Model_Observer {
    public function catch($observer) {
        $model = Mage::getModel("bis2bis_integration/queue");
        $content = $observer->getOrder()->debug();
        $model->setData(array(
            "event" => "sales_order_place_after",
            "content" => serialize($observer),
            "integration_type" => 'order',
        ));
        $model->save();
    }
}
