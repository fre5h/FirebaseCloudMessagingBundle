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
 * Class CanonicalTokenMessageResult.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class CanonicalTokenMessageResult extends AbstractSuccessfulMessageResult implements CanonicalTokenMessageResultInterface
{
    /** @var string */
    private $canonicalToken = '';

    /**
     * {@inheritdoc}
     */
    public function getCanonicalToken(): string
    {
        return $this->canonicalToken;
    }

    /**
     * {@inheritdoc}
     */
    public function setCanonicalToken(string $canonicalToken): self
    {
        $this->canonicalToken = $canonicalToken;

        return $this;
    }
}
