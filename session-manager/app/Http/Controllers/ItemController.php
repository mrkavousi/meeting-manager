<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function create($warehouse_id)
    {
        $warehouse = Warehouse::where('id', $warehouse_id)->where('user_id', Auth::id())->firstOrFail();
        return view('items.create', compact('warehouse'));
    }

    public function store(Request $request, $warehouse_id)
    {
        $warehouse = Warehouse::where('id', $warehouse_id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        Item::create([
            'warehouse_id' => $warehouse->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('warehouses.show', $warehouse->id)->with('success', 'Item added successfully');
    }

    public function edit($warehouse_id, $id)
    {
        $warehouse = Warehouse::where('id', $warehouse_id)->where('user_id', Auth::id())->firstOrFail();
        $item = Item::where('id', $id)->where('warehouse_id', $warehouse->id)->firstOrFail();

        return view('items.edit', compact('warehouse', 'item'));
    }

    public function update(Request $request, $warehouse_id, $id)
    {
        $warehouse = Warehouse::where('id', $warehouse_id)->where('user_id', Auth::id())->firstOrFail();
        $item = Item::where('id', $id)->where('warehouse_id', $warehouse->id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        $item->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('warehouses.show', $warehouse->id)->with('success', 'Item updated successfully');
    }

    public function destroy($warehouse_id, $id)
    {
        $warehouse = Warehouse::where('id', $warehouse_id)->where('user_id', Auth::id())->firstOrFail();
        $item = Item::where('id', $id)->where('warehouse_id', $warehouse->id)->firstOrFail();

        $item->delete();

        return redirect()->route('warehouses.show', $warehouse->id)->with('success', 'Item deleted successfully');
    }
}
