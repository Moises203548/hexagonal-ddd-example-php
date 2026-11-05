<?php
declare(strict_types=1);

class SongAlreadyExistsException extends DomainException
{
    public static function becauseNameAlbumAndBandAlreadyExist(string $name, string $album, string $band): self
    {
        return new self("Ya existe la canción '$name' del álbum '$album' de la banda '$band'.");
    }
}
