<?php
declare(strict_types=1);

namespace Abbacus\Crud\Model;

use Abbacus\Crud\Api\Data\ProjectInterface;
use Abbacus\Crud\Api\Data\ProjectInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Project extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'abbacus_crud_project';
    protected $projectDataFactory;

    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ProjectInterfaceFactory $projectDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Abbacus\Crud\Model\ResourceModel\Project $resource
     * @param \Abbacus\Crud\Model\ResourceModel\Project\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ProjectInterfaceFactory $projectDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Abbacus\Crud\Model\ResourceModel\Project $resource,
        \Abbacus\Crud\Model\ResourceModel\Project\Collection $resourceCollection,
        array $data = []
    ) {
        $this->projectDataFactory = $projectDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve project model with project data
     * @return ProjectInterface
     */
    public function getDataModel()
    {
        $projectData = $this->getData();
        
        $projectDataObject = $this->projectDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $projectDataObject,
            $projectData,
            ProjectInterface::class
        );
        
        return $projectDataObject;
    }
}

