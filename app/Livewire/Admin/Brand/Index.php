<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status;

    public function rules()
    {
        return [
            'name'=>'required|string',
            'slug'=>'required|string',
            'status'=>'nullable'
        ];
    }


    public function resetInput(){
        $this->name =Null;
        $this->slug =Null;
        $this->status =Null;
    }

    public function storeBrand(){
        $validatedData = $this->validate();
        Brand::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status == true? '1': '0',
        ]);
        session()->flash('message', 'Brand Added Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $brands = Brand::orderBy('id', 'Desc')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands])
            ->extends('layouts.admin')
            ->section('content');
    }
}
