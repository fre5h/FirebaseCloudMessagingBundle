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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\WebNotificationPayload;

/**
 * WebPayloadBuilder.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class WebPayloadBuilder extends AbstractPayloadBuilder
{
    /**
     * @param WebNotificationPayload $payload
     */
    public function __construct(WebNotificationPayload $payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return $this
     */
    public function build(): self
    {
        $this->payloadPart = [];

        if (!empty($this->payload->getTitle())) {
            $this->payloadPart['title'] = $this->payload->getTitle();
        }

        if (!empty($this->payload->getBody())) {
            $this->payloadPart['body'] = $this->payload->getBody();
        }

        if (!empty($this->payload->getIcon())) {
            $this->payloadPart['icon'] = (string) $this->payload->getIcon();
        }

        if (!empty($this->payload->getClickAction())) {
            $this->payloadPart['click_action'] = $this->payload->getClickAction();
        }

        return $this;
    }
}
