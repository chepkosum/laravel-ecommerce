<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function PHPSTORM_META\type;

class View extends Component
{
    public $category, $product,$prodColorSelectedQuantity, $quantityCount= 1, $productColorId;

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
        $this->productColorId = $productColorId;
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

    public function addToCart(int $productId){

        if(Auth::check()){

            // dd($productId);
            if($this->product->where('id',$productId)->where('status', '0')->exists()){

                //check for product color quantity and insert to cart
                if($this->product->productColors()->count() >1 ){

                    if($this->prodColorSelectedQuantity !=NULL){

                if(Cart::where('user_id',auth()->user()->id)
                        ->where('product_id', $productId)
                        ->where('product_color_id', $this->productColorId)
                        ->exists()) {

                            $this->dispatch('message',
                            text: 'Product Already Added',
                            type: 'warning',
                            status: 200
                        );

                        }else{

                        $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                        if($productColor->quantity >0){

                            if($productColor->quantity > $this->quantityCount){

                                //Insert product to cart
                                Cart::create([
                                    'user_id'=>auth()->user()->id,
                                    'product_id'=>$productId,
                                    'product_color_id'=> $this->productColorId,
                                    'quantity'=> $this->quantityCount
                                ]);
                                $this->dispatch('message',
                                text: 'Product Added to Cart',
                                type: 'success',
                                status: 200
                            );

                            }
                            else{
                                $this->dispatch('message',
                                text: 'Only '.$productColor->quantity.' Quantity Available',
                                type: 'warning',
                                status: 404
                            );
                            }
                        }else{
                        $this->dispatch('message',
                        text: 'OUt of Stock',
                        type: 'warning',
                        status: 404
                    );
                    }
                }
                    }else{
                        $this->dispatch('message',
                        text: 'Select Your Product Color',
                        type: 'warning',
                        status: 404
                    );
                    }
                }
                else{
                if(Cart::where('user_id',auth()->user()->id)->where('product_id', $productId)->exists()) {

                    $this->dispatch('message',
                    text: 'Product Already Added',
                    type: 'warning',
                    status: 200
                );
                }
                else{

                if($this->product->quantity > 0){

                    if($this->product->quantity > $this->quantityCount){

                        //Insert product to cart
                        Cart::create([
                            'user_id'=>auth()->user()->id,
                            'product_id'=>$productId,
                            'quantity'=> $this->quantityCount
                        ]);
                        $this->dispatch('message',
                        text: 'Product Added to Cart',
                        type: 'success',
                        status: 200
                    );

                    }
                    else{
                        $this->dispatch('message',
                        text: 'Only '.$this->product->quantity.' Quantity Available',
                        type: 'warning',
                        status: 404
                    );
                    }

                }
                else{
                    $this->dispatch('message',
                    text: 'Out Of Stock',
                    type: 'warning',
                    status: 404
                );
                }
            }

            }
        }
            else{
                $this->dispatch('message',
                text: 'Product does not exists',
                type: 'warning',
                status: 404
            );
            }

        }else{
            $this->dispatch('message',
            text: 'Please login to add to cart',
            type: 'info',
            status: 401
        );
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
