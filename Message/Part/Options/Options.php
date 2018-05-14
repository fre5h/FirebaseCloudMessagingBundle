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
 * Class Options.
 *
 * Set of options that can be used to change default behaviour of FCM notification.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
final class Options implements OptionsInterface
{
    /**
     * Default `time_to_live` option value is 4 weeks (it is also the maximum TTL allowed for FCM).
     * In seconds it is 60 seconds * 60 minutes * 24 hours * 28 days = 2419200 seconds.
     */
    public const DEFAULT_TTL_IN_SECONDS = 2419200;

    /** @var string */
    private $collapseKey = '';

    /** @var string */
    private $priority = Priority::NORMAL;

    /** @var bool */
    private $contentAvailable = false;

    /** @var bool */
    private $mutableContent = false;

    /** @var int */
    private $timeToLive = self::DEFAULT_TTL_IN_SECONDS;

    /** @var string */
    private $restrictedPackageName = '';

    /** @var bool */
    private $dryRun = false;

    /**
     * @param string $collapseKey
     *
     * @return $this
     */
    public function setCollapseKey(string $collapseKey): self
    {
        $this->collapseKey = $collapseKey;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCollapseKey(): string
    {
        return $this->collapseKey;
    }

    /**
     * @param string $priority
     *
     * @return $this
     */
    public function setPriority(string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority(): string
    {
        return $this->priority;
    }

    /**
     * @param bool $contentAvailable
     *
     * @return $this
     */
    public function setContentAvailable(bool $contentAvailable): self
    {
        $this->contentAvailable = $contentAvailable;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isContentAvailable(): bool
    {
        return $this->contentAvailable;
    }

    /**
     * @param bool $mutableContent
     *
     * @return $this
     */
    public function setMutableContent(bool $mutableContent): self
    {
        $this->mutableContent = $mutableContent;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isMutableContent(): bool
    {
        return $this->mutableContent;
    }

    /**
     * @param int $timeToLive
     *
     * @return $this
     */
    public function setTimeToLive(int $timeToLive): self
    {
        $this->timeToLive = $timeToLive;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTimeToLive(): int
    {
        return $this->timeToLive;
    }

    /**
     * @param string $restrictedPackageName
     *
     * @return $this
     */
    public function setRestrictedPackageName(string $restrictedPackageName): self
    {
        $this->restrictedPackageName = $restrictedPackageName;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRestrictedPackageName(): string
    {
        return $this->restrictedPackageName;
    }

    /**
     * @param bool $dryRun
     *
     * @return $this
     */
    public function setDryRun(bool $dryRun): self
    {
        $this->dryRun = $dryRun;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isDryRun(): bool
    {
        return $this->dryRun;
    }
}
