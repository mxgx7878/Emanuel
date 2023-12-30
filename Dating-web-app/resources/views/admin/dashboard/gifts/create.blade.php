@extends('admin.layouts.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Add Gift</h3>
            </div>
        </div>

        <style>
            .form-group label {
                font-weight: 800;
            }
        </style>


        <form action="{{ route('admin.add.update.gift') }}" id="form1" class="needs-validation" novalidate
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gift-title">Gift Name</label>
                            <input type="text" class="form-control" required id="gift-title"
                                placeholder="Enter Gift Title" name="title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gift-image">Gift Image</label>
                            <input type="file" class="form-control" required id="gift-image"
                                placeholder="Enter Gift Image" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gift-price">Gift Price</label>
                            <input type="text" class="form-control" required id="gift-price"
                                placeholder="Enter Gift Price" name="price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Gift</button>
        </form>

    </div>
    </div>
@endsection
@push('js')
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 300
            });

            $('#form1').on('submit', () => {

                if ($('#summernote').summernote('isEmpty')) {
                    $('.note-editor').attr('style', 'border:2px solid red');
                    // $(".note-editor").append("<div class='invalid-feedback'>Please provide Book Description.</div>");
                } else {
                    $('.note-editor').attr('style', '');
                }
            })
        });
    </script>
@endpush
