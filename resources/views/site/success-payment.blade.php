@extends('layouts.app')

@section('pageTitle', 'Access Granted!')

@section('content')
    {{--<link rel="stylesheet" href="{{ URL::asset('js/init.js') }}">--}}
    {!!Html::script('js/site/subscribe.js')!!}

    <div class="container blog_create_container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <div class="msg_subcribers">
                    <h3>
                        Congratulations! You're a subscriber now! You now have access to all premium content on this site!
                        Get back to this Article!<br> <a href="/blog/{{$article->id}}">{{$article->title}}</a>
                        <br>
                    </h3>

                    <img style="margin-top: 20px;" width="250px" height="250px" src="/images/access-granted.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection