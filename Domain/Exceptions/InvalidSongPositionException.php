<?php
declare(strict_types=1);

class InvalidSongPositionException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(int $position): self
    {
        return new self('La posición en el álbum debe ser un entero entre 1 y 999. Recibido: ' . $position);
    }
}
