@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <h2> Contacts of: {{ $user->name  }}</h2></div>
                <div class="card-body"> 

                    <div class="row">
                      
                        <div class="row" id="data_temp"> </div>

                        <div class="ajax-load text-center" style="display:none">
                            <i class="fa fa-cog spin"></i> Loading ...
                        </div>

                        <div class="no-data text-center mb-4" style="display:none">
                            <b>No data - last page</b>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection