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

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\CommonPayloadInterface;

/**
 * AbstractCommonNotificationPayload.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
abstract class AbstractCommonNotificationPayload implements CommonPayloadInterface
{
    /** @var string */
    private $title = '';

    /** @var string */
    private $body = '';

    /** @var string */
    private $clickAction = '';

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $clickAction
     *
     * @return $this
     */
    public function setClickAction(string $clickAction): self
    {
        $this->clickAction = $clickAction;

        return $this;
    }

    /**
     * @return string
     */
    public function getClickAction(): string
    {
        return $this->clickAction;
    }
}
