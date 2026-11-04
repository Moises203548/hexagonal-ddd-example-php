<?php
declare(strict_types=1);

interface DeleteSongPort
{
    public function delete(SongId $id): void;
}
