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

use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\CanonicalTokenMessageResult;

/**
 * Class CanonicalTokenMessageResultCollection.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class CanonicalTokenMessageResultCollection extends AbstractMessageResultCollection
{
    /**
     * {@inheritdoc}
     */
    public function getSupportedMessageResultType(): string
    {
        return CanonicalTokenMessageResult::class;
    }
}
