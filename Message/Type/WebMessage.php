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

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\CommonPayloadInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\WebPayloadInterface;

/**
 * WebMessage.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class WebMessage extends AbstractMessage
{
    /**
     * @param WebPayloadInterface $payload
     *
     * @return $this
     */
    public function setPayload(WebPayloadInterface $payload): self
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @return WebPayloadInterface|CommonPayloadInterface
     */
    public function getPayload(): WebPayloadInterface
    {
        return $this->payload;
    }
}
