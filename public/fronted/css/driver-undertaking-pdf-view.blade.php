<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


$site_setting = DB::table('site_setting')->first();




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Driver SOA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </link>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    <!-- <style type="text/css">
		table,th,td{
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style> -->
    <style type="text/css">
        /*   table td, table th {
            border: 1px solid black;
        }   */


        .page-break {
            page-break-after: always;
        }
    </style>

</head>

<body>
    <font size="2" face="Courier New">
        <table style="max-width: 800px;margin:auto;">

            <tr>
                <td>
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div>

                                    <span style="float: left"> <?php echo '<img src=' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . ' style="display: block;margin-bottom:10px;margin-top:20px;max-height: 50px;">'; ?></span>
                                    <h2>ADRIVE PRIVATE LIMITED</h2>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <h2>LATTER of UNDERTAKING</h2>
                            </td>
                        </tr>
                       <!--  <tr>
                            <td>Dear Mr ABC</td>
                        </tr> -->




                        <tr>
                            <td colspan="2">
                                <p>Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing</p>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="margin:auto;max-width:700px; text-align: center; width:90%; border-collapse: collapse;border: 1px solid black ">
                        <tr>
                            <td colspan="5" style="border: 1px solid black ">
                                <h4>Payment Schedule</h4>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black ">No</td>
                            <td style="border: 1px solid black ">Due Date</td>
                            <td style="border: 1px solid black ">Amount</td> 
                            <!-- <td>Balance</td> -->
                        </tr>
                        <?php $i =1; foreach ($detailsData as $rwData) { ?>
                            <tr>
                                <td style="border: 1px solid black ">{{ $i}}</td>
                                 <td style="border: 1px solid black ">{{ ($rwData->start_date !='' && $rwData->start_date != '1970-01-01')?  date(Config::get('constants.options.DateFormat'), strtotime($rwData->start_date)):'-' }}</td>
                                <td style="border: 1px solid black "><?= ($rwData->installment_amount != '') ? $rwData->installment_amount : '-' ?></td>

                            </tr>
                        <?php $i++; } ?>
                        <tr>
                            <td colspan="2" style="border: 1px solid black "><b>Total</b></td>
                            <td style="border: 1px solid black "><b>{{($total!= 0) ? number_format($total,2) : '-' }}</b></td>
                        </tr>

                    </table>
                    <br><br>
                </td>
            </tr>

            <tr>
                <td style="border-top: 1px solid black">
                    <p>
                        <!--  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard Lorem Ipsum is simply dummy text of the printing and typesetting industry. -->
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                       <!--  <tr>
                            <td>
                                <p>Account Name:ADRIVE PRIVATE LIMITED</p>
                                <p>Bank Name:DBS CURRENT</p>
                                <p>Bank Account No:XXXXXXXXXX</p>


                            </td>

                            <td colspan="2" style="border-left: 1px solid black; padding-left: 20px ">
                                <p>PAYNOW UEN: XXXXXXXXX</p>
                            </td>
                        </tr> -->
                        <tr>
                            <td>

                                <div style="border-bottom: 1px solid black; width: 50%;margin-top:50px !important;">

                                </div>
                                <p>Debtor <br>{{ date(Config::get('constants.options.DateFormat'))  }}</p>
                                

                               
                            </td>
                            <td style="padding:25px;"></td>
                            <td>

                                <div style="border-bottom: 1px solid black;width: 100%;margin-top:50px !important; ">

                                </div>
                                <p>Creditor   <br>ADRIVE PRIVATE LIMITED <br>{{ date(Config::get('constants.options.DateFormat'))  }}</p>
                                 


                            </td>


                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </font>
</body>

</html>