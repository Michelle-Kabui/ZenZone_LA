@extends('dashboard')

@section('content')
<div class="container">
    <h2 class="mt-5 mb-3">Users</h2>

    @if($users->count() > 0)
        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
            <table id="users_tbl" class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }} </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            <p>No users found.</p>
        </div>
    @endif
</div>
    <script>
        $(document).ready(function() {
        $('#users_tbl').DataTable({
            paging: true, 
            searching: true, 
            responsive: true,
            pageLength: 4,
        });
    });
    </script>

@endsection

