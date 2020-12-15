@extends('layouts.home')

@section('status')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Status</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!session('status'))
                    <div class="alert alert-danger" role="alert">
                        No Action Done!
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
