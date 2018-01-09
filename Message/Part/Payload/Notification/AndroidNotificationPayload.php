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

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\AndroidPayloadInterface;

/**
 * AndroidNotificationPayload.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class AndroidNotificationPayload extends AbstractMobileNotificationPayload implements AndroidPayloadInterface
{
    /** @var string|null */
    private $icon;

    /** @var string|null */
    private $tag;

    /** @var string|null */
    private $color;

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

    /**
     * @param string $tag
     *
     * @return $this
     */
    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @param string $color
     *
     * @return $this
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }
}
