<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Part\Options;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\Options;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\OptionsFactory;
use PHPUnit\Framework\TestCase;

/**
 * OptionsFactoryTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class OptionsFactoryTest extends TestCase
{
    public function testMethodCreateOptions()
    {
        $this->assertInstanceOf(Options::class, OptionsFactory::createOptions());
    }
}
