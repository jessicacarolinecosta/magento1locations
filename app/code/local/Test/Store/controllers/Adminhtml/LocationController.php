<?php
 
class Test_Store_Adminhtml_LocationController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction() {
		$this->_title($this->__('Location Manager'));
        $this->loadLayout();
        // goi block ten store o duong dang adminhtml/location
        $this->_addContent($this->getLayout()->createBlock('store/adminhtml_location'));
        $this->renderLayout();
	}
	public function editAction() {
		$id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('store/location')->load($id);
        // kiem tra neu co id la sua, nguoc lai la them moi
        if ($model->getId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if ($data) {
                $model->setData($data)->setId($id);
            }
        }
        else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('store')->__('Example does not exist'));
            $this->_redirect('*/*/');
        }
        // lay thong tin cua id hien tai trong bang va gan vao bien global location data
        Mage::register('location_data', $model);
        $this->loadLayout();
        $this->_setActiveMenu('store');
        $this->_addContent($this->getLayout()->createBlock('store/adminhtml_location_edit'));
        $this->renderLayout();
	}
    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $postId = $this->getRequest()->getParam('id');
        try {
            $postModel = Mage::getModel('store/location')->setData($data);
            if($postId){
                $postModel->setId($postId);
            }
            $postModel->save();
            $message = $this->__('Location was successfully saved.');
            Mage::getSingleton('adminhtml/session')->addSuccess($message);
            Mage::getSingleton('adminhtml/session')->setFormData(false);
            $this->_redirect('*/*/');
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            Mage::getSingleton('adminhtml/session')->setFormData($data);
        }
    }
    public function deleteAction() {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $model = Mage::getModel('store/location');
                $model->setId($id);
                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('store')->__('The location has been deleted.'));
                $this->_redirect('*/*/');
                return;
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Unable to find the store to delete.'));
        $this->_redirect('*/*/');
    }
    public function massDeleteAction()
    {
        $postIds = $this->getRequest()->getParam('location_id');
        if (!is_array($postIds)) {
            Mage::getSingleton('adminhtml/session')->addError(
                Mage::helper('adminhtml')->__('Please select item(s)')
            );
        } else {
            try {
                foreach ($postIds as $postId) {
                    $post_data = Mage::getModel('store/location')->load($postId);
                    $post_data->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Items(s) were successfully deleted'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
    public function exportCsvAction()
        {
            $fileName   = 'location.csv';
            $grid       = $this->getLayout()->createBlock('store/adminhtml_location_grid');
            $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
        } 
}