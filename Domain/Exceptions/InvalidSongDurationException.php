<?php
declare(strict_types=1);

class InvalidSongDurationException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(int $seconds): self
    {
        return new self('La duración debe estar entre 1 segundo y 10 horas. Recibido: ' . $seconds . ' s.');
    }

    public static function becauseFormatIsInvalid(string $value): self
    {
        return new self("La duración '$value' no tiene el formato mm:ss (ej. 03:45).");
    }
}
