@extends('layouts.profile')  {{--読み込みメソッド--}}
@section('title','プロフィール') {{--埋め込み--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの新規作成</h2>
            
                 <form action="/admin/profile/create" enctype="multipart/form-date" method="post">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                              <li>{{ $e }}</li>
                              @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <lable class="col-md-2" for="title">氏名</lable>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <lable class="col-md-2" for="title">性別</lable>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <lable class="col-md-2" for="title">趣味</lable>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <lable class="col-md-2" for="body">自己紹介欄</lable>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introdaction" rows="20">{{ old('introdaction') }}</textarea>
                        </div>
                    </div>
                
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                    
                </form>
            </div>
        </div>
    </div>
@endsection
                
                
                