@extends('dashboard.layouts.main')
@section('content')
    <style>
        .input_div {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 10px;
        }

        .input_div i {
            position: absolute;
            right: 30px;
            top: 8px;
            font-size: 22px;
            transform: rotate(15deg);
        }

        .chat_div {
            background: #ffff;
            padding: 10px;
        }

        .chat_div .row {
            height: 50vh;
            overflow-y: scroll;
        }

        .message_div {
            padding: 100px 0;
        }

        .message_header {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            background-color: #471e58;
            border-top-right-radius: 21px;
            border-top-left-radius: 21px;
            margin-top: 20px;
            padding: 15px;
            color: #ffff;
            margin-bottom: 10px;
            /* margin-bottom: 19px; */
            /* background: #333; */
        }

        .message_header img {
            width: 85px;
            height: 85px;
            border-radius: 50%;
        }

        .sender p {
            background-color: #dbdbdb;
            width: 50%;
            padding: 13px 13px;
            margin-bottom: 15px;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            color: #000;
            border-bottom-right-radius: 15px;
        }

        .reciever p {
            background-color: #2fa6f7;
            width: 50%;
            padding: 13px 13px;
            margin-bottom: 15px;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            color: #fff;
            border-bottom-left-radius: 15px;
            margin-left: auto;
        }

        .user_chat {
            display: flex;
            gap: 10px;
            align-items: center;
            margin: 10px;

        }

        .user_chat img {
            width: 55px;
            height: 55px;
            border-radius: 50%;
        }

        .user_chat_list_side {
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            height: 688px;
            margin-top: 100px;
        }
    </style>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 pt-4">
                    <div class="user_chat_list_side">
                        <div class="search_user">
                            <input type="text" class="form-control" placeholder="Seacrh...">
                        </div>
                        @foreach ($userslist as $user)
                            <div class="user_chat_list">
                                <div class="user_chat">
                                    <div class="img_div">
                                        <img style="cursor: pointer"
                                            src="{{ $user->userimages->image != null ? asset('dashboard/assets/images/user_images/' . $user->userimages->image) : asset('dashboard/assets/images/girl_img1.png') }}"
                                            class="img-fluid"
                                            onclick="window.location = '{{ route('dashboard.user.message.view', $user->user_id) }}'"
                                            alt="">
                                    </div>
                                    <div style="cursor: pointer" class="title"
                                        onclick="window.location = '{{ route('dashboard.user.message.view', $user->user_id) }}'">
                                        <h6>{{ $user->user->name }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="message_div">


                        <div class="message_header">
                            <div class="img_div">

                                <img src="{{ $userData['userimages']['image'] != null ? asset('dashboard/assets/images/user_images/' . $userData['userimages']['image']) : asset('dashboard/assets/images/girl_img1.png') }}"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="content">
                                <h2>{{ $userData['user']['name'] }}</h2>

                            </div>
                        </div>
                        <div class="chat_div">
                            <div class="row">
                                @foreach ($chats as $chat)
                                    @if ($chat->sender_id == auth()->user()->id)
                                        <div class="col-md-12 text-right">
                                            <div class="reciever">
                                                <p>{{ $chat->message }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            <div class="sender">
                                                <p>{{ $chat->message }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-md-12">
                                <div class="input_div">
                                    <input id="message_input" type="text" style="width: 90%" value=""
                                        placeholder="your message" class="form-control">
                                    <div class="actionBtn">
                                        <a href="javascript:void(0)" id="send">
                                            Send
                                        </a>
                                    </div>
                                </div>
                            </div>
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
            scrollToBottom()

            function scrollToBottom() {
                var chatDiv = $('.chat_div .row');
                chatDiv.scrollTop(chatDiv[0].scrollHeight);
            }
            $('.search_user input').keyup(function() {
                var searchTerm = $(this).val().toLowerCase();

                // Loop through each user chat list item
                $('.user_chat_list').each(function() {
                    var userName = $(this).find('.title h6').text().toLowerCase();

                    // If the user's name contains the search term, show the item; otherwise, hide it
                    if (userName.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            $('#message_input').keypress(function(e) {
                var key = e.which;
                if (key == 13) // the enter key code
                {
                    let data = {
                        '_token': "{{ csrf_token() }}",
                        'receiver_id': "{{ isset($userData) ? $userData['user_id'] : '' }}",
                        'message': $('#message_input').val(),
                        'sender_id': "{{ auth()->user()->id }}",
                        'is_read': 0,
                    }
                    $.ajax({
                        type: 'post',
                        url: "{{ route('user.send.message') }}",
                        data: data,
                        dataType: "json",
                        success: function(res) {
                            if (res.status == true) {
                                $('#message_input').val('')
                                console.log(res.data)
                                $('.chat_div .row').append(`
                            <div class="col-md-12 text-right">
                                <div class="reciever">
                                    <p>${res.data.message}</p>
                                    </div>
                                    </div>
                                    `);
                                scrollToBottom();

                            }
                        }
                    })

                }
            });
            $('#send').on('click', function() {
                // user.send.message

                let data = {
                    '_token': "{{ csrf_token() }}",
                    'receiver_id': "{{ isset($userData) ? $userData['user_id'] : '' }}",
                    'message': $('#message_input').val(),
                    'sender_id': "{{ auth()->user()->id }}",
                    'is_read': 0,
                }
                $.ajax({
                    type: 'post',
                    url: "{{ route('user.send.message') }}",
                    data: data,
                    dataType: "json",
                    success: function(res) {
                        if (res.status == true) {
                            $('#message_input').val('')
                            console.log(res.data)
                            $('.chat_div .row').append(`
                            <div class="col-md-12 text-right">
                                <div class="reciever">
                                    <p>${res.data.message}</p>
                                    </div>
                                    </div>
                                    `);
                            scrollToBottom();

                        }
                    }
                })

            });
        });
    </script>
@endpush
