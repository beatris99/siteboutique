<?php

namespace App\Enums;

enum LeadStatus: string
{
    case New = 'new';
    case Contacted = 'contacted';
    case InDiscussion = 'in_discussion';
    case Won = 'won';
    case Lost = 'lost';

    public function label(): string
    {
        return match ($this) {
            self::New => 'Nou',
            self::Contacted => 'Contactat',
            self::InDiscussion => 'În discuție',
            self::Won => 'Câștigat',
            self::Lost => 'Pierdut',
        };
    }

    public static function values(): array
    {
        return array_map(
            fn (self $status) => $status->value,
            self::cases()
        );
    }
}
