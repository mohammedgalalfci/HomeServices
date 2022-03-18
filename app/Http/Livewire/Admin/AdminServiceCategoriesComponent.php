<?php

namespace App\Http\Livewire\Admin;
use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;
class AdminServiceCategoriesComponent extends Component
{
    use WithPagination;
    public function DeleteCategory($id){
        $category=ServiceCategory::find($id);
        if($category->image){
            unlink('images/categories/'.$category->image);
        }
        $category->delete();
        session()->flash('message','Deleted Category Successfuly');
    }
    public function render()
    {
        $categories=ServiceCategory::paginate(5);
        return view('livewire.admin.admin-service-categories-component',['categories'=>$categories])->layout('layouts.base');
    }
}
