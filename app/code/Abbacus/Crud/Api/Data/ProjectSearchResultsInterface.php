<?php
declare(strict_types=1);

namespace Abbacus\Crud\Api\Data;

interface ProjectSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Project list.
     * @return \Abbacus\Crud\Api\Data\ProjectInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \Abbacus\Crud\Api\Data\ProjectInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

