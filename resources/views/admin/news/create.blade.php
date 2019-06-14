@extends('layouts.admin')  {{--読み込みメソッド--}}
@section('title','ニュースの新規作成') {{--埋め込み--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュースの新規作成</h2>
                <form action="post" enctype="multipart/form-date">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                              <li>{{ $e }}</li>
                              @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <lable class="col-md-2" for="title">タイトル</lable>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <lable class="col-md-2" for="body">本文</lable>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <lable class="col-md-2" for="title">画像</lable>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                    
                </form>
            </div>
        </div>
    </div>
@endsection