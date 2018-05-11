<?php

namespace App\Transformers;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * Returns the transformed post array
     *
     * @param App\Category $params Post instance
     *
     * @return array
     */
    public function transform($params)
    {
        $created_at = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $params->created_at
        )->format('d-m-Y');

        $params->name       = (string) $params->name;
        $params->created_at = (string) $created_at;

        return $params;
    }
}
