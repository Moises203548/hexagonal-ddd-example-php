<?php
declare(strict_types=1);

final class SongPosition
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value < 1 || $value > 999) {
            throw InvalidSongPositionException::becauseValueIsInvalid($value);
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
