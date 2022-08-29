@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add contact
                    <a href="/home" class="btn btn-primary pull-right ">Back to Contacts</a>
                </div>

                <div class="card-body ">
                    
                    <form method="post" action="{{ route('contacts.store') }}" class="form-horizontal">
                        {{  @csrf_field() }}
                        {{  method_field('post') }}
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" class="form-control">
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Phone </label>
                            <input type="text" name="phone_number" @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" class="form-control">
                            @error('phone_number')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Email </label>
                            <input type="text" name="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" class="form-control">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-xs btn-primary mt-2" type="submit">Save</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
