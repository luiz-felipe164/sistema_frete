<?php 

namespace App\Enums;

abstract class StatusEnum {

    const STARTED   = 'started';
    const IN_TRASIT = 'in_transit';
    const COMPLETED = 'completed';

    public static function toArray(): array
    {
        return [
            self::STARTED,
            self::IN_TRASIT,
            self::COMPLETED,
        ];
    }

    public static function getPtBr(): array
    {
        return [
            'Iniciado'    => self::STARTED,
            'Em Trânsito' => self::IN_TRASIT,
            'Completado'  => self::COMPLETED,
        ];
    }
}