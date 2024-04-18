<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product,$prodColorSelectedQuantity;

    public function addToWishList($productId){

        if(Auth::check()){

            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){

                session()->flash('message', 'Already Added to Wishlist');
            }
            else{

            Wishlist::create([
            'user_id'=> auth()->user()->id,
            'product_id' => $productId
           ]);
           session()->flash('message', 'Wishlist Added successfully');
        }

        }
        else{
            session()->flash('message', 'Please Login to Continue');
            return false;
        }
    }


    public function colorSelected($productColorId){
        // dd($productColorId);
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function mount($category, $product){
        $this->category=$category;
        $this->product=$product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
