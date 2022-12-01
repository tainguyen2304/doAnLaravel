<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $category, $product, $brandInputs = [], $priceInput;

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

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

    public function mount(
        $category,
    ) {
        $this->category = $category;
    }


    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brandInputs, function ($q) {
                $q->whereIn('brand', $this->brandInputs);
            })
            ->when($this->priceInput, function ($q) {
                $q->when($this->priceInput == 'high-to-low', function ($q2) {
                    $q2->orderBy('selling_price', 'DESC');
                })->when($this->priceInput == 'high-to-low', function ($q2) {
                    $q2->orderBy('selling_price', 'ASC');
                });
            })
            ->where('status', '0')
            ->get();
        if ($this->brandInputs) {
        }

        return view('livewire.frontend.product.index', [
            'category' => $this->category,
            'products' => $this->products,
        ]);
    }
}