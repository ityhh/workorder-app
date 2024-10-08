<!DOCTYPE html>
<html>
<head>
    <title>Create Work Order</title>
</head>
<body>

    <h1>Create a New Work Order</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('work_orders.store') }}" method="POST">
        @csrf

        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" required>
        </div>

        <div>
            <label for="department">Department</label>
            <select name="department" id="department" required>
                <option value="">-- Select Department --</option>
                <option value="HR">HR</option>
                <option value="ACCT">ACCT</option>
                <option value="IT">IT</option>
                <option value="Eng">Engineering</option>
                <option value="FB Product">FB Product</option>
                <option value="FB Services">FB Services</option>
                <option value="Security">Security</option>
                <option value="S&M">Sales & Marketing</option>
            </select>
        </div>

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="work_order">Work Order</label>
            <textarea name="work_order" id="work_order" required></textarea>
        </div>

        <div>
        <label for="to_department">Department</label>
            <select name="to_department" id="to_department" required>
                <option value="">-- Select Department --</option>
                <option value="HR">HR</option>
                <option value="ACCT">ACCT</option>
                <option value="IT">IT</option>
                <option value="Eng">Engineering</option>
                <option value="FB Product">FB Product</option>
                <option value="FB Services">FB Services</option>
                <option value="Security">Security</option>
                <option value="S&M">Sales & Marketing</option>
            </select>
        </div>

        <div>
            <label for="remarks">Remarks</label>
            <textarea name="remarks" id="remarks"></textarea>
        </div>

        <button type="submit">Create Work Order</button>
    </form>

</body>
</html>
