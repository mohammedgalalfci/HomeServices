<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Servic;
use App\Models\Slider;
class HomeComponent extends Component
{
    public function render()
    {
        $categories=ServiceCategory::all();
        $featured_services=Servic::where('featured',1)->inRandomOrder()->take(8)->get();
        $featured_categories=ServiceCategory::where('featured',1)->inRandomOrder()->take(8)->get();
        $id=ServiceCategory::whereIn('slug',['ac','hc','repair','electrical-devices'])->get()->pluck('id');
        $appliance_services=Servic::whereIn('service_category_id',$id)->inRandomOrder()->get();
        $sliders = Slider::where('status',1)->get();
        return view('livewire.home-component',['categories'=>$categories,'featured_services'=>$featured_services,'featured_categories'=>$featured_categories,'appliance_services'=>$appliance_services,'sliders'=>$sliders])->layout('layouts.base');
    }
}
