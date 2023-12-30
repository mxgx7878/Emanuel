@extends('admin.layouts.main')
@section('content')
    <style>
        th,
        td {
            white-space: nowrap;
        }

        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }
    </style>

    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Users List</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 pt-5 table-responsive ">
                <table class="table" id="datatable" style=" width:100%" id="datatable">
                    <thead>
                        <tr>
                            <th class="table-site-headings">S.No</th>
                            <th class="table-site-headings">Name</th>
                            <th class="table-site-headings">Email</th>
                            <th class="table-site-headings">Date Of Birth</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp

                        @if ($data->isNotEmpty())
                            @foreach ($data as $item)
                                <tr>

                                    <td class="px-2">{{ $count++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->userdetails->date_of_birth }}</td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {

            let table = new DataTable('#datatable', {
             
            });
        });
    </script>
@endpush
