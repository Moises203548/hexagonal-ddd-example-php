<?php
declare(strict_types=1);

final class UpdateSongService implements UpdateSongUseCase
{
    public function __construct(
        private GetSongByIdPort $getSongByIdPort,
        private FindDuplicateSongPort $findDuplicateSongPort,
        private UpdateSongPort $updateSongPort
    ) {
    }

    public function execute(UpdateSongCommand $command): SongModel
    {
        $song = SongApplicationMapper::fromUpdateCommandToModel($command);

        if ($this->getSongByIdPort->getById($song->id()) === null) {
            throw SongNotFoundException::becauseIdWasNotFound($command->getId());
        }

        if ($this->findDuplicateSongPort->findDuplicate($song) !== null) {
            throw SongAlreadyExistsException::becauseNameAlbumAndBandAlreadyExist(
                $song->name()->value(), $song->album()->value(), $song->band()->value()
            );
        }

        return $this->updateSongPort->update($song);
    }
}
