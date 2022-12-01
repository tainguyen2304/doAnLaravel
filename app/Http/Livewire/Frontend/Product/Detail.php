<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $category, $product, $quantityCount = 1;


    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'already added  to wishlist');
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdate');
                session()->flash('message', 'Wishlist added successfully');
            }
        } else {
            session()->flash('message', 'please login to continue');
            return false;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {

            $this->quantityCount--;
        }
    }
    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {

            $this->quantityCount++;
        }
    }

    public function addToCard($productId)
    {
        if (Auth::check()) {
            // dd($productId);
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {

                if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'product already added',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                } else {
                    if ($this->product->quantity > 0) {
                        if ($this->product->quantity > $this->quantityCount) {

                            // Inser product to cart
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);
                            $this->emit('CartAddedUpddate');
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product added to cart',
                                'type' => 'success',
                                'status' => 200
                            ]);
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'only' . $this->product->quantity . 'quantity avaible',
                            'type' => 'info',
                            'status' => 401
                        ]);
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'product not avaible',
                    'type' => 'info',
                    'status' => 401
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'plase login',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }

    public function mount(
        $category,
        $product
    ) {
        $this->category = $category;
        $this->product = $product;
    }


    public function render()
    {
        return view('livewire.frontend.product.detail', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}