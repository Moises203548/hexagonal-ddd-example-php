<?php
declare(strict_types=1);

interface GetAllSongsUseCase
{
    /** @return SongModel[] */
    public function execute(GetAllSongsQuery $query): array;
}
