<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Suppliers;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function showSuppliers(Request $request)
    {
        $suppliers = Suppliers::all();
        return response()->json($suppliers, 200);
    }

    public function showOneSupplier(Request $request, $id)
    {
        $supplier = Suppliers::findOrFail($id);
        return response()->json($supplier, 200);
    }

    public function createSupplier(Request $request)
    {
        $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:30',
            'telephone' => 'required|numeric',
            'address' => 'required',
            'cep' => 'required|numeric',
            'cnpj' => 'required|max:20',
            
        ]);

        if ($validator->fails()) {
            return $validator->errors(400);
        }

        $supplier = new  Suppliers;
        $supplier->name = $request->name;
        $supplier->telephone = $request->telephone;
        $supplier->address = $request->address;
        $supplier->cep = $request->cep;
        $supplier->cnpj = $request->cnpj;

        $supplier->save();
        return response()->json(["cadastro de fornecedor feito"], 201);
    }

    public function updateSupplier(Request $request, $id)
    {
        $supplier = Suppliers::findOrFail($id);
        $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:30',
            'telephone' => 'required|numeric',
            'address' => 'required',
            'cep' => 'required|numeric',
            'cnpj' => 'required|max:20',
            
        ]);

        if ($validator->fails()) {
            return $validator->errors(400);
        }
        
        
        $supplier->name = $request->name;
        $supplier->telephone = $request->telephone;
        $supplier->address = $request->address;
        $supplier->cep = $request->cep;
        $supplier->cnpj = $request->cnpj;

        $supplier->save();
        return response()->json(["atualizado cadastro de fornecedor"], 201);
    }

    public function deleteSupplier(Request $request, $id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();

        return response()->json(["cadastro de fornecedor deletado"], 201);
    }
}
