<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library.Test</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/128/5832/5832416.png" type="image/x-icon">
</head>
<style>
    * {
        background-size: cover;
        background-attachment: fixed;
    }
    .welcoming h1 {
        text-align: center;
        padding: 20px;
        color: #665c5b;
        font-family: Arial, sans-serif;
        font-size: 24px;
        margin: 60px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(10, 10, 10, 0.2);
        background-color: rgba(0, 0, 0, 0.5);
        transition: background-color 0.3s ease;
    }
    form {
        margin-top: 20px;
        padding: 20px;
        transition: 0.3s ease;
        text-align: center;
    }
    form input {
        padding: 10px;
        margin: 5px;
        border-radius: 5px;
        border: 1px solid grey;
        width: 200px;
        transition: 0.3s ease;
        background-color: black;
    }
</style>
<body>
    <div class="welcoming">
        <h1>Welcome to the Library!</h1>
    </div>
    <div class="search-field">
        <form action="{{ route('search.get') }}" method="GET">
            @csrf
            <label for="search">Search (GET):</label><br>
            <input type="text" id="search" name="search" value="{{ old('search') }}"><br>
            <input type="submit" value="Search">
            <input type="reset" value="Reset">
        </form>
    </div>
    @if ($errors->any())
        <div style="color: red; text-align: center;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    @if (session('error'))
        <div style="color: red; text-align: center;">{{ session('error') }}</div>
    @endif
    @if (isset($results))
        <div style="margin: 20px; padding: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        @if (isset($results[0]))
                            @foreach ($results[0] as $key => $value)
                                <th style="border: 1px solid #ddd; padding: 8px;">{{ $key }}</th>
                            @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $row)
                        <tr>
                            @foreach ($row as $value)
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</body>
</html>
