<?php

namespace App\Services;

use App\Models\ActionLog;

class ActionLogService
{
    public static function log(
        string $action,
        int $userId,
        ?int $characterId = null,
        ?int $itemId = null,
        array $metadata = []
    ): void {
        ActionLog::create([
            'action' => $action,
            'user_id' => $userId,
            'character_id' => $characterId,
            'item_id' => $itemId,
            'metadata' => $metadata,
            'created_at' => now(),
        ]);
    }
}
