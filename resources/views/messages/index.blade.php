@extends('layouts.app')
<style>
    ul{
        margin: 0;
        padding:0;
    }
    li{
        list-style: none;
    }
    .user-wrapper,.message-wrapper{
        border: 1px solid #dddddd;
        overflow-y: auto;
    }
    .user-wrapper{
        height: 600px;
        border-radius: 20px;
        background: #ffffff;
        opacity: 0.9;
    }
    .user{
        cursor: pointer;
        padding: 5px 0;
        position: relative;
    }
    .user:hover{
        background: #eeeeee;
    }
    .user:last-child{
        margin-bottom: 0;
    }
    .pending{
        position: absolute;
        left: 13px;
        top:9px;
        background:#FFC300;
        margin: 0;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        line-height: 18px;
        padding-left: 5px;
        color: #ffffff;
        font-size: 12px;
        display: block;
    }
    .media-left{
        margin: 0 10px;

    }
    .media{
        height: 70px;
    }
    .media-left img{
        width: 64px;
        border-radius: 64px;
    }
    .media-body p{

        font-size: large;
        margin:20px 0 ;
    }
    .media-object{
        height: 64px;
    }
    .message-wrapper {
        padding: 10px;
        height: 540px;
        background: #eeeeee;
        opacity: 0.95;
    }
    ::-webkit-scrollbar {
        width: 15px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #aaaaaa ;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #C70039 ;
    }
    .messages .message{
        margin-bottom: 15px;
    }
    .messages .message:last-child{
        margin-bottom: 0;
    }
    .recieved, .sent{
        width: 45%;
        padding: 3px 10px;
        border-radius: 10px;

    }
    .recieved{
        background: #ffffff;
        border-top-left-radius: 0;
    }
    .sent{
        background: #00bbff;
        float: right;
        text-align: right;
        border-top-right-radius: 0;

    }
    .message p{
        margin: 5px 0;
    }
    .date{
        color: #777777;
        font-size: 12px;
    }
    .active{
        background: #eeeeee;
    }
    input[type=text]{
        width: 100%;
        padding: 12px 20px;
        margin: 15px 0 0 0;
        display: inline-block;
        border-radius: 20px;
        box-sizing: border-box;
        outline: none;
        border: 2px solid #aaaaaa ;

    }
    input[type=text]:focus{
        border: 1px solid #C70039;
    }

</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users"></ul>
                    @foreach($users as $user)
                        <li class="user" id="{{$user->friend_id}}">

                            @if($user->unread)
                                <span class="pending">{{ $user->unread/5}}</span>
                            @endif

                            <div class="media">
                                <div class="media-left">
                                    <img src={{$user->path}} alt="" class="media-object">
                                </div>

                                <div class="media-body">
                                    <p class="name">{{$user->name}}</p>

                                </div>
                            </div>
                        </li>

                    @endforeach
                </div>
            </div>
            <div class="col-md-8"  id="messages">

            </div>

        </div>
    </div>
@endsection


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        var reciever_id='';
        var my_id={{Auth::id()}};
        $(document).ready(function (){

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('a3549f30d6ba8e291aa7', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('message-event', function(data) {
                data=data.message;

                if(my_id==data.from){
                    //alert('sender');
                    $('#'+data.to).click();
                }else if(my_id==data.to){
                    //alert('reciever');
                    if(reciever_id==data.from){
                        // reciever is selected
                        $('#'+data.from).click();
                    }else{
                        var pending=parseInt($('#'+data.from).find('.pending').html());

                        //reciever not selected so we have to activate pending
                        if(pending){
                            //if pending already exists increment the number
                            $('#'+data.from).find('.pending').html(pending+1);
                        }else {
                            //if no pending is available
                            $('#'+data.from).append('<span class="pending" >1</span>');
                        }
                    }
                }
            });

            $('.user').click(function (){

                $('.user').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();

                reciever_id=$(this).attr('id');
                $.ajax({
                    type:"get",
                    url:"message/"+reciever_id,
                    data:"",
                    cache:false,
                    success:function(data){
                        //alert(data);
                        $('#messages').html(data);
                        scrollToBottomFunc();
                    }
                });

            });

            $(document).on('keyup','.input-text input',function (e) {
                var message=$(this).val();

                if(e.keyCode==13&&message!=''&&reciever_id!=''){
                    $(this).val('');
                    var datastr="receiver_id="+reciever_id+"&message="+message;

                    $.ajax({
                        type:'post',
                        url:'message',
                        data:datastr,
                        cache:false,
                        success:function (data){

                        },
                        complete:function (){
                            scrollToBottomFunc();
                        }

                    })
                }


            });

        });

        function scrollToBottomFunc(){
            $('.message-wrapper').animate({
                scrollTop:$('.message-wrapper').get(0).scrollHeight
            },0);
        }

    </script>




