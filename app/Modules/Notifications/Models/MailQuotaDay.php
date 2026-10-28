<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Models;

use Illuminate\Database\Eloquent\Model;

final class MailQuotaDay extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = 'day';

    protected $keyType = 'string';

    protected $fillable = [
        'day',
        'sent',
    ];
}
