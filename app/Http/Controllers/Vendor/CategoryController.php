<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\StoreCategoryRequest;
use App\Http\Requests\Vendor\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function create(Request $request): Response|RedirectResponse
    {
        $this->authorize('category.create');

        if ($request->user()->isAdmin()) {
            return to_route('vendor.menu')->withMessage('Please develop more feature to allow admin manage categories in create context');
        }

        return Inertia::render('Vendor/Categories/Create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        if ($request->user()->isAdmin()) {
            return to_route('vendor.menu')->withMessage('Please develop more feature to allow admin manage categories in create context');
        }

        $request->user()->restaurant->categories()->create($request->validated());

        return to_route('vendor.menu')->withMessage('Create category successfully');
    }

    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        if ($request->user()->isAdmin()) {
            return to_route('vendor.menu')->withMessage('Please develop more feature to allow admin manage categories in create context');
        }

        $category->update($request->validated());

        return to_route('vendor.menu')->withMessage('Update category successfully');
    }

    public function edit(Category $category, Request $request): Response|RedirectResponse
    {
        if ($request->user()->isAdmin()) {
            return to_route('vendor.menu')->withMessage('Please develop more feature to allow admin manage categories in create context');
        }
        return Inertia::render('Vendor/Categories/Edit', [
            'category' => $category,
        ]);
    }

    public function destroy(Category $category, Request $request): Response|RedirectResponse
    {
        $this->authorize('category.delete');

        if ($request->user()->isAdmin()) {
            return to_route('vendor.menu')->withMessage('Please develop more feature to allow admin manage categories in create context');
        }

        $category->delete();

        return to_route('vendor.menu')->withMessage('Delete category successfully');
    }
}
