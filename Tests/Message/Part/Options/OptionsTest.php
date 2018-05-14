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

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Part\Options;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\Options;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\OptionsInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\Priority;
use PHPUnit\Framework\TestCase;

/**
 * OptionsTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class OptionsTest extends TestCase
{
    public function testObjectCreation(): void
    {
        $options = new Options();
        $this->assertInstanceOf(OptionsInterface::class, $options);
        $this->assertEmpty($options->getCollapseKey());
        $this->assertSame(Priority::NORMAL, $options->getPriority());
        $this->assertFalse($options->isContentAvailable());
        $this->assertFalse($options->isMutableContent());
        $this->assertSame(Options::DEFAULT_TTL_IN_SECONDS, $options->getTimeToLive());
        $this->assertEmpty($options->getRestrictedPackageName());
        $this->assertFalse($options->isDryRun());
    }

    public function testSetGetCollapseKey(): void
    {
        $collapseKey = 'test';
        $options = (new Options())->setCollapseKey($collapseKey);
        $this->assertSame($collapseKey, $options->getCollapseKey());
    }

    public function testSetGetPriority(): void
    {
        $options = (new Options())->setPriority(Priority::HIGH);
        $this->assertSame(Priority::HIGH, $options->getPriority());
    }

    public function testSetIsContentAvailable(): void
    {
        $options = (new Options())->setContentAvailable(true);
        $this->assertTrue($options->isContentAvailable());
        $options->setContentAvailable(false);
        $this->assertFalse($options->isContentAvailable());
    }

    public function testSetIsMutableContent(): void
    {
        $options = (new Options())->setMutableContent(true);
        $this->assertTrue($options->isMutableContent());
        $options->setMutableContent(false);
        $this->assertFalse($options->isMutableContent());
    }

    public function testSetGetTimeToLive(): void
    {
        $ttl = 1234567890;
        $options = (new Options())->setTimeToLive($ttl);
        $this->assertSame($ttl, $options->getTimeToLive());
    }

    public function testSetGetRestrictedPackageName(): void
    {
        $restrictedPackageName = 'test';
        $options = (new Options())->setRestrictedPackageName($restrictedPackageName);
        $this->assertSame($restrictedPackageName, $options->getRestrictedPackageName());
    }

    public function testSetIsDryRun(): void
    {
        $options = (new Options())->setDryRun(true);
        $this->assertTrue($options->isDryRun());
        $options->setDryRun(false);
        $this->assertFalse($options->isDryRun());
    }
}
