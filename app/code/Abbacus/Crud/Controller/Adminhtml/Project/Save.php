<?php
declare(strict_types=1);

namespace Abbacus\Crud\Controller\Adminhtml\Project;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    protected $project;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
         \Abbacus\Crud\Model\Project $project
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->project = $project;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('project_id');
        
            $model = $this->project->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Project no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Project.'));
                $this->dataPersistor->clear('abbacus_crud_project');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['project_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Project.'));
            }
        
            $this->dataPersistor->set('abbacus_crud_project', $data);
            return $resultRedirect->setPath('*/*/edit', ['project_id' => $this->getRequest()->getParam('project_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

