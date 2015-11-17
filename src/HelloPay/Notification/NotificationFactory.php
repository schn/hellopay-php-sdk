<?php

namespace HelloPay\Notification;
use HelloPay\HelloPayResponse;

/**
 * Class NotificationParser
 *
 * @package HelloPay\Notification
 */
class NotificationFactory
{
    /**
     * @var NotificationPayloadValidator
     */
    private $notificationPayloadValidator;

    /**
     * NotificationParser constructor.
     */
    public function __construct()
    {
        $this->notificationPayloadValidator = new NotificationPayloadValidator();
    }

    /**
     * @param string $payload
     *
     * @return HelloPayResponse
     */
    public function createFromPayload($payload)
    {
        if (!$this->notificationPayloadValidator->isValidPayloadString($payload)) {
            throw new NotificationFactoryException('Notification payload string is invalid');
        }

        // todo: we need some more validation here =)
        $transactionEventsRaw = strstr($payload, NotificationPayload::POST_RAW_KEY);
        $transactionEventsRaw = str_replace(NotificationPayload::POST_RAW_KEY, '', $transactionEventsRaw);
        $transactionEventsRaw = urldecode($transactionEventsRaw);

        $decodedData = json_decode($transactionEventsRaw, true);
        if (!$this->notificationPayloadValidator->isValidPayloadArray($decodedData)) {
            throw new NotificationFactoryException('Notification payload array'
            . 'doesnt contain all required fields');
        }

        $decodedResponse = $decodedData[0];

        $notificationResponse = new NotificationResponse();
        $notificationResponse->setId($decodedResponse['id']);
        $notificationResponse->setCreationDateTime($decodedResponse['creationDateTime']);
        $notificationResponse->setMerchantReferenceId($decodedResponse['merchantReferenceId']);
        $notificationResponse->setNewStatus($decodedResponse['newStatus']);
        $notificationResponse->setOldStatus($decodedResponse['oldStatus']);
        $notificationResponse->setTransactionId($decodedResponse['transactionId']);
        $notificationResponse->setMessage('Notification response successfuly builded');
        $notificationResponse->setSuccess(true);

        return $notificationResponse;
    }
}