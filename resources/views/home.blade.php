@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to your clinic system') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <table>
                    <thead>
                    <th><div><a href="{{route('doctor_login')}}">Login as Doctor</a></div></th>
                    <th><div><a href="{{route('receptionist_login')}}">Login as Receptionist</a></div></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
