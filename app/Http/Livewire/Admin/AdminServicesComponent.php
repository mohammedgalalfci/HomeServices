<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Servic;
use Livewire\WithPagination;
class AdminServicesComponent extends Component
{
    use WithPagination;
    public function DeleteService($id){
        $service=Servic::find($id);
        if($service->image && $service->thumbnail){
            unlink('images/services/thumbnails/'.$service->thumbnail);
            unlink('images/services/'.$service->image);
        }
        $service->delete();
        session()->flash('message','Deleted Service Successfuly');
    }
    public function render()
    {
        $services=Servic::paginate(5);
        return view('livewire.admin.admin-services-component',['services'=>$services])->layout('layouts.base');
    }
}
