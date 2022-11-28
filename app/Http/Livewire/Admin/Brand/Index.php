<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    public $name, $slug, $status;

    // public function rules()
    // {
    //     return [
    //         'name' => 'required!string',
    //         'slug' => 'required!string',
    //         'status' => 'nullable',
    //     ];
    // }
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // public function storeBrand()
    // {
    //     $validatedData = $this->validated();
    //     Brand::create([
    //         'name' => $this->name,
    //         'slug' => Str::slug($this->slug),
    //         'status' => $this->status == true ? '1' : '0'
    //     ]);

    //     session()->flash('message', 'Brand Added succcessfulluy');
    //     $this->dispatchBrowserEvent('close-modal');
    //     $this->resetInput();
    // }

    // public function resetInput()
    // {
    //     $this->name - NULL;
    //     $this->slug - NULL;
    //     $this->status - NULL;
    // }

    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands]);
        // return view('livewire.admin.brand.index')->extends('layouts.admin')->section('content');
    }
}