<?php
declare(strict_types=1);

interface DeleteSongUseCase
{
    public function execute(DeleteSongCommand $command): void;
}
