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
 * Class FailedMessageResult.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class FailedMessageResult extends AbstractMessageResult implements FailedMessageResultInterface
{
    /** @var string */
    private $error = '';

    /**
     * {@inheritdoc}
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * {@inheritdoc}
     */
    public function setError(string $error): self
    {
        $this->error = $error;

        return $this;
    }
}
