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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Part\Options;

/**
 * OptionsFactory.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class OptionsFactory
{
    /**
     * @return Options
     */
    public static function createOptions(): Options
    {
        return new Options();
    }
}
