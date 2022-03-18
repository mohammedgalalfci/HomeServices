<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Validation\Validator;
class AdminAddServiceCategory extends Component
{
    use WithFileUploads;
    public $cat_name;
    public $cat_slug;
    public $image;

    public function generateSlug(){
        $this->cat_slug=Str::slug($this->cat_name,'-');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'cat_name' => 'required',
            'cat_slug' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
    }
    public function createCategory(){
        $this->validate([
            'cat_name' => 'required',
            'cat_slug' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,jif',
        ]);

        $category=new ServiceCategory();
        $category->name=$this->cat_name;
        $category->slug=$this->cat_slug;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('categories',$imageName);
        $category->image=$imageName;
        $category->save();
        session()->flash('message','Added Category Successfuly');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-service-category')->layout('layouts.base');
    }
}
