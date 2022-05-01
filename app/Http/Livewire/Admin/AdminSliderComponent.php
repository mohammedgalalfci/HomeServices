<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithPagination;

class AdminSliderComponent extends Component
{
    use WithPagination;

    public function DeleteSlider($id){
        $slider=Slider::find($id);
        if($slider->image){
            unlink('images/sliders/'.$slider->image);
        }
        $slider->delete();
        session()->flash('message','Deleted Slider Successfuly');
    }

    public function render()
    {
        $sliders = Slider::paginate(5);
        return view('livewire.admin.admin-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
