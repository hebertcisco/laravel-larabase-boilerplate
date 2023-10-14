<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class People
 *
 * @property int $id_people
 * @property string $nickname
 * @property string $name
 * @property Carbon $birth
 * @property string|null $stack
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class People extends Model
{
    protected $table = 'peoples';

    protected $primaryKey = 'id_people';

    protected $casts = [
        'id_user' => 'int',
    ];

    protected $fillable = [
        'nickname',
        'name',
        'birth',
        'stack',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }
}
