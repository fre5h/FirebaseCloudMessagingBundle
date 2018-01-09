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

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\AndroidPayloadInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\CommonPayloadInterface;

/**
 * AndroidMessage.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class AndroidMessage extends AbstractMessage
{
    /**
     * @param AndroidPayloadInterface $payload
     *
     * @return $this
     */
    public function setPayload(AndroidPayloadInterface $payload): self
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @return AndroidPayloadInterface|CommonPayloadInterface
     */
    public function getPayload(): AndroidPayloadInterface
    {
        return $this->payload;
    }
}
