<?php
declare(strict_types=1);

final class SongResponse
{
    public int $id;
    public string $name;
    public string $rhythm;
    public string $duration;
    public string $album;
    public int $position;
    public string $band;
    public string $performer;
    public string $author;
    public string $releaseDate;

    /** Valores listos para rellenar el formulario de edición. */
    public function toFormValues(): array
    {
        return [
            'name' => $this->name,
            'rhythm' => $this->rhythm,
            'duration' => $this->duration,
            'album' => $this->album,
            'position' => (string) $this->position,
            'band' => $this->band,
            'performer' => $this->performer,
            'author' => $this->author,
            'release_date' => $this->releaseDate,
        ];
    }
}
