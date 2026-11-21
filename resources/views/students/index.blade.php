
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>

    <style>
        * 
* {
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    margin: 0;
    padding: 35px 20px;
    background:  grey;
    color: #263445;
}


.container {
    max-width: 1000px;
    margin: auto;
}

h1 {
    color: #123b70;
    font-size: 30px;
    margin-bottom: 8px;
}

.container > p {
    color: #68788c;
    margin-bottom: 28px;
}

.card {
    background: coral;
    padding: 28px;
    border-radius: 12px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(18, 59, 112, 0.07);
    border: 1px solid #e5ebf2;
}

.card h3 {
    color: #123b70;
    margin-top: 0;
    margin-bottom: 22px;
}

label {
    display: block;
    font-weight: bold;
    color: #34465c;
}

input {
    padding: 13px;
    width: 100%;
    margin: 8px 0 16px;
    border: 1px solid #ccd6e2;
    border-radius: 7px;
    outline: none;
}

input:focus {
    border-color: #123b70;
    box-shadow: 0 0 0 3px rgba(18, 59, 112, 0.10);
}

button {
    padding: 12px 20px;
    background: grey;
    color: white;
    border: none;
    border-radius: 7px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.2s;
}

button:hover {
    background: #1d518e;
}

button:disabled {
    background: #8295ad;
    cursor: not-allowed;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #e5ebf2;
}

th {
    background: grey;
    color: white;
}

tr:hover td {
    background: #f7faff;
}

.message {
    color: #16834a;
    background: #e8f7ee;
    padding: 13px;
    border-radius: 7px;
    margin-bottom: 18px;
}

.error {
    color: #c62828;
    font-size: 13px;
}

.actions {
    display: flex;
    gap: 8px;
}

.delete-btn {
    background: #c03939;
}

.delete-btn:hover {
    background: #9f2929;
}

@media (max-width: 600px) {
    body {
        padding: 20px 12px;
    }

    .card {
        padding: 18px;
        overflow-x: auto;
    }

    table {
        min-width: 550px;
    }
}

    </style>
</head>

<body>

<div class="container">

    <h1>Student Management</h1>

    @if(session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif

    <div class="card">
        <h3>Add New Student</h3>

        <form action="{{ route('students.store') }}"
              method="POST"
              onsubmit="this.querySelector('button[type=submit]').disabled = true;
                        this.querySelector('button[type=submit]').innerText = 'Saving...';">
            @csrf

            <label>Student Name</label>
            <input type="text" name="name"
                   value="{{ old('name') }}"
                   placeholder="Enter student name" required>

            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror

            <label>Email Address</label>
            <input type="email" name="email"
                   value="{{ old('email') }}"
                   placeholder="Enter student email" required>

            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit">Add Student</button>
        </form>
    </div>

    <div class="card">
        <h3>Student Records</h3>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td class="actions">
                            <form action="{{ route('students.destroy', $student) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this student?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No student records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
