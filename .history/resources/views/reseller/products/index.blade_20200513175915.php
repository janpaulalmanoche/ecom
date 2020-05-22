@extends ('layouts.resellerLayout.reseller_design')
@section('content')


<select-products :auth-user="1"></select-products>
<!-- {{dd(auth()->user()->id)}} -->

@endsection