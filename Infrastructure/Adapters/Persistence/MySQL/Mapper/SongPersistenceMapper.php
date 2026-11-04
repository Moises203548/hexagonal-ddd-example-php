<?php
declare(strict_types=1);

final class SongPersistenceMapper
{
    public function toEntity(SongModel $m): SongEntity
    {
        $e = new SongEntity();
        $e->id = $m->id()?->value();
        $e->name = $m->name()->value();
        $e->rhythm = $m->rhythm();
        $e->durationSeconds = $m->duration()->seconds();
        $e->album = $m->album()->value();
        $e->positionInAlbum = $m->position()->value();
        $e->band = $m->band()->value();
        $e->performer = $m->performer()->value();
        $e->author = $m->author()->value();
        $e->releaseDate = $m->releaseDate()->value();
        return $e;
    }

    public function toModel(SongEntity $e): SongModel
    {
        return new SongModel(
            $e->id !== null ? new SongId($e->id) : null,
            new SongName($e->name),
            $e->rhythm,
            new SongDuration($e->durationSeconds),
            new SongText('álbum', $e->album),
            new SongPosition($e->positionInAlbum),
            new SongText('banda', $e->band),
            new SongText('intérprete', $e->performer),
            new SongText('autor', $e->author),
            new ReleaseDate($e->releaseDate)
        );
    }
}
