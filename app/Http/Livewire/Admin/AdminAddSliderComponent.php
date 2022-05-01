<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Validation\Validator;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $status=0;

    public function updated($fields){
        $this->validateOnly($fields,[
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
    }
    public function createSlider(){
        $this->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $slider=new Slider();
        $slider->title=$this->title;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sliders',$imageName);
        $slider->image=$imageName;
        $slider->save();
        session()->flash('message','Added Slider Successfuly');
    }

    public function render()
    {       
        return view('livewire.admin.admin-add-slider-component')->layout('layouts.base');
    }
}
