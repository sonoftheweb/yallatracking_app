<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Yalla! Tracking Application </title>
    <meta name="keywords" content="">
    <meta name="description" content=""/>
    <link rel="shortcut icon" href="<?php echo url('/'); ?>favicon.ico" type="image/x-icon">




    <link href="<?php echo url('/'); ?>/sximo/js/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/fonts/awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/bootstrap.summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/select2/select2.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/iCheck/skins/square/green.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/clockpicker/jquery-clockpicker.css" rel="stylesheet">

    <link href="<?php echo url('/'); ?>/sximo/css/animate.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/css/icons.min.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/toastr/toastr.css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/sximo/css/sximo-light-blue.css" rel="stylesheet">


    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/prettify.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/parsley.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/switch.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/sximo.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/jquery.jCombo.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/toastr/toastr.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/bootstrap.summernote/summernote.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/clockpicker/jquery-clockpicker.min.js"></script>
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/simpleclone.js"></script>


    <!-- AJax -->
    <link href="<?php echo url('/'); ?>/sximo/js/plugins/ajax/ajaxSximo.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo url('/'); ?>/sximo/js/plugins/ajax/ajaxSximo.js"></script>

    <!-- End Ajax -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .sbox-content{
            height: 100vh;
        }
    </style>

</head>
<?php //dd($a);

$deliveries = $a[0];
$datevar = $a[1];

        if(!SiteHelpers::is_payg_customer($deliveries[0]['user_id'])){
            $customre_detail = '<strong>Bill to: </strong>'.$deliveries[0]['first_name'].' '.$deliveries[0]['last_name'].'<br/><br/>';
            $customre_detail .= '<strong>'.$deliveries[0]['company'].'</strong><br/>';
            $customre_detail .= $deliveries[0]['address'].'<br/><br/>';
            $customre_detail .= '<strong>Telephone: </strong><strong>'.$deliveries[0]['phone'].', '.$deliveries[0]['phone_2'].'</strong><br/>';
            $customre_detail .= '<strong>Telephone: </strong>'.$deliveries[0]['email'].', '.$deliveries[0]['alternate_email'];

            $account_detail = '<strong>Account Opening Date: </strong>'.date("F j, Y",strtotime($deliveries[0]['created_at'])).'<br/>';
            $account_detail .= '<strong>Package: </strong>'.SiteHelpers::account_type_names_from_account_type_id($deliveries[0]['account_type']).'<br/>';
            $account_detail .= '<strong>Billing Period: </strong>'.$datevar['month'].', '.$datevar['year'].'<br/>';
            $account_detail .= '<strong>Date: </strong>'.date("F j, Y");
        }
        else{
            $customre_detail = '<strong>Bill to: </strong>'.$deliveries[0]['first_name'].' '.$deliveries[0]['last_name'].'<br/><br/>';
            $customre_detail .= $deliveries[0]['address'].'<br/><br/>';
            $customre_detail .= '<strong>Telephone: </strong><strong>'.$deliveries[0]['phone'].', '.$deliveries[0]['phone_2'].'</strong><br/>';
            $customre_detail .= '<strong>Telephone: </strong>'.$deliveries[0]['email'].', '.$deliveries[0]['alternate_email'];
        }

?>
    <div class="sbox-content">

        <table style="width: 100%; margin-bottom: 100px;">
            <tr>
                <td>
                    {!! $customre_detail !!}
                </td>
                <td>
                    {!! $account_detail !!}
                </td>
            </tr>
        </table>

        <h3>ITEMISED DELIVERIES</h3>
        <table class="table table-bordered table-striped">
            <thead class="no-border">
            <tr style="background: #04045d; color: #fff;">
                <th colspan="2" style="background: #04045d;" >SENDER/PICK UP DETAILS</th>
                <th colspan="2" style="background: #04045d;">PACKAGE DETAILS</th>
                <th colspan="3" style="background: #04045d;">RECEIVER/DROP OFF DETAILS</th>
                <?php if(SiteHelpers::is_payg_customer($deliveries[0]['user_id'])){ ?><th colspan="1" style="background: #04045d;">COST</th><?php } ?>
            </tr>
            <tr>
                <th>Address</th>
                <th>Date / Time</th>
                <th>Type / Weight(kg)</th>
                <th>Package Content</th>
                <th>Address</th>
                <th>Contact Name / Phone Number</th>
                <th>Date / Time</th>
                <?php if(SiteHelpers::is_payg_customer($deliveries[0]['user_id'])){ ?><th class="text-right"></th><?php } ?>
            </tr>
            </thead>
            <tbody class="no-border-y">
            <?php foreach ($deliveries as $record): ?>
            <tr>
                <td>{!! $record['parcel_pickup_location'] !!}</td>
                <td>{!! $record['pickup_time'] !!}</td>
                <td>{!! $record['parcel_type'] !!} / {!! $record['parcel_weight'] !!}kg</td>
                <td>{!! $record['parcel_content'] !!}</td>
                <td>{!! $record['parcel_dropoff_location'] !!}</td>
                <td>{!! $record['dropoff_contact_name'] !!} / {!! $record['dropoff_contact'] !!}</td>
                <td>{!! $record['dropoff_time'] !!}</td>
                <?php if(SiteHelpers::is_payg_customer()){ ?>
                <td class="text-right">
                    <?php
                    echo SiteHelpers::get_delivery_price($record['id']);
                    ?>
                </td>
                <?php } ?>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>