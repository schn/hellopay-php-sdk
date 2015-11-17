<?php

namespace HelloPay\Notification;
use HelloPay\HelloPayResponse;

/**
 * Class HelloPayNotificationResponse
 *
 * todo: this entity with getters/setters more clear than HelloPay\Responses\Base magic. Especially on large projects
 * todo: where code readability must be as high as possible
 *
 * @package HelloPay\Notification
 */
class NotificationResponse extends HelloPayResponse
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $creationDateTime;

    /**
     * @var string
     */
    private $transactionId;

    /**
     * @var string
     */
    private $newStatus;

    /**
     * @var string
     */
    private $oldStatus;

    /**
     * @var string
     */
    private $merchantReferenceId;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCreationDateTime()
    {
        return $this->creationDateTime;
    }

    /**
     * @param string $creationDateTime
     */
    public function setCreationDateTime($creationDateTime)
    {
        $this->creationDateTime = $creationDateTime;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getNewStatus()
    {
        return $this->newStatus;
    }

    /**
     * @param string $newStatus
     */
    public function setNewStatus($newStatus)
    {
        $this->newStatus = $newStatus;
    }

    /**
     * @return string
     */
    public function getOldStatus()
    {
        return $this->oldStatus;
    }

    /**
     * @param string $oldStatus
     */
    public function setOldStatus($oldStatus)
    {
        $this->oldStatus = $oldStatus;
    }

    /**
     * @return string
     */
    public function getMerchantReferenceId()
    {
        return $this->merchantReferenceId;
    }

    /**
     * @param string $merchantReferenceId
     */
    public function setMerchantReferenceId($merchantReferenceId)
    {
        $this->merchantReferenceId = $merchantReferenceId;
    }
}