@include('users.user_profile.style')
@extends('layouts.main.master_responsive')
@section('content_main')

<div class="container" style="position: relative;top:20rem;left:5rem;color:dimgray">
    <div class="row">
        <div class="col-12">
            <h4 class="unAuthMessage">You do not have access to this page. Please contact your System Administrator.</h4>
        </div>
    </div>
</div>
    
@endsection