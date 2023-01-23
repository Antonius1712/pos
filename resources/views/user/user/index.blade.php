@extends('layouts.app')
@section('title')
    User | User
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <p>User</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>Nama</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td> {{ $user->name }} </td>
                                <td>
                                    <i class="badge badge-{{ $user->badge_type }}">
                                        {{ $user->role_name }}
                                    </i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4"> Empty </td>
                            </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.zero-configuration').dataTable({
            "bLengthChange": false,
            "lengthMenu": [10],
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }],
            // "dom": "lrtip" //to hide default searchbox but search feature is not disabled hence customised searchbox can be made.
        })
    </script>
@endsection