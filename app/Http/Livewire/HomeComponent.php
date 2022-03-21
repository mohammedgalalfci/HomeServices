<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Servic;
class HomeComponent extends Component
{
    public function render()
    {
        $categories=ServiceCategory::all();
        $featured_services=Servic::where('featured',1)->inRandomOrder()->take(8)->get();
        $featured_categories=ServiceCategory::where('featured',1)->inRandomOrder()->take(8)->get();
        return view('livewire.home-component',['categories'=>$categories,'featured_services'=>$featured_services,'featured_categories'=>$featured_categories])->layout('layouts.base');
    }
}
