@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome Doctor') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul>
                            <li>Add Appointment</li>
                            <li>Add Recipe</li>
                            <li>Add Product</li>
                            <li>Add Doctor</li>
                            <li>Add Patient</li>
                            <li><a href="{{route('receptionist_register')}}">Add Receptionist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
