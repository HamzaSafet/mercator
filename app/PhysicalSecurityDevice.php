<?php

namespace App;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\PhysicalSecurityDevice
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $site_id
 * @property int|null $building_id
 * @property int|null $bay_id
 *
 * @property-read \App\Bay|null $bay
 * @property-read \App\Building|null $building
 * @property-read \App\Site|null $site
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice newQuery()
 * @method static \Illuminate\Database\Query\Builder|PhysicalSecurityDevice onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereBayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereBuildingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereSiteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalSecurityDevice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PhysicalSecurityDevice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PhysicalSecurityDevice withoutTrashed()
 *
 * @mixin \Eloquent
 */
class PhysicalSecurityDevice extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'physical_security_devices';

    public static $searchable = [
        'name',
        'type',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'type',
        'description',
        'site_id',
        'building_id',
        'bay_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function bay()
    {
        return $this->belongsTo(Bay::class, 'bay_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
