<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Validation\Validator;
class AdminEditServiceCategory extends Component
{   
    use WithFileUploads;
    public $cat_id;
    public $cat_name;
    public $cat_slug;
    public $image;
    public $newImage;
    public $featured;

    public function generateSlug(){
        $this->cat_slug=Str::slug($this->cat_name,'-');
    }

    public function mount($id){
        $category=ServiceCategory::find($id);
        $this->cat_id=$category->id;
        $this->cat_name=$category->name;
        $this->cat_slug=$category->slug;
        $this->image=$category->image;
        $this->featured=$category->featured;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'cat_name' => 'required',
            'cat_slug' => 'required',
        ]);
        if($this->newImage){
            $this->validateOnly($fields,[
                'newImage' => 'required|mimes:jpg,jpeg,png,jif',
            ]);
        }
    }

    public function UpdateCategory(){
        $this->validate([
            'cat_name' => 'required',
            'cat_slug' => 'required',
        ]);

        if($this->newImage){
            $this->validate([
                'newImage' => 'required|mimes:jpg,jpeg,png,jif',
            ]);
        }

        $category=ServiceCategory::find($this->cat_id);
        $category->name=$this->cat_name;
        $category->slug=$this->cat_slug;
        $category->featured=$this->featured;
        if($this->newImage){
            $imageName=Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('categories',$imageName);
            $category->image=$imageName;
        }
        $category->save();
        session()->flash('message','Edited Category Successfuly');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-service-category')->layout('layouts.base');
    }
}
