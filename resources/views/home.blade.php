@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="container">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <span class="input-group-addon">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Start Chat
                                    </button>
                                    {{-- <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button> --}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="inbox_chat">

                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history">

                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message" />
                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o"
                                    aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <p class="text-center top_spac"> Design by <a target="_blank"
                    href="https://www.linkedin.com/in/sunil-rajput-nattho-singh/">Sunil Rajput</a></p> --}}

        </div>
    </div>

    <div id="template-chat" style="display: none">
        <div class="chat_list">
            <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5> </h5><span class="chat_date">
                            {{-- <button type="button" class="btn btn-danger btn-sm">
                                Unread messages <span class="badge badge-light"></span>
                                <span class="sr-only">unread messages</span>
                            </button> --}}
                        </span>
                    <p></p>
                </div>
            </div>
        </div>


        <div class="incoming_msg">
            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p></p>
                    <span class="time_date"> </span>
                </div>
            </div>
        </div>

        <div class="outgoing_msg">
            <div class="sent_msg">
                <p></p>
                <span class="time_date"></span>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach ($users as $item)
                        @if ($item->id != auth()->user()->id)
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5> {{ $item->name }}<span class="chat_add" from-id="{{ $item->id }}"
                                                from-name="{{ $item->name }}"><i class="fa fa-plus"
                                                    aria-hidden="true"></i></span></h5>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="base-url" value="{{ url('/') }}">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{ asset('js/main.js') }}" type="module"></script>
@endsection
