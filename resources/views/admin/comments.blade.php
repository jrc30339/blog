@extends('layouts.app')

@section('pageTitle', 'Admin')

@section('content')
{!!Html::script('js/site/deleteObject.js')!!}
<div class="container" >
    @include('flash::message')
    <div class="content" >
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/admin-tabs', ['active' => 'comments'])
                <div class="table-responsive">
                    <table class="table table-striped table-hover profile">
                        <tr>
                            <th>№</th>
                            <th>Article</th>
                            <th>Comment</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($comments as $key => $comment)
                            <tr id="tr{{$comment['id']}}">
                                <th class="col-md-1">{{$key+1}}</th>
                                <td class="col-md-1"><a href="/blog/{{$comment['article']['id']}}">{{$comment['article']['title']}}</a></td>
                                <td class="col-md-2">{{$comment['text']}}</td>
                                <td class="col-md-2">{{$comment['author']['name']}}</td>
                                <td class="col-md-1">{{$comment['created_at']}}</td>
                                <td class="col-md-1 active">
                                    <a href="{{ url("/comment/delete/".$comment['id']."")}}" class="btn danger delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
