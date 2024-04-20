<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function PHPSTORM_META\type;

class View extends Component
{
    public $category, $product,$prodColorSelectedQuantity, $quantityCount= 1;

    public function addToWishList($productId){

        if(Auth::check()){

            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){

                session()->flash('message', 'Already Added to Wishlist');
                $this->dispatch('message',
                text: 'Already Added to Wishlist',
                type:'warning',
                status:409);
                return false;
            }
            else{

            Wishlist::create([
            'user_id'=> auth()->user()->id,
            'product_id' => $productId
           ]);
           $this->dispatch('wishlistAddedUpdated');
           session()->flash('message', 'Wishlist Added successfully');
           $this->dispatch('message',
           text: 'Wishlist Added successfully',
            type:'success',
            status:200);
           return false;
        }

        }
        else{
            session()->flash('message', 'Please Login to Continue');
            $this->dispatch('message',
            text: 'Please Login to Continue',
            type:'info',
             status:401);
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

    public function decrementQuantity(){

        if($this->quantityCount > 1){
        $this->quantityCount--;
    }
    }

    public function incrementQuantity(){

        if($this->quantityCount < 10){
        $this->quantityCount++;
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
