@extends ('layouts.resellerLayout.reseller_design')
@section('content')


<select-products user="{{auth()->user()->id}}" ></select-products>

@endsection