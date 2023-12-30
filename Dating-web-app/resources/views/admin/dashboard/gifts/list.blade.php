@extends('admin.layouts.main')
@section('content')
    <style>
         th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
    </style>

    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Gifts Listing</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 mb-3">
                @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ \Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>




        <div class="d-flex justify-content-end mt-5">
            <a href="{{route('admin.gift.create.view')}}" class="btn btn-primary btn-sm">Add Gift</a>
        </div>

        <div class="row">
            <div class="col-md-12 pt-5 table-responsive ">
                <table class="table" style=" width:100%" id="datatable">
                    <thead>
                        <tr>
                            <th class="table-site-headings">S.No</th>
                            <th class="table-site-headings">Gift Name</th>
                            <th class="table-site-headings">Gift Image</th>
                            <th class="table-site-headings">Gift Price</th>
                            <th class="table-site-headings">Action</th>
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
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{asset('admin/asset/admin/images/giftimages/'.$item->image)}}" height="100" width="100" alt=""></td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <a href="{{route('admin.gift.update.view',$item->id)}}" class="btn btn-sm btn-primary">Edit</a>

                                        <button type="button" class="btn btn-danger deleteButton" data-id="{{$item->id}}"
                                            data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>



            <!-- Modal -->
            <div class="modal fade deleteModalBody" id="" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <P class="text-center">Are you sure you want to delete it?</P>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="" id="deleteButtonAnchor" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>







        </div>
    </div>
    </div>
@endsection
@push('js')

    <script>
        
        jQuery(document).ready(function($) {
           
            let table = new DataTable('#datatable',{
             
            });
       
        
            $('.deleteButton').on('click', function() {
                let data = $(this).data('id');
                let id = 'exampleModal' + data;
                $(".deleteModalBody").attr("id", id);
                let url = "{{route('admin.delete.gift',':id')}}";
                url = url.replace(':id', data);
                $("#deleteButtonAnchor").attr("href", url);

            });
        });
    </script>
@endpush
