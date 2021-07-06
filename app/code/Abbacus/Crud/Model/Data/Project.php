<?php
declare(strict_types=1);

namespace Abbacus\Crud\Model\Data;

use Abbacus\Crud\Api\Data\ProjectInterface;

class Project extends \Magento\Framework\Api\AbstractExtensibleObject implements ProjectInterface
{

    /**
     * Get project_id
     * @return string|null
     */
    public function getProjectId()
    {
        return $this->_get(self::PROJECT_ID);
    }

    /**
     * Set project_id
     * @param string $projectId
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setProjectId($projectId)
    {
        return $this->setData(self::PROJECT_ID, $projectId);
    }

    /**
     * Get title
     * @return string|null
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Abbacus\Crud\Api\Data\ProjectExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Abbacus\Crud\Api\Data\ProjectExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Abbacus\Crud\Api\Data\ProjectExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get description
     * @return string|null
     */
    public function getDescription()
    {
        return $this->_get(self::DESCRIPTION);
    }

    /**
     * Set description
     * @param string $description
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get assignt_to
     * @return string|null
     */
    public function getAssigntTo()
    {
        return $this->_get(self::ASSIGNT_TO);
    }

    /**
     * Set assignt_to
     * @param string $assigntTo
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setAssigntTo($assigntTo)
    {
        return $this->setData(self::ASSIGNT_TO, $assigntTo);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get start_time
     * @return string|null
     */
    public function getStartTime()
    {
        return $this->_get(self::START_TIME);
    }

    /**
     * Set start_time
     * @param string $startTime
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setStartTime($startTime)
    {
        return $this->setData(self::START_TIME, $startTime);
    }

    /**
     * Get end_time
     * @return string|null
     */
    public function getEndTime()
    {
        return $this->_get(self::END_TIME);
    }

    /**
     * Set end_time
     * @param string $endTime
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setEndTime($endTime)
    {
        return $this->setData(self::END_TIME, $endTime);
    }

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->_get(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Abbacus\Crud\Api\Data\ProjectInterface
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}

