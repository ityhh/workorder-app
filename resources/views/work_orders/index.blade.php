<!DOCTYPE html>
<html>
<head>
    <title>Work Orders List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Work Orders List</h1>

    <table>
        <thead>
            <tr>
                <th>WO Number</th>
                <th>Date</th>
                <th>Department</th>
                <th>Name</th>
                <th>Work Order</th>
                <th>To Department</th>
                <th>Status</th>
                <th>Status Date</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workOrders as $workOrder)
            <tr>
                <td>{{ $workOrder->wo_number }}</td>
                <td>{{ $workOrder->date }}</td>
                <td>{{ $workOrder->department }}</td>
                <td>{{ $workOrder->name }}</td>
                <td>{{ $workOrder->work_order }}</td>
                <td>{{ $workOrder->to_department }}</td>
                <td>{{ $workOrder->status }}</td>
                <td>{{ $workOrder->status_date }}</td>
                <td>{{ $workOrder->remarks }}</td>
                <td>
    <form action="{{ route('work_orders.edit_status', $workOrder->id) }}" method="POST">
        @csrf
        <select name="status" onchange="this.form.submit()">
            <option value="Pending" {{ $workOrder->status === 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Done" {{ $workOrder->status === 'Done' ? 'selected' : '' }}>Done</option>
        </select>
    </form>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <p><a href="{{ route('work_orders.create') }}">Create New Work Order</a></p>
</body>
</html>
