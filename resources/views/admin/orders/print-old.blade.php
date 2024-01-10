@extends('admin.layouts.app-print')
@section('title') {{ __('Invoice') }} #
{{ $order->id }}
@stop
@section('content')
@php
    $currency = getCountryView();
@endphp
<!-- info row -->
    <div class="row">
      <div class="col-sm-4">
        {{--  {{ __('To') }}  --}}
        <address>
          <strong>{{ $order->orderMeta->name  }}</strong><br>
          @if(isset($order->region))  {{  $order->region->name[$admin_language] }}@endif
          @if(isset($order->city))  - {{  $order->city->name[$admin_language] }}@endif<br>
          {{ $order->orderMeta->address }}<br>
          {{ __('Phone') }}: {{ $order->orderMeta->phone  }}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4">
        <b> {{ __('Invoice') }} #
            {{ $order->id }}</b><br>
        <br>
        <b><label>{{ __('Date') }}</label>:</b> {{ date_format($order->created_at,"F j, Y, g:i a") }}<br>
        <b><label>{{ __('Payment Type') }}</label>:</b> {{  $order->payment->name[$admin_language] }}<br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.layouts.table-head',['datatable'=>''])
                @include('admin.orders.table-show')
                @include('admin.layouts.table-foot')
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- /.col -->
    <div class="col-xs-12">
        @include('admin.layouts.table-head',['datatable'=>''])
          <tr>
            <th style="width:50%">{{ __('Subtotal') }}:</th>
            <td>{{ number_format((float)$order->price, getCurrencyView(), '.', '') }} {{ $currency[$admin_language] }}</td>
          </tr>
          <tr>
            <th>{{ __('Discount') }}</th>
            <td>{{ number_format((float)$order->discount, getCurrencyView(), '.', '') }} {{ $currency[$admin_language] }}</td>
          </tr>
          <tr>
            <th>{{ __('Shipping') }}:</th>
            <td>{{ number_format((float)$order->shipping, getCurrencyView(), '.', '') }} {{ $currency[$admin_language] }}</td>
          </tr>
          <tr>
            <th>{{ __('Total') }}:</th>
            <td>{{ number_format((float)$order->total, getCurrencyView(), '.', '') }} {{ $currency[$admin_language] }}</td>
          </tr>
        @include('admin.layouts.table-foot')
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@stop
@section('after_foot')
{{--  <script>
    if(navigator.userAgent.indexOf("Firefox") != -1 )
    {
        window.print();
        window.location = "{{ URL::route('admin.orders.index') }}";
    }else{
        window.print();
        setTimeout(function(){window.location = "{{ URL::route('admin.orders.index') }}";}, 15000);
    }
    </script>  --}}
@stop

