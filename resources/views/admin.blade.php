<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Leads Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .pagination {
      display: flex;
      list-style: none;
      padding: 0;
      margin: 12px 0;
    }
    .pagination .page-item {
      margin: 0 4px;
    }
    .pagination .page-link {
      display: inline-block;
      padding: 6px 12px;
      text-decoration: none;
      color: #007bff;
      border: 1px solid #dee2e6;
      border-radius: 4px;
    }
    .pagination .page-link:hover {
      background-color: #f8f9fa;
    }
    .pagination .page-item.disabled .page-link {
      color: #6c757d;
      pointer-events: none;
      background-color: #e9ecef;
    }
    .pagination .page-item.active .page-link {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff;
    }
    svg {
      width: 16px; /* Constrain SVG width */
      height: 16px; /* Constrain SVG height */
    }
  </style>
</head>
<body style="max-width:1000px;margin:40px auto;font-family:system-ui,Arial">
  <h1>Leads</h1>

  @if (session('ok'))
    <div style="color:#0a7a00;margin-bottom:1rem">{{ session('ok') }}</div>
  @endif

  <form method="get" action="{{ route('admin.index') }}" style="margin-bottom:12px">
    <input type="text" name="email" value="{{ request('email') }}" placeholder="Search by email"
           style="padding:8px;width:240px">
    <button type="submit" style="padding:8px 12px">Search</button>
    <a href="{{ route('admin.index') }}" style="margin-left:8px">Reset</a>
  </form>

  <div style="overflow:auto">
    <table border="1" cellpadding="6" cellspacing="0" style="border-collapse:collapse;min-width:820px">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>GCLID</th>
          <th>Sub ID </th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($leads as $lead)
          <tr>
            <td>{{ $lead->id }}</td>
            <td>{{ $lead->name }}</td>
            <td>{{ $lead->email }}</td>
            <td>{{ $lead->gclid }}</td>
            <td>{{ $lead->sub_id }}</td>
            <td>{{ $lead->created_at }}</td>
          </tr>
        @empty
          <tr><td colspan="6">No leads yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="margin-top:12px">
    {{ $leads->withQueryString()->links() }}
  </div>

  <p style="margin-top:16px">
    <a href="{{ route('lead.form') }}">← Back to Form</a>
  </p>
</body>
</html>
