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

/**
 * AbstractPayloadBuilder.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
abstract class AbstractPayloadBuilder implements PayloadBuilderInterface
{
    /** @var PayloadBuilderInterface */
    protected $payload;

    /** @var array */
    protected $payloadPart = [];

    /**
     * {@inheritdoc}
     */
    public function getPayloadPart(): array
    {
        return $this->payloadPart;
    }
}
