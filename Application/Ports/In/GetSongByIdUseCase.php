<?php
declare(strict_types=1);

interface GetSongByIdUseCase
{
    public function execute(GetSongByIdQuery $query): SongModel;
}
