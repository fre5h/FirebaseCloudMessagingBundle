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

namespace Fresh\FirebaseCloudMessagingBundle\Response\MessageResult;

/**
 * AbstractMessageResult.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
abstract class AbstractMessageResult implements MessageResultInterface
{
    /** @var string */
    private $token = '';

    /**
     * {@inheritdoc}
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * {@inheritdoc}
     */
    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
