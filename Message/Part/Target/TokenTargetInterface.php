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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Part\Target;

/**
 * TokenTargetInterface.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
interface TokenTargetInterface
{
    /**
     * @return array
     */
    public function getSequentialSentTokens(): array;

    /**
     * @return int
     */
    public function getNumberOfSequentialSentTokens(): int;
}
