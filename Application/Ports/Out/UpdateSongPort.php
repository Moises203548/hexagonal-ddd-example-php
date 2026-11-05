<?php
declare(strict_types=1);

interface UpdateSongPort
{
    public function update(SongModel $song): SongModel;
}
