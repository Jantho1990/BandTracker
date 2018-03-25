<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sort(&$collection, $sort_param, $sort_dir = null)
    {
        switch ($sort_dir) {
            case 'desc':
                $collection = $collection->sortByDesc($sort_param);
                break;
            default:
                $collection = $collection->sortBy($sort_param);
        }
        $collection->values()->all();
    }
}
