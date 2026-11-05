<?php
declare(strict_types=1);

final class SongRhythmEnum
{
    public const BALADA = 'BALADA';
    public const ROCK = 'ROCK';
    public const POP = 'POP';
    public const SALSA = 'SALSA';
    public const VALLENATO = 'VALLENATO';
    public const CUMBIA = 'CUMBIA';
    public const REGGAETON = 'REGGAETON';
    public const MERENGUE = 'MERENGUE';
    public const BACHATA = 'BACHATA';
    public const RAP = 'RAP';
    public const ELECTRONICA = 'ELECTRONICA';
    public const JAZZ = 'JAZZ';
    public const OTRO = 'OTRO';

    public static function values(): array
    {
        return [
            self::BALADA, self::ROCK, self::POP, self::SALSA, self::VALLENATO,
            self::CUMBIA, self::REGGAETON, self::MERENGUE, self::BACHATA,
            self::RAP, self::ELECTRONICA, self::JAZZ, self::OTRO,
        ];
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }

    public static function ensureIsValid(string $value): void
    {
        if (!self::isValid($value)) {
            throw InvalidSongRhythmException::becauseValueIsInvalid($value);
        }
    }
}
