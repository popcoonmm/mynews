@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="profiles col-md-8 mx-auto mt-3">
                @foreach($profiles as $profile)
                    <div class="profile">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $profile->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    {{ str_limit($profile->name, 150) }}
                                </div>
                                 <div class="gender">
                                    {{ str_limit($profile->gender, 150) }}
                                </div>
                                 <div class="hobby">
                                    {{ str_limit($profile->hobby, 150) }}
                                </div>
                                <div class="introdaction">
                                    {{ str_limit($profile->introdaction, 150) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection