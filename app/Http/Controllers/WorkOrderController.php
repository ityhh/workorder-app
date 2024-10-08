<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    // Show the form to create a work order
    public function create()
    {
        return view('work_orders.create');
    }

    // Store the submitted work order data
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'department' => 'required|in:HR,ACCT,IT,Eng,FB Product,FB Services,Security,S&M',
            'name' => 'required|string',
            'work_order' => 'required|string',
            'to_department' => 'required|in:HR,ACCT,IT,Eng,FB Product,FB Services,Security,S&M',
        ]);

        // Generate WO number
        $wo_number = now()->format('Ymd') . str_pad(WorkOrder::count() + 1, 3, '0', STR_PAD_LEFT);

        WorkOrder::create([
            'wo_number' => $wo_number,
            'date' => $request->date,
            'department' => $request->department,
            'name' => $request->name,
            'work_order' => $request->work_order,
            'to_department' => $request->to_department,
            'status' => 'Pending', // Default to Pending
            'status_date' => now(),
            'remarks' => $request->remarks,
        ]);

        return redirect()->back()->with('success', 'Work Order Created Successfully');
    }

    // Show the list of all work orders
    public function index()
    {
        $workOrders = WorkOrder::all();
        return view('work_orders.index', compact('workOrders'));
    }

    // Update the status of a work order
    public function editStatus(Request $request, $id)
    {
        $workOrder = WorkOrder::findOrFail($id);

        if ($request->status === 'Done') {
            $workOrder->status = 'Done';
            $workOrder->status_date = now();
        } else {
            $workOrder->status = 'Pending';
            $workOrder->status_date = null;
        }

        $workOrder->save();
        return redirect()->route('work_orders.index')->with('success', 'Status updated successfully.');
    }
}
