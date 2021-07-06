<?php
declare(strict_types=1);

namespace Abbacus\Crud\Model;

use Abbacus\Crud\Api\Data\ProjectInterfaceFactory;
use Abbacus\Crud\Api\Data\ProjectSearchResultsInterfaceFactory;
use Abbacus\Crud\Api\ProjectRepositoryInterface;
use Abbacus\Crud\Model\ResourceModel\Project as ResourceProject;
use Abbacus\Crud\Model\ResourceModel\Project\CollectionFactory as ProjectCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class ProjectRepository implements ProjectRepositoryInterface
{

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    private $storeManager;

    protected $projectCollectionFactory;

    protected $dataObjectHelper;

    protected $projectFactory;

    protected $dataProjectFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;
    
    protected $request;


    /**
     * @param ResourceProject $resource
     * @param ProjectFactory $projectFactory
     * @param ProjectInterfaceFactory $dataProjectFactory
     * @param ProjectCollectionFactory $projectCollectionFactory
     * @param ProjectSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceProject $resource,
        ProjectFactory $projectFactory,
        ProjectInterfaceFactory $dataProjectFactory,
        ProjectCollectionFactory $projectCollectionFactory,
        ProjectSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->resource = $resource;
        $this->projectFactory = $projectFactory;
        $this->projectCollectionFactory = $projectCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataProjectFactory = $dataProjectFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->request = $request;
    }

    /**
     * Save Project
     * @param string $project     * 
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($project) {    

        $data =  array(); 
        $data['title'] = $this->request->getParam('project');
        $data['description'] = $this->request->getParam('description');
        $data['assignt_to'] = $this->request->getParam('assignt_to');
        $data['start_time'] = $this->request->getParam('start_time');
        $data['end_time'] = $this->request->getParam('end_time');
      
        $projectModel = $this->projectFactory->create()->setData($data); 
        
        try {
            $this->resource->save($projectModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the project: %1',
                $exception->getMessage()
            ));
        }
        return $projectModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */

    public function update($projectId) 
    {
        $data = $this->request->getParams();
        $projectModel = $this->projectFactory->create(); 
        $project = $projectModel->load($projectId);
        $dataAraay = array();
        if(!empty($data)) {
            foreach($data as $key=>$value) {
                $dataAraay[$key] = $value;
            }
        $project->addData($dataAraay);  
            try {
                $this->resource->save($project);
            } catch (\Exception $exception) {
                throw new CouldNotSaveException(__(
                    'Could not save the project: %1',
                    $exception->getMessage()
                ));
            }
            return $projectModel->getDataModel(); 

        }
        
    }

    /**
     * {@inheritdoc}
     */
    public function get($projectId)
    {
        $project = $this->projectFactory->create();
        $this->resource->load($project, $projectId);
        if (!$project->getId()) {
            throw new NoSuchEntityException(__('Project with id "%1" does not exist.', $projectId));
        }
        return $project->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->projectCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Abbacus\Crud\Api\Data\ProjectInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Abbacus\Crud\Api\Data\ProjectInterface $project
    ) {
        try {
            $projectModel = $this->projectFactory->create();
            $this->resource->load($projectModel, $project->getProjectId());
            $this->resource->delete($projectModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Project: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($projectId)
    {
        return $this->delete($this->get($projectId));
    }
}

