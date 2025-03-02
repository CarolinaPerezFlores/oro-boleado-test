<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        return response()->json(Producto::all(), 200);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0'
        ]);

        $product = Producto::create($request->all());

        return response()->json($product, 201);
    }

    // Mostrar un producto por ID
    public function show($id)
    {
        $product = Producto::find($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($product, 200);
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $product = Producto::find($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'sometimes|numeric|min:0'
        ]);

        $product->update($request->all());

        return response()->json($product, 200);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $product = Producto::find($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Producto eliminado'], 200);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Producto::where('nombre', 'like', "%$query%")
                            ->orWhere('descripcion', 'like', "%$query%")
                            ->get();

        return response()->json($products);
    }
}