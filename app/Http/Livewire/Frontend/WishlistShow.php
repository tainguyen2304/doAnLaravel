<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{


    public function removeWishListItem(int $wishListId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishListId)->delete();
        $this->emit('wishlistAddedUpdate');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Wislist item remove successfully.',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}