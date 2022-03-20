<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servic;
class ServiceDetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug=$slug;
    }
    public function render()
    {
        $service=Servic::where('slug',$this->slug)->first();
        $related_service=Servic::where('service_category_id',$service->service_category_id)
                                ->where('slug','!=',$this->slug)
                                ->inRandomOrder()
                                ->first();
        return view('livewire.service-details-component',['service'=>$service,'related_service'=>$related_service])->layout('layouts.base');
    }
}
