<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status,$brand_id,$category_id;

    public function rules()
    {
        return [
            'name'=>'required|string',
            'slug'=>'required|string',
            'category_id'=>'required|integer',
            'status'=>'nullable'
        ];
    }


    public function resetInput(){
        $this->name =Null;
        $this->slug =Null;
        $this->status =Null;
        $this->brand_id =NULL;
        $this->category_id =NULL;
    }
//Code to add brand on the database
    public function storeBrand(){
        $validatedData = $this->validate();
        Brand::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status == true? '1': '0',
            'category_id'=>$this->category_id,
        ]);
        session()->flash('message', 'Brand Added Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function closeModal(){
        $this->resetInput();
    }

    public function openModal(){
        $this->resetInput();
    }
//code to edit/update brand model
    public function editBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrfail($brand_id);
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
        $this->category_id=$brand->category_id;
    }

    public function updateBrand(){
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status == true? '1': '0',
            'category_id'=>$this->category_id,

        ]);
        session()->flash('message', 'Brand Updated Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    //code to delete brands
    public function deleteBrand($brand_id){

        $this->brand_id = $brand_id;
    }

    public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand Deleted Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }
//code to view/read all brands
    public function render()
    {
        $categories = Category::where('status', '0')->get();
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories'=>$categories])
            ->extends('layouts.admin')
            ->section('content');
    }
}
