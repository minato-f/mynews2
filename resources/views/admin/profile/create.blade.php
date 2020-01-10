{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'プロフィールの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                
                    <div class="form-group row">
                        <label for="">氏名:</label>
                        <div class="col-md-10">
                            <input type="text" name="name"/>
                        </div> 
                    </div>
                
                    <div class="form-group row">
                        <label for="">性別:</label>
                        <div class="col-md-10">
                            <input type="text" name="gender"/>
                        </div> 
                    </div>
                
                    <div>
                        <label for="">趣味:</label>
                        <textarea class="form-control" name="hobby" rows="3">{{ old('hobby') }}</textarea>
                    </div>
                
                    <div>
                        <label for="">自己紹介:</label>
                        <textarea class="form-control" name="introduction" rows="5">{{ old('introduction') }}</textarea>
                    </div>
                    <br>
                    
                    {{ csrf_field() }}
                    
                    <input type="submit" class="btn btn-primary" value="作成">
                
                </form>
            </div>
        </div>
    </div>
@endsection