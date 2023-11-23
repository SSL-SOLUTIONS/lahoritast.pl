@extends('layouts.website')
@section('content')

<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>
<div class="container">
    <br><br>
    <h1 class="text-center">Payment Details</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card border">
                <div class="card-header">
                    <h3 class="card-title">Payment Details</h3>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf

                        <div class="form-group">
                            <label for="name_on_card"><b>Name on Card</b></label>
                            <input class="form-control" type="text" id="name_on_card" name="name_on_card">
                            @if ($errors->has('name_on_card'))
                            <span class="text-danger">{{ $errors->first('name_on_card') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="card_number"><b>Card Number</b></label>
                            <input autocomplete="off" class="form-control card-number" type="text" id="card_number" name="card_number">
                            @if ($errors->has('card_number'))
                            <span class="text-danger">{{ $errors->first('card_number') }}</span>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 form-group">
                                <label for="card_cvc"><b>CVC</b></label>
                                <input autocomplete="off" class="form-control card-cvc" type="number" id="card_cvc" placeholder="ex. 311" maxlength="4" name="card_cvc">
                                @if ($errors->has('card_cvc'))
                                <span class="text-danger">{{ $errors->first('card_cvc') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="card_expiry_month"><b>Expiration Month</b></label>
                                <input class="form-control card-expiry-month" type="number" id="card_expiry_month" placeholder="MM" maxlength="2" name="card_expiry_month">
                                @if ($errors->has('card_expiry_month'))
                                <span class="text-danger">{{ $errors->first('card_expiry_month') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="card_expiry_year"><b>Expiration Year</b></label>
                                <input class = "form-control card-expiry-year" type="number" id="card_expiry_year" placeholder="YYYY" maxlength="4" name="card_expiry_year">
                                @if ($errors->has('card_expiry_year'))
                                <span class="text-danger">{{ $errors->first('card_expiry_year') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-lg btn-block" type="submit">{{config('app.currency')}}{{ $totalPrice }} Pay Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
@endsection