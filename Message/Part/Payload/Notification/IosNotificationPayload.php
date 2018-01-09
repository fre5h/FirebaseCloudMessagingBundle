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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\IosPayloadInterface;

/**
 * IosNotificationPayload.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class IosNotificationPayload extends AbstractMobileNotificationPayload implements IosPayloadInterface
{
    /** @var string|null */
    private $badge;

    /**
     * @param string $badge
     *
     * @return $this
     */
    public function setBadge(string $badge): self
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBadge(): ?string
    {
        return $this->badge;
    }
}
