<?php

declare(strict_types=1);

namespace App\Repository\Interface;

interface GameRepositoryInterface
{
    public const TYPE_DEFAULT = 'game';
    public  const TYPE_ALL = 'all';

    public const LIMIT = 15;

    public function filterBy(?string $phrase, string $type = self::TYPE_DEFAULT, int $size = self::LIMIT);

    public function showDetails(int $id);
    public function stats();

    public function best();
    public function scoreStats();
}
