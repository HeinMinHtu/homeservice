<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCategory;

class HomeComponent extends Component
{
    public function render()
    {
        $scategories=ServiceCategory::inRandomOrder()->take(18)->get();
        $fservices=Service::where('featured',1)->inRandomOrder()->take(8)->get();

        $fscategories=ServiceCategory::where('featured',1)->take(8)->get();

        $sid=ServiceCategory::whereIn('slug',['ac','tv','refrigerator','geyser','water-purifier',])->get()->pluck('id');
        $aservices=Service::whereIn('service_category_id',$sid)->inRandomOrder()->take(8)->get();
        $slides=Slider::where('status',1)->get();
        return view('livewire.home-component',['scategories'=>$scategories,'fservices'=>$fservices,'fscategories'=>$fscategories,'aservices'=>$aservices,'slides'=>$slides])->layout('layouts.base');
    }


}
