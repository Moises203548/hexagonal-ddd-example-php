<?php
declare(strict_types=1);

class InvalidSongDateException extends InvalidArgumentException
{
    public static function becauseFormatIsInvalid(string $value): self
    {
        return new self("La fecha de lanzamiento '$value' no es válida (formato AAAA-MM-DD).");
    }

    public static function becauseIsInFuture(string $value): self
    {
        return new self("La fecha de lanzamiento '$value' no puede estar en el futuro.");
    }
}
