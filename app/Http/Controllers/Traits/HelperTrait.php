<?php

namespace App\Http\Controllers\Traits;

trait HelperTrait
{

    public function get_pagination($model)
    {
        $response = [
            'pagination' => [
                'total' => $model->total(),
                'per_page' => $model->perPage(),
                'current_page' => $model->currentPage(),
                'last_page' => $model->lastPage(),
                'from' => $model->firstItem(),
                'to' => $model->lastItem()
            ],
            'data' => $model
        ];

        return response()->json($response);
    }
}



