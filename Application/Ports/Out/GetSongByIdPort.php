<?php
declare(strict_types=1);

interface GetSongByIdPort
{
    public function getById(SongId $id): ?SongModel;
}
