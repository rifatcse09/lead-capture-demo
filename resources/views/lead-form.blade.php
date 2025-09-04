<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lead Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="max-width:720px;margin:40px auto;font-family:system-ui,Arial">
  <h1>Lead Form</h1>

  @if ($errors->any())
    <div style="color:#b00020;margin-bottom:1rem">
      {{ implode(' • ', $errors->all()) }}
    </div>
  @endif

  <form action="{{ route('leads.store') }}" method="POST" style="display:grid;gap:12px">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width:100%;padding:8px">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width:100%;padding:8px">

    <label for="gclid">GCLID:</label>
    <input type="text" id="gclid" name="gclid" value="{{ old('gclid') }}" style="width:100%;padding:8px">

    <label for="sub_id">Sub ID:</label>
    <input type="text" id="sub_id" name="sub_id" value="{{ old('sub_id') }}" style="width:100%;padding:8px">

    <button type="submit" style="padding:10px 16px;cursor:pointer">Submit</button>
  </form>

  <p style="margin-top:16px">
    <a href="{{ route('admin.index') }}">Go to Admin</a>
  </p>
</body>
</html>
