<?php
declare(strict_types=1);

class InvalidSongIdException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid($id): self
    {
        return new self('El id de la canción es inválido: ' . $id);
    }
}
