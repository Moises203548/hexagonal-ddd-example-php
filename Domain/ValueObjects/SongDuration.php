<?php
declare(strict_types=1);

/** Duración en segundos (1 s a 10 h). */
final class SongDuration
{
    private int $seconds;

    public function __construct(int $seconds)
    {
        if ($seconds < 1 || $seconds > 36000) {
            throw InvalidSongDurationException::becauseValueIsInvalid($seconds);
        }
        $this->seconds = $seconds;
    }

    public function seconds(): int
    {
        return $this->seconds;
    }

    public function formatted(): string
    {
        return sprintf('%02d:%02d', intdiv($this->seconds, 60), $this->seconds % 60);
    }
}
