<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Company extends Model
{
    //
    protected $table = 'companies';

    protected $fillable = [
        'key','value'
    ];

    public static function get($key)
    {
        $company = new self();
        $entry = $company->where('key', $key)->first();

        if (!$entry) {
            return;
        }
        return $entry->value;
    }

    public static function set($key, $value = null)
    {
        $company = new self();
        $entry = $company->where('key', $key)->firstOrFail();
        $entry->value = $value;
        $entry->saveOrFail();

        Config::set('key', $value);

        if (Config::get($key) == $value) {
            return true;
        }
        return false;
    }
}
