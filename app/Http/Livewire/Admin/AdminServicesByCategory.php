<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Servic;
use Livewire\WithPagination;
class AdminServicesByCategory extends Component
{
    use WithPagination;
    
    public $category_slug;
   
    public function mount($category_slug){
        $this->category_slug=$category_slug;
    }

    public function render()
    {
        $scategory=ServiceCategory::where('slug',$this->category_slug)->first();
        $services=servic::where('service_category_id',$scategory->id)->paginate(5);
        return view('livewire.admin.admin-services-by-category',['category_name'=>$scategory->name,'services'=>$services])->layout('layouts.base');
    }
}
