<?php

namespace Qihucms\Menu\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Qihucms\Menu\Models\Menu;
use Qihucms\Menu\Resources\MenuCollection;

class MenuController extends ApiController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $model = new Menu();

        $uri = $request->get('uri');
        if ($uri) {
            $model = $model->where('uri', $uri);
        }

        $model = $model->orderBy('block', 'desc')
            ->orderBy('sort', 'desc')
            ->orderBy('id')->get();

        return (new MenuCollection($model));
    }
}