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
 * OptionsInterface.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
interface OptionsInterface
{
    /**
     * @return string
     */
    public function getCollapseKey(): string;

    /**
     * @return string
     */
    public function getPriority(): string;

    /**
     * @return bool
     */
    public function isContentAvailable(): bool;

    /**
     * @return bool
     */
    public function isMutableContent(): bool;

    /**
     * @return int
     */
    public function getTimeToLive(): int;

    /**
     * @return string
     */
    public function getRestrictedPackageName(): string;

    /**
     * @return bool
     */
    public function isDryRun(): bool;
}
