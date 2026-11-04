<?php
declare(strict_types=1);

interface GetAllSongsPort
{
    /** @return SongModel[] */
    public function getAll(?string $search, int $page, int $limit): array;
}
