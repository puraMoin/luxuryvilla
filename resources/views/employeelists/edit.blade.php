<!-- resources/views/employeelists/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ $pageTitle }}</title>
</head>
<body>
    <h1>{{ $pageTitle }}</h1>

    <!-- Form for editing the agent -->
    <form action="{{ route('employeelists.update', $employeeList->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $employeeList->name) }}">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{ old('username', $employeeList->username) }}">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $employeeList->email) }}">

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="{{ old('contact', $employeeList->contact) }}">

        <label for="active">Active:</label>
        <input type="checkbox" id="active" name="active" value="1" {{ $employeeList->active ? 'checked' : '' }}>

        <button type="submit">Update</button>
    </form>
</body>
</html>
