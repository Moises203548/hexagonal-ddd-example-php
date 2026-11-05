<?php
declare(strict_types=1);

final class SongId
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw InvalidSongIdException::becauseValueIsInvalid($value);
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(SongId $other): bool
    {
        return $this->value === $other->value();
    }
}
