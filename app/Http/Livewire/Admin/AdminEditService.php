<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Servic;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Validation\Validator;
class AdminEditService extends Component
{
    use WithFileUploads;
    public $service_id;
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
    public $featured;

    public $newImage;
    public $newThumbnail;

    public function generateSlug(){
        $this->slug=Str::slug($this->name,'-');
    }

    public function mount($slug){
        $service=Servic::where('slug',$slug)->first();
        $this->service_id=$service->id;
        $this->name=$service->name;
        $this->slug=$service->slug;
        $this->tagline=$service->tagline;
        $this->price=$service->price;
        $this->discount=$service->discount;
        $this->discount_type=$service->discount_type;
        $this->service_category_id=$service->service_category_id;
        $this->image=$service->image;
        $this->thumbnail=$service->thumbnail;
        $this->description=$service->description;
        $this->featured=$service->featured;
        $this->inclusion=str_replace('\n','|',trim($service->inclusion));
        $this->exclusion=str_replace('\n','|',trim($service->exclusion));
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
            // 'image'=>'required|mimes:jpg,jpeg,png',
            // 'thumbnail'=>'required|mimes:jpg,jpeg,png',
            'description'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required',
        ]);

        if($this->newThumbnail){
            $this->validateOnly($fields,[
                'newThumbnail' => 'required|mimes:jpg,jpeg,png,jif',
            ]);
        }

        if($this->newImage){
            $this->validateOnly($fields,[
                'newImage' => 'required|mimes:jpg,jpeg,png,jif',
            ]);
        }
    }

    public function UpdateService(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'tagline'=>'required',
            'price'=>'required',
            // 'discount'=>'required',
            // 'discount_type'=>'required',
            'service_category_id'=>'required',
            // 'image'=>'required|mimes:jpg,jpeg,png',
            // 'thumbnail'=>'required|mimes:jpg,jpeg,png',
            'description'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required',
        ]);

        if($this->newThumbnail){
            $this->validate([
                'newThumbnail' => 'required|mimes:jpg,jpeg,png,jif',
            ]);
        }

        if($this->newImage){
            $this->validate([
                'newImage' => 'required|mimes:jpg,jpeg,png,jif',
            ]);
        }

        $service=Servic::find($this->service_id);
        $service->name=$this->name;
        $service->slug=$this->slug;
        $service->tagline=$this->tagline;
        $service->price=$this->price;
        $service->discount=$this->discount;
        $service->discount_type=$this->discount_type;
        $service->service_category_id=$this->service_category_id;
        $service->image=$this->image;
        $service->thumbnail=$this->thumbnail;
        $service->description=$this->description;
        $service->featured=$this->featured;
        $service->inclusion=str_replace('\n','|',trim($this->inclusion));
        $service->exclusion=str_replace('\n','|',trim($this->exclusion));

        if($this->newThumbnail){
            unlink('images/services/thumbnails/'.$service->thumbnail);
            $imageName1=Carbon::now()->timestamp.'.'.$this->newThumbnail->extension();
            $this->newThumbnail->storeAs('services/thumbnails',$imageName1);
            $service->thumbnail=$imageName1;
        }

        if($this->newImage){
            unlink('images/services/'.$service->image);
            $imageName2=Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('services',$imageName2);
            $service->image=$imageName2;
        }

        $service->save();
        session()->flash('message','Edited Category Successfuly');
    }


    public function render()
    {
        $categories=ServiceCategory::all();
        return view('livewire.admin.admin-edit-service',['categories'=>$categories])->layout('layouts.base');
    }
}
