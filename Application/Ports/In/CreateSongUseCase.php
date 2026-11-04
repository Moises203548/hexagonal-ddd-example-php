<?php
declare(strict_types=1);

interface CreateSongUseCase
{
    public function execute(CreateSongCommand $command): SongModel;
}
