<?php

namespace Qihucms\Menu\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Menu extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $icon = $this->icon;
        if (!empty($icon)) {
            $icon = \Storage::url($icon);
        }

        return [
            'id' => $this->id,
            'uri' => $this->uri,
            'block' => $this->block,
            'title' => $this->title,
            'icon' => $icon,
            'url' => $this->url,
            'sort' => $this->sort,
            'show_title' => boolval($this->show_title),
            'show_icon' => boolval($this->show_icon),
            'show_h5' => boolval($this->show_h5),
            'show_mini_app' => boolval($this->show_mini_app),
            'show_app' => boolval($this->show_app),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
