@php
    use Carbon\Carbon;
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
        ]);
    $token = $gateway->ClientToken()->generate();
@endphp
@extends('layouts.layout')
@section('main')
  <div class="page-wrapper container my-5">
    <form id="payment-form" method="post" action="{{route('payment.checkout')}}">
      @csrf
      @method('POST')
      <section class="payment-form ">
        <h2 class="payment-form-text">Riepilogo della sponsorizzazione</h3>
        <div class="payment-form-info">
          <p class="payment-form-info-paragraph">
            Inizio: {{Carbon::createFromDate($order->start_date)->format('d/m/Y \\a\\l\\l\\e \\o\\r\\e  H:i')}}
          </p>
          <p class="payment-form-info-paragraph">
            Fine: {{Carbon::createFromDate($order->end_date)->format('d/m/Y \\a\\l\\l\\e \\o\\r\\e  H:i')}}
          </p>
          <p class="payment-form-info-paragraph">
            Costo: € {{$amount}}
          </p>
          <p class="payment-form-info-paragraph">
            La sponsorizzazione permetter&agrave; al tuo appartamento di avere la massima visibilit&agrave; e nelle ricerche verr&agrave; posizionato tra le prime proposte
          </p>
        </div>
        <div class="bt-drop-in-wrapper">
        <div id="bt-dropin"></div>
        </div>
      </section>
      <input name="order_code" type="hidden" value="{{$order->order_code}}">
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
