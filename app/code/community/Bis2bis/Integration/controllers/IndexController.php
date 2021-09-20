<?php
class Bis2bis_Integration_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $model = Mage::getModel('bis2bis_integration/queue');
        $model->load(1);
        echo get_class($model);
    }
    public function storeAction() {
        $model = Mage::getModel('bis2bis_integration/queue');
        $model->setEvent('teste');
        $model->setIntegrationType('log');
        $model->setContent('hello');
        $model->save();
        echo "Salvo";
    }
    public function editAction() {
        $model = Mage::getModel('bis2bis_integration/queue');
        $model->load(1);
        $model->setContent('world');
        $model->save();
        echo "Editado";
    }
    public function deleteAction() {
        $model = Mage::getModel('bis2bis_integration/queue');
        $model->load(1);
        $model->delete();
        echo "Deletado";
    }
    public function ShowLogsAction() {
        $logs = Mage::getModel('bis2bis_integration/queue')->getCollection();
        foreach ($logs as $log) {
            echo '<h2>'.$log->getContent().'</h2>';
        }
    }
}