<style>
.wpwl-form {background:#f8f8f8 ; dir:ltr;}
.wpwl-label-brand {display:block;}
.wpwl-form-card { background: #f8f8f8; border:0px} 
.wpwl-control, input.wpwl-control{
   
    direction: ltr;
}

</style>
<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?=$checkoutId?>"></script>
<script>
var wpwlOptions = {
  paymentTarget:"_top",
  applePay: {
    displayName: "MyStore",
    total: { label: "COMPANY, INC." },
    merchantCapabilities: ["supports3DS"],
    supportedNetworks: ["masterCard", "visa", "mada"],
    supportedCountries: ["SA"]
  }
}
</script>
@if (session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
@endif

		<form action="https://www.kafoo.sa/api/v1/hyper/getstatus/" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>

