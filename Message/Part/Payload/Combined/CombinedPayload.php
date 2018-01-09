<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Combined;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\AndroidPayloadInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Data\DataPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\IosPayloadInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\AbstractCommonNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\WebPayloadInterface;

/**
 * CombinedPayload.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class CombinedPayload implements AndroidPayloadInterface, IosPayloadInterface, WebPayloadInterface
{
    /** @var DataPayload */
    private $dataPayload;

    /** @var AbstractCommonNotificationPayload */
    private $notificationPayload;

    /**
     * @param DataPayload $dataPayload
     *
     * @return $this
     */
    public function setDataPayload(DataPayload $dataPayload): self
    {
        $this->dataPayload = $dataPayload;

        return $this;
    }

    /**
     * @return DataPayload
     */
    public function getDataPayload(): DataPayload
    {
        return $this->dataPayload;
    }

    /**
     * @param AbstractCommonNotificationPayload $notificationPayload
     *
     * @return $this
     */
    public function setNotificationPayload(AbstractCommonNotificationPayload $notificationPayload): self
    {
        $this->notificationPayload = $notificationPayload;

        return $this;
    }

    /**
     * @return AbstractCommonNotificationPayload
     */
    public function getNotificationPayload(): AbstractCommonNotificationPayload
    {
        return $this->notificationPayload;
    }
}
