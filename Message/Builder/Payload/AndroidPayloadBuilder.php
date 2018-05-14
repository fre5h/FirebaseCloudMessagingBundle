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

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\AndroidNotificationPayload;

/**
 * AndroidMessageBuilder.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class AndroidPayloadBuilder extends AbstractPayloadBuilder
{
    /**
     * @param AndroidNotificationPayload $payload
     */
    public function __construct(AndroidNotificationPayload $payload)
    {
        $this->payload = $payload;
    }

    /**
     * {@inheritdoc}
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

        if (!empty($this->payload->getSound())) {
            $this->payloadPart['sound'] = (string) $this->payload->getSound();
        }

        if (!empty($this->payload->getTag())) {
            $this->payloadPart['tag'] = (string) $this->payload->getTag();
        }

        if (!empty($this->payload->getColor())) {
            $this->payloadPart['color'] = (string) $this->payload->getColor();
        }

        if (!empty($this->payload->getClickAction())) {
            $this->payloadPart['click_action'] = $this->payload->getClickAction();
        }

        if (!empty($this->payload->getBodyLocKey())) {
            $this->payloadPart['body_loc_key'] = (string) $this->payload->getBodyLocKey();
        }

        if (!empty($this->payload->getBodyLocArgs())) {
            $this->payloadPart['body_loc_args'] = (array) $this->payload->getBodyLocArgs();
        }

        if (!empty($this->payload->getTitleLocKey())) {
            $this->payloadPart['title_loc_key'] = (string) $this->payload->getTitleLocKey();
        }

        if (!empty($this->payload->getTitleLocArgs())) {
            $this->payloadPart['title_loc_args'] = (array) $this->payload->getTitleLocArgs();
        }

        return $this;
    }
}
