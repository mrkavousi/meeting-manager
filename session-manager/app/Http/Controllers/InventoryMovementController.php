<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryMovement;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class InventoryMovementController extends Controller
{
    public function create($item_id)
    {
        $item = Item::where('id', $item_id)->firstOrFail();
        return view('inventory_movements.create', compact('item'));
    }

    public function store(Request $request, $item_id)
    {
        $item = Item::where('id', $item_id)->firstOrFail();

        $request->validate([
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        if ($request->type == 'out' && $item->quantity < $request->quantity) {
            return redirect()->back()->withErrors('Not enough stock available.');
        }

        InventoryMovement::create([
            'item_id' => $item->id,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);

        $item->quantity += ($request->type == 'in' ? $request->quantity : -$request->quantity);
        $item->save();

        return redirect()->route('warehouses.show', $item->warehouse->id)->with('success', 'Inventory movement recorded successfully');
    }
}
