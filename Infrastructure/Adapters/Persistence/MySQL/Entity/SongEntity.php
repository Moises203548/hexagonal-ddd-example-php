<?php
declare(strict_types=1);

/** Fila de la tabla songs (objeto de persistencia, no es un modelo de dominio). */
final class SongEntity
{
    public ?int $id = null;
    public string $name = '';
    public string $rhythm = '';
    public int $durationSeconds = 0;
    public string $album = '';
    public int $positionInAlbum = 0;
    public string $band = '';
    public string $performer = '';
    public string $author = '';
    public string $releaseDate = '';

    public static function fromRow(array $row): self
    {
        $e = new self();
        $e->id = (int) $row['id'];
        $e->name = $row['name'];
        $e->rhythm = $row['rhythm'];
        $e->durationSeconds = (int) $row['duration_seconds'];
        $e->album = $row['album'];
        $e->positionInAlbum = (int) $row['position_in_album'];
        $e->band = $row['band'];
        $e->performer = $row['performer'];
        $e->author = $row['author'];
        $e->releaseDate = $row['release_date'];
        return $e;
    }
}
