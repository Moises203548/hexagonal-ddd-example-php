<?php
declare(strict_types=1);

final class SongApplicationMapper
{
    public static function fromCreateCommandToModel(CreateSongCommand $c): SongModel
    {
        return new SongModel(
            null,
            new SongName($c->getName()),
            strtoupper($c->getRhythm()),
            new SongDuration($c->getDurationSeconds()),
            new SongText('álbum', $c->getAlbum()),
            new SongPosition($c->getPosition()),
            new SongText('banda', $c->getBand()),
            new SongText('intérprete', $c->getPerformer()),
            new SongText('autor', $c->getAuthor()),
            new ReleaseDate($c->getReleaseDate())
        );
    }

    public static function fromUpdateCommandToModel(UpdateSongCommand $c): SongModel
    {
        return new SongModel(
            new SongId($c->getId()),
            new SongName($c->getName()),
            strtoupper($c->getRhythm()),
            new SongDuration($c->getDurationSeconds()),
            new SongText('álbum', $c->getAlbum()),
            new SongPosition($c->getPosition()),
            new SongText('banda', $c->getBand()),
            new SongText('intérprete', $c->getPerformer()),
            new SongText('autor', $c->getAuthor()),
            new ReleaseDate($c->getReleaseDate())
        );
    }

    public static function fromGetByIdQueryToSongId(GetSongByIdQuery $q): SongId
    {
        return new SongId($q->getId());
    }

    public static function fromDeleteCommandToSongId(DeleteSongCommand $c): SongId
    {
        return new SongId($c->getId());
    }
}
