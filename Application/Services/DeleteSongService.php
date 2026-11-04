<?php
declare(strict_types=1);

final class DeleteSongService implements DeleteSongUseCase
{
    public function __construct(
        private GetSongByIdPort $getSongByIdPort,
        private DeleteSongPort $deleteSongPort
    ) {
    }

    public function execute(DeleteSongCommand $command): void
    {
        $id = SongApplicationMapper::fromDeleteCommandToSongId($command);

        if ($this->getSongByIdPort->getById($id) === null) {
            throw SongNotFoundException::becauseIdWasNotFound($command->getId());
        }

        $this->deleteSongPort->delete($id);
    }
}
