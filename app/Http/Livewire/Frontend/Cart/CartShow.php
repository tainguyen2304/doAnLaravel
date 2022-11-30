<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart;

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData) {
            $cartData->decrement('quantity');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Update.',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData) {
            $cartData->increment('quantity');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Update.',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}