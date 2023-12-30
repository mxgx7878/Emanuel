@extends('dashboard.layouts.main')
@section('content')
    <style>
        .actionBtn {
            font-size: 16px;
            font-weight: 600;
            line-height: 25px;
            background-color: #ED147D;
            border-radius: 30px 30px 30px 30px;
            box-shadow: 0px 8px 10px 0px rgba(247, 0, 119.00000000000011, 0.2);
            padding: 10px 40px 10px 40px;
            text-decoration: none;
            color: #fff;
        }
    </style>
    <section class="inner_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="inner_header_links">
                        <li><a href="{{ route('dashborad.user-photos.view') }}">Photos</a></li>
                        <li><a href="{{ route('dashborad.user-edit-profile.view') }}">Profile</a></li>
                        {{-- <li><a href="{{ route('dashbaord.user-match.view') }}">Match</a></li> --}}
                        <li><a href="{{ route('dashbaord.user-interest.view') }}">Interest</a></li>
                        <li><a href="{{ route('dashbaord.user-personality.view') }}">Personality</a></li>
                        <!-- <li><a href="#">Verify Profile</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="innerPagesFirst">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="top_header_content row">
                        <div class="col-md-8">
                            <h1>Upload a photo</h1>
                            <p>The most effective way to get people to notice you is to add a photo.</p>
                        </div>
                        <!-- <div class="col-md-4 ">
                                      <div class="actionBtn" >
                                        <a href="javascript:;">View My Profile</a>
                                      </div>
                                      </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="user_photo_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <form action="{{ route('user.photos.upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="all_photos">
                            @for ($i = 1; $i <= 5; $i++)
                            {{-- @dd($data[$i-1]['image']) --}}
                             
                                <div class="photos_div">
                                    <div class="img_div">
                                        <img  src="{{ isset($data[$i-1]['image']) ? asset('dashboard/assets/images/user_images/' . $data[$i-1]['image']) : asset('dashboard/assets/images/user_photo.png')  }}"
                                            id="image_{{ $i }}" class="img-fluid" alt="">
                                    </div>
                                    <div class='file'>
                                        <label for='input-file-{{ $i }}' data-toggle="tooltip"
                                            data-placement="bottom" title="upload a photo">
                                            <i class="fa-solid fa-plus"></i>
                                        </label>
                                        <input id='input-file-{{ $i }}' name="image{{ $i }}"
                                            type='file' />
                                    </div>
                                    <p class="image_count">{{ $i }}</p>
                                </div>
                            @endfor
                        </div>
                        <button type="submit" class="actionBtn mt-5">Upload</button>
                    </form>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="form_heading">
                        <h2>Photo Guidelines</h2>
                        <p>How to choose the right primary photo:</p>
                    </div>
                    <div class="image_guidline">
                        <ul>
                            <li>You are smiling :)</li>
                            <li>Photo of just you</li>
                            <li>A recent photo</li>

                        </ul>
                        <ul>
                            <li>Clearly shows your face</li>
                            <li>Good quality and well lit</li>
                            <li>DOES NOT contain nudity</li>

                        </ul>
                        <div class="img_div">
                            <img src="{{ asset('dashboard/assets/images/primary_img.jpg') }}" class="img-fluid"
                                alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            let images_array = [];


            $('#input-file-1').on('change', function(e) {
                var image = $('#image_1');
                console.log(image);
                var file = e.target.files[0];

                images_array.push(["1",file]);
                console.log(images_array);
                $('#user_images').val(images_array);
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        image.attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#input-file-2').on('change', function(e) {
                var image = $('#image_2');
                var file = e.target.files[0];
                images_array.push(["2",file]);
                $('#user_images').val(images_array);
                console.log(images_array);
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        image.attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#input-file-3').on('change', function(e) {
                var image = $('#image_3');
                var file = e.target.files[0];
                images_array.push(["3",file]);
                $('#user_images').val(images_array);
                console.log(images_array);
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        image.attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#input-file-4').on('change', function(e) {
                var image = $('#image_4');
                var file = e.target.files[0];
                images_array.push(["4",file]);
                console.log(images_array);
                $('#user_images').val(images_array);
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        image.attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#input-file-5').on('change', function(e) {
                var image = $('#image_5');
                var file = e.target.files[0];
                images_array.push(["5" , file]);
                console.log(images_array);
                $('#user_images').val(images_array);
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        image.attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });


           
        });
    </script>
@endpush
