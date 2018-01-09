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

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\WebPayloadInterface;

/**
 * WebNotificationPayload.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class WebNotificationPayload extends AbstractCommonNotificationPayload implements WebPayloadInterface
{
    /** @var string|null */
    private $icon;

    /**
     * @param string $icon
     *
     * @return $this
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }
}
