<?php
namespace App\Components;

use App\Models\Menu;

class MenuRecusive {
    private $html;
    public function __construct()
    {
        $this->html = '';
    }
    public function menuRecusiveAdd($parentId = 0, $subMark = ''){
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dateItem){
            $this->html .= '<option value="' . $dateItem->id .'">' . $subMark . $dateItem->name . '</option>';
            $this->menuRecusiveAdd($dateItem->id, $subMark . '-');
        }
        return $this->html;
    }

    public function menuRecusiveEdit($parentIdMenuEdit, $parentId = 0, $subMark = ''){
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dateItem){
            if($parentIdMenuEdit == $dateItem->id){
                $this->html .= '<option selected value="' . $dateItem->id .'">' . $subMark . $dateItem->name . '</option>';
            }else{
                $this->html .= '<option value="' . $dateItem->id .'">' . $subMark . $dateItem->name . '</option>';
            }
           
            $this->menuRecusiveEdit($parentIdMenuEdit,$dateItem->id, $subMark . '-');
        }
        return $this->html;
    }
}