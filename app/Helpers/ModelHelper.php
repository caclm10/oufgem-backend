<?php

namespace App\Helpers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHelper
{
    public static function save(Model $model)
    {
        if (!$model->save()) abort(500);
    }

    public static function saveRelation(Model $model, string $relation = '', Model $child)
    {
        if (!$model->{$relation}()->save($child)) abort(500);
    }

    public static function delete(Model $model)
    {
        if (!$model->delete()) abort(500);
    }

    public static function destroy(Model $model, string $route = '', string $instanceName = '')
    {
        if ($model) {
            if (!$model->delete()) abort(500);

            return to_route("{$route}.index")->with('success', "{$instanceName} deleted successfully");
        }

        return to_route("{$route}.edit", [$model]);
    }

    public static function isAttributeTaken(string $table, string $attribute, $value, string|int $ignoreID = null): bool
    {
        return DB::table($table)->where($attribute, $value)->where('id', '!=', $ignoreID)->exists();
    }
}
