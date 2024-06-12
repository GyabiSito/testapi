<?php

declare(strict_types=1);

class NextMovie
{
    public function __construct(
        private int $days_until,
        private string $title,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview
    ) {
    }
    public function get_until_message(): string
    {
        $days = $this->days_until;
        return match ($days) {
            0 => "Hoy",
            1 => "Mañana",
            default => "En $days dias"
        };
    }
    public static function fetch_and_create_movie(string $api_url): NextMovie
    {
        $result = file_get_contents(API_URL);
        $data = json_decode($result, true);
        return new self(
            $data["days_until"],
            $data["title"],
            $data["following_production"]["title"] ?? "Desconocido",
            $data["release_date"],
            $data["poster_url"],
            $data["overview"]
        );
    }
    public function get_data(){
        return get_object_vars($this);
    }
}
