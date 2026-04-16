<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileInfo extends Model
{
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
        'column_status'     => 'boolean',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
    ];

    /**
     * Scope for filtering by category (basic, personal, address, social).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('use_for', $category);
    }

    /**
     * Scope for active records only.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('column_status', true);
    }

    /**
     * Scope for getting basic information.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBasicInfo($query)
    {
        return $query->byCategory('basic');
    }

    /**
     * Scope for getting personal information.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePersonalInfo($query)
    {
        return $query->byCategory('personal');
    }

    /**
     * Scope for getting address information.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAddressInfo($query)
    {
        return $query->byCategory('address');
    }

    /**
     * Scope for getting social information.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSocialInfo($query)
    {
        return $query->byCategory('social');
    }

    /**
     * Get column value by column name for a specific category.
     *
     * @param string $category
     * @param string $columnName
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
