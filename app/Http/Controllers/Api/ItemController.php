<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $item = Item::create($validatedData);

        return response()->json($item, 201);
    }

    public function show(string $id)
    {
        $items = Item::find($id);
        return response()->json($items, 200);
    }

    public function update(Request $request, string $id)
    {
        $items = Item::find($id);
        if (!$items) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        $validated = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $items->update($validated);

        return response()->json($items, 200);
    }

    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        $item->delete();
        return response()->json(['message' => 'Item deleted'], 200);
    }
    public function destroyAll()
    {
        $items = Item::all();
        if (!$items) {
            return response()->json(['message' => 'Items not found'], 404);
        }
        Item::truncate();

        return response()->json(['message' => 'Items deleted'], 200);
    }
}
