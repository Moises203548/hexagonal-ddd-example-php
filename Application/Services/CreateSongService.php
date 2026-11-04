<?php
declare(strict_types=1);

final class CreateSongService implements CreateSongUseCase
{
    public function __construct(
        private SaveSongPort $saveSongPort,
        private FindDuplicateSongPort $findDuplicateSongPort
    ) {
    }

    public function execute(CreateSongCommand $command): SongModel
    {
        $song = SongApplicationMapper::fromCreateCommandToModel($command);

        if ($this->findDuplicateSongPort->findDuplicate($song) !== null) {
            throw SongAlreadyExistsException::becauseNameAlbumAndBandAlreadyExist(
                $song->name()->value(), $song->album()->value(), $song->band()->value()
            );
        }

        return $this->saveSongPort->save($song);
    }
}
