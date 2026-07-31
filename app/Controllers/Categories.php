<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Display all categories
     */
    public function index()
    {
        $data = [
            'title' => 'Categories',
            'categories' => $this->categoryModel
                ->orderBy('id', 'DESC')
                ->findAll(),
        ];

        return view('categories/index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data = [
            'title' => 'Add Category',
            'categoryCode' => $this->categoryModel->generateCategoryCode(),
        ];

        return view('categories/create', $data);
    }

    /**
     * Save category
     */
    public function store()
    {
        $this->categoryModel->save([
            'category_code' => $this->categoryModel->generateCategoryCode(),
            'name'          => $this->request->getPost('name'),
            'description'   => $this->request->getPost('description'),
            'status'        => $this->request->getPost('status'),
        ]);

        return redirect()->to('/categories')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Category',
            'category' => $this->categoryModel->find($id),
        ];

        return view('categories/edit', $data);
    }

    /**
     * Update category
     */
    public function update($id)
    {
        $this->categoryModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/categories')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Delete category
     */
    public function delete($id)
    {
        $this->categoryModel->delete($id);

        return redirect()->to('/categories')
            ->with('success', 'Category deleted successfully.');
    }
    public function show($id)
    {
        $data = [
            'title'=>  'Category Details',
            'category' => $this->categoryModel->find($id),
        ];
    }
}