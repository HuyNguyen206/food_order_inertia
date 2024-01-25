<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MenuController extends Controller
{
    public function index(): Response
    {
        $this->authorize('category.viewAny');

        return Inertia::render('Vendor/Menu', [
            'categories' => Category::query()
                ->when(auth()->user()->isVendor(), function (Builder $builder) {
                    $builder ->where('restaurant_id', auth()->user()->restaurant?->id);
                })
                ->with('products')
                ->get(),
        ]);
    }
}
