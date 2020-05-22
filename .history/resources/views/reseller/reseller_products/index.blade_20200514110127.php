@extends ('layouts.resellerLayout.reseller_design')
@section('content')


<reseller-products user="{{auth()->user()->id}}" ></select-products>

@endsection