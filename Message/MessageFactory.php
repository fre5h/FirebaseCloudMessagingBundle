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

namespace Fresh\FirebaseCloudMessagingBundle\Message;

use Fresh\FirebaseCloudMessagingBundle\Message\Type\AndroidMessage;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\IosMessage;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\WebMessage;

/**
 * Class MessageFactory.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class MessageFactory
{
    /**
     * @return WebMessage
     */
    public static function createWebMessage(): WebMessage
    {
        return new WebMessage();
    }

    /**
     * @return AndroidMessage
     */
    public static function createAndroidMessage(): AndroidMessage
    {
        return new AndroidMessage();
    }

    /**
     * @return IosMessage
     */
    public static function createIosMessage(): IosMessage
    {
        return new IosMessage();
    }
}
