@extends ('layouts.resellerLayout.reseller_design')
@section('content')

<reseller-order date="{{  date('F d Y',strtotime(Carbon\Carbon::now()))}}" user="{{auth()->user()->id}}"> </reseller-order>
@endsection
