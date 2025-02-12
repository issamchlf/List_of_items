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

    public function show(Item $id)
    {
        $items = Item::findOrFail($id);
        return response()->json($id, 200);
    }

    public function update(Request $request, Item $id)
    {
        $item = Item::findOrFail($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $item = Item::findOrFail($id);
        $item->update($validatedData);

        return response()->json($item, 200);
    }

    public function destroy(Item $id)
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
