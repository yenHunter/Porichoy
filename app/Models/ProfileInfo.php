<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProfileInfo extends Model
{
    /**
     * The `use_for` value marking a row as basic information.
     */
    public const BASIC = 'basic';

    /**
     * The `use_for` value marking a row as personal information.
     */
    public const PERSONAL = 'personal';

    /**
     * The `use_for` value marking a row as address information.
     */
    public const ADDRESS = 'address';

    /**
     * The `use_for` value marking a row as present address information.
     */
    public const PRESENT_ADDRESS = 'present_address';

    /**
     * The `use_for` value marking a row as permanent address information.
     */
    public const PERMANENT_ADDRESS = 'permanent_address';

    /**
     * The `use_for` value marking a row as social information.
     */
    public const SOCIAL = 'social';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profile_infos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'use_for',
        'column_title',
        'column_name',
        'column_value',
        'column_status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'column_status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope for filtering by category (basic, personal, address, social).
     *
     * @param  Builder  $query
     * @param  string  $category
     * @return Builder
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('use_for', $category);
    }

    /**
     * Scope for active records only.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeActive($query)
    {
        return $query->where('column_status', true);
    }

    /**
     * Scope for getting basic information.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeBasicInfo($query)
    {
        return $query->byCategory(self::BASIC);
    }

    /**
     * Scope for getting personal information.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopePersonalInfo($query)
    {
        return $query->byCategory(self::PERSONAL);
    }

    /**
     * Scope for getting address information.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeAddressInfo($query)
    {
        return $query->byCategory(self::ADDRESS);
    }

    /**
     * Scope for getting social information.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeSocialInfo($query)
    {
        return $query->byCategory(self::SOCIAL);
    }

    /**
     * Scope for getting present address information.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopePresentAddressInfo($query)
    {
        return $query->byCategory(self::PRESENT_ADDRESS);
    }

    /**
     * Scope for getting permanent address information.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopePermanentAddressInfo($query)
    {
        return $query->byCategory(self::PERMANENT_ADDRESS);
    }

    /**
     * Get column value by column name for a specific category.
     *
     * @param  string  $category
     * @param  string  $columnName
     * @return string|null
     */
    public static function getValueByColumnName($category, $columnName)
    {
        return self::byCategory($category)
            ->active()
            ->where('column_name', $columnName)
            ->value('column_value');
    }
}
