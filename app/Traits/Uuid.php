<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid as Generator;

trait Uuid
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                // if(Schema::hasColumn($model->getTable(),'uuid')) {
                $model->uuid = Generator::uuid1()->toString();
                // }
            } catch (\Exception $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
