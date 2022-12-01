<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{


    public function removeWishListItem(int $wishListId)
    {
        $wishListRemoveData =  Wishlist::where('user_id', auth()->user()->id)->where('id', $wishListId)->first();
        if ($wishListRemoveData) {
            $wishListRemoveData->delete();

            $this->emit('wishlistAddedUpdate');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Wislist item remove successfully.',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong .',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}