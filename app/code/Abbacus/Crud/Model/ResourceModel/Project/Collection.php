<?php
declare(strict_types=1);

namespace Abbacus\Crud\Model\ResourceModel\Project;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'project_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Abbacus\Crud\Model\Project::class,
            \Abbacus\Crud\Model\ResourceModel\Project::class
        );
    }
}

