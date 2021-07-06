<?php
declare(strict_types=1);

namespace Abbacus\Crud\Api\Data;

/**
 * Crud project interface.
 * @api
 * @since 100.0.2
 */

interface ProjectInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const ASSIGNT_TO = 'assignt_to';
    const TITLE = 'title';
    const CREATED_AT = 'created_at';
    const PROJECT_ID = 'project_id';
    const END_TIME = 'end_time';
    const DESCRIPTION = 'description';
    const UPDATED_AT = 'updated_at';
    const START_TIME = 'start_time';

    /**
     * Get project_id
     * @return string|null
     */
    public function getProjectId();

    /**
     * Set project_id
     * @param string $projectId
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setProjectId($projectId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setTitle($title);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Abbacus\Crud\Api\Data\ProjectExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Abbacus\Crud\Api\Data\ProjectExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Abbacus\Crud\Api\Data\ProjectExtensionInterface $extensionAttributes
    );

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setDescription($description);

    /**
     * Get assignt_to
     * @return string|null
     */
    public function getAssigntTo();

    /**
     * Set assignt_to
     * @param string $assigntTo
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setAssigntTo($assigntTo);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get start_time
     * @return string|null
     */
    public function getStartTime();

    /**
     * Set start_time
     * @param string $startTime
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setStartTime($startTime);

    /**
     * Get end_time
     * @return string|null
     */
    public function getEndTime();

    /**
     * Set end_time
     * @param string $endTime
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setEndTime($endTime);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setUpdatedAt($updatedAt);
}

