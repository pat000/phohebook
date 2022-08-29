@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage contact
                    <a href="/home" class="btn btn-primary pull-right ">Back to Contacts</a>
                </div>

                <div class="card-body ">
                    
                    <form method="post" action="{{ route('contacts.update', [$contact->id]) }}" class="form-horizontal">
                        {{  @csrf_field() }}
                        {{  method_field('put') }}
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" value="{{ $contact->id  }}" name="id" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" @error('name') is-invalid @enderror" name="name" value="{{ old('name', $contact->name) }}"  class="form-control">
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Phone </label>
                            <input type="text" name="phone_number" @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $contact->phone_number) }}" class="form-control">
                            @error('phone_number')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Email </label>
                            <input type="text" name="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email', $contact->email ) }}" class="form-control">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-xs btn-primary pull-left mt-2 " type="submit">Save</button>
                        
                    </form>
                    <form  class="mt-2" method="post" action="{{ route('contacts.destroy',  $contact->id) }}">
                        {{  @csrf_field() }}
                        {{  method_field('delete') }}
                         <button class="btn btn-xs btn-danger text-white mx-2" type="submit" >Delete</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
@endsection
