<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout with Redirect</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
    
</head>
<style>
    body {
    background-color: #000
}

.padding {
    padding: 2rem !important
}

.card {
    margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2
}

h3 {
    font-size: 20px
}

h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium'
}

.text-dark {
    color: #3d405c !important
}
.interswitch-btn{
    border: 1px solid rgb(206, 206, 206);
    height: 40px;
    margin: 0;
    box-shadow: rgb(226, 224, 224) 0px 1px 3px;
    padding: 0 2em 0 0.8em;
    font-weight: 700;
    border-radius: 4px;
    color: rgb(0, 66, 95);
    font-size: 13px;
    text-transform: uppercase;
    background-color: #FFF;
    background-image: url(https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btnbg.png);
    width: 260px;
    display: inline-block;
    box-sizing: border-box;
    cursor: pointer;
    font-family: 'proxima-nova', sans-serif, 'Helvetica';
}
</style>
<body class="bg-light">
    @php
        $user = DB::table('users')->where('email', $cart['email'])->first();
        if ($user->role == 2) {
            $property = DB::table('properties')->where('user_id', $user->id)->first();
            $address = $property->house_number . ', ' . $property->street_name;
        } else {
            $tenant = DB::table('tenants')->where('user_id', $user->id)->first();
            $property = DB::table('properties')->where('user_id', $tenant->landlord_user_id)->first();
            $address = $property->house_number . ', ' . $property->street_name;
        }
        $service = DB::table('services')->where('id', $invoice->service_id)->first();
        $item_name = $service->payment_type . ' Payment For ' . $service->name;
    @endphp
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block" href="index.html" data-abc="true"><img src="{{asset('assets/img/logo.jpg')}}" height="75" alt=""></a>
                <div class="float-right">
                    <h3 class="mb-0">Invoice #{{$invoice->invoice_number}}</h3>
                    Date: {{date('d M, Y', strtotime($invoice->created_at))}}
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <h5 class="mb-3">From:</h5>
                        <h3 class="text-dark mb-1">Greenfield Estate</h3>
                        <div>29, Singla Street</div>
                        <div>Sikeston,New Delhi 110034</div>
                        <div>Email: contact@greenfieldestate.org</div>
                        <div>Phone: 0703 218 9024</div>
                    </div>
                    <div class="col-sm-4">
                        <h5 class="mb-3">To:</h5>
                        <h3 class="text-dark mb-1">{{$invoice->name}} </h3>
                        <div>{{$address}}</div>
                        <div>Email: {{$cart['email']}}</div>
                        <div>Phone: {{$invoice->phone}}</div>
                    </div>
                    <div class="col-sm-4">
                        
                        <form method="POST" action="https://webpay-ui.k8.isw.la/collections/w/pay">
                            <input type="hidden" name="pay_item_name" value="<?= $item_name ?>" />
                            
                            
                            <input type="hidden" name="cust_id" value="<?= $invoice->user_id ?>" />
                            
                           
                            <input type="hidden"  name='currency' value="566"/>
                            <!-- Hidden parameters end -->
                            <input type="hidden" name='merchant_code' value='MX66665' />
                            <input type="hidden" name='pay_item_id' value="Default_Payable_MX66665" />
                            <input type="hidden" name='site_redirect_url' value="http://127.0.0.1:8000/response" /> 
                            <input type="hidden" name='txn_ref' value="<?= $cart['token'] ?>" />
                            <input type="hidden" name='amount' value="<?= $cart['total'] * 100 ?>" />
                            <input type="hidden" name="cust_email" value="<?= $cart['email'] ?>" />
                            <input type="hidden" name="cust_name" value="<?= $invoice->name ?>" />
                          
                            <button class="interswitch-btn" type="submit">
                                <img style="float:left;" class="isw-pay-logo"
                                     src="https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btn.png"/>
                                <span style="margin-top: 10px;display: inline-block;margin-left: 8px;">
                                    Pay with Interswitch
                                </span>
                            </button>
                        </form>
                        
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Description</th>
                            
                                
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach($cart['months'] as $bill)
                            @php $i++; @endphp
                            <tr>
                                <td class="center">{{$i}}</td>
                                <td class="left strong">Payment for {{$cart['name']}} {{$bill}}, {{$cart['year']}}</td>
                               
                               
                                <td class="right">&#8358;{{$cart['amount']}}.00</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Total</strong> </td>
                                    <td class="right">
                                        <strong class="text-dark">&#8358;{{$cart['total']}}.00</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0"><a href="/home">Click here to return back to the dashboard</a></p>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
</body>
</html>

