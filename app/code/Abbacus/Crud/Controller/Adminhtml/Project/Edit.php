<?php
declare(strict_types=1);

namespace Abbacus\Crud\Controller\Adminhtml\Project;

class Edit extends \Abbacus\Crud\Controller\Adminhtml\Project
{

    protected $resultPageFactory;

    protected $project;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Abbacus\Crud\Model\Project $project
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->project = $project;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('project_id');
        $model = $this->project;
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Project no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('abbacus_crud_project', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Project') : __('New Project'),
            $id ? __('Edit Project') : __('New Project')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Projects'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Project %1', $model->getId()) : __('New Project'));
        return $resultPage;
    }
}

