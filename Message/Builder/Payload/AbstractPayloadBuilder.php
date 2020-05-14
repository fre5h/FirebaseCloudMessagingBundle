<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle.
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\CommonPayloadInterface;

/**
 * AbstractPayloadBuilder.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
abstract class AbstractPayloadBuilder implements PayloadBuilderInterface
{
    protected CommonPayloadInterface $payload;

    protected array $payloadPart = [];

    /**
     * {@inheritdoc}
     */
    public function getPayloadPart(): array
    {
        return $this->payloadPart;
    }
}
