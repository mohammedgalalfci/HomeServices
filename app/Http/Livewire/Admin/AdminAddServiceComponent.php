<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Servic;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Validation\Validator;
class AdminAddServiceComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $tagline;
    public $price;
    public $discount;
    public $discount_type;
    public $service_category_id;
    public $image;
    public $thumbnail;
    public $description;
    public $inclusion;
    public $exclusion;

    public function generateSlug(){
        $this->slug=Str::slug($this->name,'-');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required',
            'tagline'=>'required',
            'price'=>'required',
            // 'discount'=>'required',
            // 'discount_type'=>'required',
            'service_category_id'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'thumbnail'=>'required|mimes:jpg,jpeg,png',
            'description'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required',
        ]);
    }

    public function createService(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'tagline'=>'required',
            'price'=>'required',
            // 'discount'=>'required',
            // 'discount_type'=>'required',
            'service_category_id'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'thumbnail'=>'required|mimes:jpg,jpeg,png',
            'description'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required',
        ]);

        $service=new Servic();
        $service->name=$this->name;
        $service->slug=$this->slug;
        $service->tagline=$this->tagline;
        $service->price = $this->price;
        $service->discount = $this->discount;
        $service->discount_type = $this->discount_type;
        $service->service_category_id = $this->service_category_id;
        // $service->image = $this->image;
        // $service->thumbnail = $this->thumbnail;
        $service->description = $this->description;
        $service->inclusion = str_replace('\n','|',trim($this->inclusion));
        $service->exclusion = str_replace('\n','|',trim($this->exclusion));

        $imageName1=Carbon::now()->timestamp.'.'.$this->thumbnail->extension();
        $this->thumbnail->storeAs('services/thumbnails',$imageName1);
        $service->thumbnail=$imageName1;

        $imageName2=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('services',$imageName2);
        $service->image=$imageName2;

        $service->save();
        session()->flash('message','Added Service Successfuly');
    }

    public function render()
    {
        $categories=ServiceCategory::all();
        return view('livewire.admin.admin-add-service-component',['categories'=>$categories])->layout('layouts.base');
    }
}
