@extends('layouts.admin')  
<!----viewファイルの継承 置き換え　layouts/admin.blade.phpを読み込む-->

@section('title','ニュースの新規作成') 
<!--タイトルに埋め込み-- admin.blade.phpの@yield('title')に埋め込む-->

@section('content') <!--同上contentに埋め込む-->
<!--ここでlayoutのadmin.blade.phpに埋め込む-->
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュースの新規作成</h2>
              
                <form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">
                    <!--nullではなく0を返す-->
                    @if (count($errors) > 0)
                        <ul>
                          <!--エラーの中身の数だけループ　
                          その中身を＄e代入 liで表示-->
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