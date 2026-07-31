<?php

namespace App\Controllers;

use App\Models\SupplierModel;


class Suppliers extends BaseController
{

    protected $supplierModel;


    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }


    public function index()
    {
        return view('suppliers/index', [
            'title' => 'Suppliers',
            'suppliers' => $this->supplierModel
                ->orderBy('id','DESC')
                ->findAll()
        ]);
    }


    public function create()
    {
        return view('suppliers/create', [
            'title'=>'Add Supplier',
            'supplierCode'=>$this->supplierModel->generateSupplierCode()
        ]);
    }


    public function store()
    {
        $this->supplierModel->save([

            'supplier_code'=>$this->supplierModel->generateSupplierCode(),

            'company_name'=>$this->request->getPost('company_name'),

            'contact_person'=>$this->request->getPost('contact_person'),

            'phone'=>$this->request->getPost('phone'),

            'email'=>$this->request->getPost('email'),

            'address'=>$this->request->getPost('address'),

            'status'=>$this->request->getPost('status'),

        ]);


        return redirect()->to('/suppliers')
            ->with('success','Supplier created successfully.');
    }



    public function edit($id)
    {
        return view('suppliers/edit',[

            'title'=>'Edit Supplier',

            'supplier'=>$this->supplierModel->find($id)

        ]);
    }



    public function update($id)
    {
        $this->supplierModel->update($id,[

            'company_name'=>$this->request->getPost('company_name'),

            'contact_person'=>$this->request->getPost('contact_person'),

            'phone'=>$this->request->getPost('phone'),

            'email'=>$this->request->getPost('email'),

            'address'=>$this->request->getPost('address'),

            'status'=>$this->request->getPost('status'),

        ]);


        return redirect()->to('/suppliers')
            ->with('success','Supplier updated successfully.');
    }



    public function show($id)
    {
        return view('suppliers/show',[

            'title'=>'Supplier Details',

            'supplier'=>$this->supplierModel->find($id)

        ]);
    }



    public function delete($id)
    {
        $this->supplierModel->delete($id);


        return redirect()->to('/suppliers')
            ->with('success','Supplier deleted successfully.');
    }

}