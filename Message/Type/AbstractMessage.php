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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Type;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\OptionsInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\CommonPayloadInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\TargetInterface;

/**
 * AbstractMessage.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
abstract class AbstractMessage
{
    /** @var TargetInterface */
    protected $target;

    /** @var OptionsInterface */
    protected $options;

    /** @var CommonPayloadInterface */
    protected $payload;

    /**
     * @param TargetInterface $target
     *
     * @return $this
     */
    public function setTarget(TargetInterface $target): self
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @return TargetInterface
     */
    public function getTarget(): TargetInterface
    {
        return $this->target;
    }

    /**
     * @param OptionsInterface $options
     *
     * @return $this
     */
    public function setOptions(OptionsInterface $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return OptionsInterface
     */
    public function getOptions(): OptionsInterface
    {
        return $this->options;
    }

    /**
     * @return CommonPayloadInterface
     */
    abstract public function getPayload();
}
