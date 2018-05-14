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

namespace Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection;

/**
 * Class AbstractMessageResultCollection.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
abstract class AbstractMessageResultCollection implements MessageResultCollectionInterface
{
    /** @var array */
    protected $messageResults = [];

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return \current($this->messageResults);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        return \next($this->messageResults);
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return \key($this->messageResults);
    }

    /**
     * {@inheritdoc}
     */
    public function valid(): bool
    {
        $key = \key($this->messageResults);

        return null !== $key && false !== $key;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind(): void
    {
        \reset($this->messageResults);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return \count($this->messageResults);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset): bool
    {
        return isset($this->messageResults[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->messageResults[$offset] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset): void
    {
        unset($this->messageResults[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value): void
    {
        $supportedMessageResult = $this->getSupportedMessageResultType();
        if (!$value instanceof $supportedMessageResult) {
            throw new \Exception(
                \sprintf(
                    '%s does not support message result of %s. The only supported class is %s',
                    static::class,
                    \get_class($value),
                    $supportedMessageResult
                )
            );
        }

        if (null === $offset) {
            $this->messageResults[] = $value;
        } else {
            $this->messageResults[$offset] = $value;
        }
    }
}
