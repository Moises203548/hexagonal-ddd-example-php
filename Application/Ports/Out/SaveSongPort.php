<?php
declare(strict_types=1);

interface SaveSongPort
{
    public function save(SongModel $song): SongModel;
}
