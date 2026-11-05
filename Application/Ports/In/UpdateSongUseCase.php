<?php
declare(strict_types=1);

interface UpdateSongUseCase
{
    public function execute(UpdateSongCommand $command): SongModel;
}
