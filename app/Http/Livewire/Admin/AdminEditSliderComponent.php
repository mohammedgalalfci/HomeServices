<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Validation\Validator;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;
    public $slide_id;
    public $title;
    public $image;
    public $status;
    public $newImage;

    public function mount($id){
        $slider=Slider::find($id);
        $this->slide_id=$slider->id;
        $this->title=$slider->title;
        $this->image=$slider->image;
        $this->status=$slider->status;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'title' => 'required',
        ]);
        if($this->newImage){
            $this->validateOnly($fields,[
                'newImage' => 'required|mimes:jpg,jpeg,png',
            ]);
        }
    }

    public function UpdateSlider(){
        $this->validate([
            'title' => 'required',
        ]);

        if($this->newImage){
            $this->validate([
                'newImage' => 'required|mimes:jpg,jpeg,png',
            ]);
        }

        $slider=Slider::find($this->slide_id);
        $slider->title=$this->title;
        $slider->status=$this->status;
        if($this->newImage){
            unlink('images/sliders/'.$slider->image);
            $imageName=Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('sliders',$imageName);
            $slider->image=$imageName;
        }
        $slider->save();
        session()->flash('message','Edited Slider Successfuly');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.base');
    }
}
