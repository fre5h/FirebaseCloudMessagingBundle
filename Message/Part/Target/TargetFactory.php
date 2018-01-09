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
 * TargetFactory.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class TargetFactory
{
    /**
     * @todo Find better name for method and class
     *
     * @return SingleRecipientTarget
     */
    public static function createSingleRecipientTarget(): SingleRecipientTarget
    {
        return new SingleRecipientTarget();
    }

    /**
     * @return MulticastTarget
     */
    public static function createMulticastTarget(): MulticastTarget
    {
        return new MulticastTarget();
    }

    /**
     * @return ConditionTarget
     */
    public static function createConditionTarget(): ConditionTarget
    {
        return new ConditionTarget();
    }
}
