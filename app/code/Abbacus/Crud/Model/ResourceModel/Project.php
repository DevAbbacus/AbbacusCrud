<?php
declare(strict_types=1);

namespace Abbacus\Crud\Model\ResourceModel;

class Project extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('abbacus_crud_project', 'project_id');
    }
}

