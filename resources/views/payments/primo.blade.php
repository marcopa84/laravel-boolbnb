@php
    use Carbon\Carbon;

    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
        ]);

    $token = $gateway->ClientToken()->generate();
    // $datacheckout = [
    //     'bought_ad' => $bought_ad,
    //     'amount' => $amount
    // ];

@endphp
@extends('layouts.layout')
@section('main')
    {{-- @dd($amount); --}}
  <div class="page-wrapper container my-5">
    <form id="payment-form" method="post" action="{{route('payment.checkout')}}">
      @csrf
      @method('POST')
      <section class="payment-form ">
        <h2 class="payment-form-text">Pagamento della sponsorizzazione</h3>
        <div class="payment-form-info">
          <p class="payment-form-info-paragraph">
            La sponsorizzazione inizier&agrave; {{Carbon::createFromDate($bought_ad->start_date)->format('d-m-Y \\a\\l\\l\\e  H:i')}} ad un costo di € {{$amount}}
          </p>
          <p class="payment-form-info-paragraph">
            La sponsorizzazione permetter&agrave; al tuo appartamento di avere la massima visibilit&agrave; e nelle ricerche verr&agrave; posizionato tra le prime proposte 
          </p>
        </div>
        <div class="bt-drop-in-wrapper">
          <div id="bt-dropin"></div>
        </div>
      </section>
      {{-- <input name="ad_id" type="hidden" value="{{$info['ad_id']}}">
      <input name="apartment_id" type="hidden" value="{{$info['apartment_id']}}">
      <input name="start_data" type="hidden" value="{{Carbon::createFromDate($info['start_date'])}}"> --}}
      <input id="nonce" name="payment_method_nonce" type="hidden">
      <button class="button" type="submit">Paga Sponsorizzazione</button>
  </form>

  
  @section('scripts')
  <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
  <script type="text/javascript" charset="utf-8">
    var form = document.querySelector('#payment-form');
    var client_token = "{{$token}}";
    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      paypal: {
        flow: 'vault'
      }
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        return;
      }
      form.addEventListener('submit', function (event) {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            return;
          }
          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
  </script>
  @endsection <!-- / scripts section -->
  </div>
@endsection <!-- / main section -->