<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Form</title>
</head>
<body>
    <h1>Enrollment Form</h1>
    <form method="POST" action="{{ route('enrollment.submit') }}">
        @csrf
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" required><br>

        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" required><br>

        <label for="age">Age</label>
        <input type="number" id="age" name="age" required><br>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required><br>

        <label for="contactnumber">Contact Number</label>
        <input type="text" id="contactnumber" name="contactnumber" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
