<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" required><br>

        <label>Role:</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="penyewa">Penyewa</option>
        </select><br>

        <button type="submit">Daftar</button>
    </form>
    <a href="{{ route('login') }}">Sudah punya akun? Login</a>
</body>
</html>
