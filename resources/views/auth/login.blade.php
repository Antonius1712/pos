@extends('auth.layouts.app')
@section('title','Login')
@section('content')
<section class="row flexbox-container">
    <div class="col-xl-8 col-11 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-12 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0"> {{ config('app.nama_toko') }} </h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body pt-1">
                                <form action="{{route('login')}}" method="POST">
                                    @csrf
                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="username" value="{{ old('username') }}" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="username">username</label>
                                    </fieldset>

                                    <fieldset class="form-label-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="user-password" placeholder="Password" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-lock"></i>
                                        </div>
                                        <label for="user-password">Password</label>
                                    </fieldset>

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {!! session('status') !!}
                                        </div>
                                    @endif
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @if(count($errors) == 1)
                                                @foreach ($errors->all() as $error)
                                                    {!! $error !!}
                                                @endforeach
                                            @else
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{!! $error !!}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    @endif

                                    <button type="submit" class="btn btn-danger float-right btn-inline btn-block">login</button>
                                </form>
                            </div>
                        </div>
                        <div class="login-footer">
                            <div class="divider">
                                <div class="divider-text"><a href="#"> {{ config('app.name') }} </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
