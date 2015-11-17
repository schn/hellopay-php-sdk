<?php

namespace HelloPay\Notification;

/**
 * Class NotificationValidator
 *
 * @package HelloPay\Notification
 */
class NotificationPayloadValidator
{
    /**
     * @param string $payload
     *
     * @return bool
     */
    public function isValidPayloadString($payload)
    {
        if (!is_string($payload)) {
            return false;
        }

        return (bool)strstr($payload, NotificationPayload::POST_RAW_KEY);
    }

    /**
     * @param array $payload
     *
     * @return bool
     */
    public function isValidPayloadArray(array $payload)
    {
        // todo: here required fields in $payload array checks
        return true;
    }
}