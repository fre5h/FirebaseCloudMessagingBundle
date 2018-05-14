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

/**
 * AbstractMobileNotificationPayload.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
abstract class AbstractMobileNotificationPayload extends AbstractCommonNotificationPayload
{
    /** @var string|null */
    private $sound;

    /** @var string|null */
    private $bodyLocKey;

    /** @var string[]|null */
    private $bodyLocArgs;

    /** @var string|null */
    private $titleLocKey;

    /** @var string[]|null */
    private $titleLocArgs;

    /**
     * @param string $sound
     *
     * @return $this
     */
    public function setSound(string $sound): self
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSound(): ?string
    {
        return $this->sound;
    }

    /**
     * @param string $bodyLocKey
     *
     * @return $this
     */
    public function setBodyLocKey(string $bodyLocKey): self
    {
        $this->bodyLocKey = $bodyLocKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBodyLocKey(): ?string
    {
        return $this->bodyLocKey;
    }

    /**
     * @param string[] $bodyLocArgs
     *
     * @return $this
     */
    public function setBodyLocArgs(array $bodyLocArgs): self
    {
        foreach ($bodyLocArgs as &$bodyLocArg) {
            $bodyLocArg = (string) $bodyLocArg;
        }
        unset($bodyLocArg);
        $this->bodyLocArgs = $bodyLocArgs;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getBodyLocArgs(): ?array
    {
        return $this->bodyLocArgs;
    }

    /**
     * @param string $titleLocKey
     *
     * @return $this
     */
    public function setTitleLocKey(string $titleLocKey): self
    {
        $this->titleLocKey = $titleLocKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitleLocKey(): ?string
    {
        return $this->titleLocKey;
    }

    /**
     * @param string[] $titleLocArgs
     *
     * @return $this
     */
    public function setTitleLocArgs(array $titleLocArgs): self
    {
        foreach ($titleLocArgs as &$titleLocArg) {
            $titleLocArg = (string) $titleLocArg;
        }
        unset($titleLocArg);
        $this->titleLocArgs = $titleLocArgs;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getTitleLocArgs(): ?array
    {
        return $this->titleLocArgs;
    }
}
