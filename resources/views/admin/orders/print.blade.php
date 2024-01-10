@extends('admin.layouts.app-print')
@section('title') {{ __('Invoice') }} #
{{ $order->id }}
@stop
@section('content')
@php
    $currency = getCountryView();
@endphp
<div id="container">
    <section id="memo">
        <div class="company-name">
            <span class="ibcl_company_name">{{ $setting["site_title"] ?? '' }}</span>
            <div class="right-arrow"></div>
        </div>
        <div class="logo">
            <img src="{{ $setting['logo_image'] }}" alt="">
        </div>
        <div class="company-info">
            <div><span class="ibcl_company_address">{{ $setting['address'] ?? '' }}</span></div>
            <div class="ibcl_company_email_web">{{ $setting['site_email'] }}</div>
            <div class="ibcl_company_phone_fax">{{ $setting['site_phone'] }}</div>
        </div>
    </section>
    <section id="invoice-info">
        <div>
            <span class="ibcl_issue_date_label">{{ __('Date') }}:</span>
            <span class="ibcl_net_term_label">{{ __('Payment Type') }}:</span>
            <span class="ibcl_po_number_label">{{ __('ID') }}:</span>
        </div>
        <div>
            <span class="ibcl_issue_date">{{ date_format($order->created_at,"F j, Y, g:i a") }}</span>
            <span class="ibcl_net_term">{{  $order->payment->name[$admin_language] }}</span>
            <span class="ibcl_po_number">#{{ $order->id }}</span>
        </div>
    </section>
    <section id="client-info">
        <span class="ibcl_bill_to_label">{{ __('Bill to') }}:</span>
        <div>
            <span class="bold ibcl_client_name">{{ $order->orderMeta->name  }}</span>
        </div>
        <div>
            <span class="ibcl_client_address">{{ $order->orderMeta->address }}</span>
        </div>
        <div>
            <span class="ibcl_client_city_zip_state">@if(isset($order->region))  {{  $order->region->name[$admin_language] }}@endif
                @if(isset($order->city))  - {{  $order->city->name[$admin_language] }}@endif</span>
        </div>
        <div>
            <span class="ibcl_client_phone_fax">+{{ $order->orderMeta->phone  }}</span>
        </div>
        <div>
            <span class="ibcl_client_email">{{ $order->orderMeta->email  }}</span>
        </div>
    </section>
    <div class="clearfix"></div>
    <section id="invoice-title-number">
        <span id="title" class="ibcl_invoice_title">{{ __('Invoice') }}</span>
        <span id="number" class="ibcl_invoice_number">#{{ $order->id }}</span>
    </section>
    <div class="clearfix"></div>
    <section id="items">
        @include('admin.layouts.table-head',['datatable'=>''])
        @include('admin.orders.table-show')
        @include('admin.layouts.table-foot')
    </section>
    <section id="sums">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th class="ibcl_amount_subtotal_label">{{ __('Subtotal') }}:</th>
                    <td class="ibcl_amount_subtotal">{{ number_format((float)$order->price, $currency_view, '.', '') }} {{ $currency[$admin_language] }}</td>
                </tr>

                <tr style="display: table-row;">
                    <th class="ibcl_tax_name">{{ __('Discount') }}</th>
                    <td class="ibcl_tax_value">{{ number_format((float)$order->discount, $currency_view, '.', '') }} {{ $currency[$admin_language] }}</td>
                </tr>
                <tr style="display: table-row;">
                    <th class="ibcl_tax_name">{{ __('Delivery Cost') }}</th>
                    <td class="ibcl_tax_value">{{ number_format((float)$order->shipping, $currency_view, '.', '') }} {{ $currency[$admin_language] }}</td>
                </tr>
                <tr class="amount-total">
                    <th class="ibcl_amount_total_label">{{ __('Total') }}:</th>
                    <td class="ibcl_amount_total">{{ number_format((float)$order->total, $currency_view, '.', '') }} {{ $currency[$admin_language] }}</td>
                </tr>
            </tbody>
        </table>
    </section>
    <div class="clearfix"></div>
    <section id="terms">
        @if($order->note != '' && $order->note != NULL)
        <span class="ibcl_terms_label">{{ __('Note') }}</span>
        <div class="ibcl_terms">{{ $order->note }}</div>
        @endif
    </section>
</div>
@stop

