<?php
declare(strict_types=1);

namespace Abbacus\Crud\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ProjectRepositoryInterface
{

    /**
     * Save Project
     * @param string $project     
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($project);

    /**
     * Retrieve Project
     * @param string $projectId
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($projectId);

    /**
     * Retrieve Project
     * @param string $projectId
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function update($projectId);

    /**
     * Retrieve Project matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Abbacus\Crud\Api\Data\ProjectSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Project
     * @param \Abbacus\Crud\Api\Data\ProjectInterface $project
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Abbacus\Crud\Api\Data\ProjectInterface $project
    );

    /**
     * Delete Project by ID
     * @param string $projectId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($projectId);
}

