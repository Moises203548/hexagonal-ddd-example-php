<?php
declare(strict_types=1);

final class GetSongByIdService implements GetSongByIdUseCase
{
    public function __construct(private GetSongByIdPort $getSongByIdPort)
    {
    }

    public function execute(GetSongByIdQuery $query): SongModel
    {
        $song = $this->getSongByIdPort->getById(SongApplicationMapper::fromGetByIdQueryToSongId($query));

        if ($song === null) {
            throw SongNotFoundException::becauseIdWasNotFound($query->getId());
        }

        return $song;
    }
}
