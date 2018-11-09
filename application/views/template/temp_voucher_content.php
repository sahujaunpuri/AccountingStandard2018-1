<!DOCTYPE html>
<html>
<head>
    <title>Cash Disbursement</title>
    <style type="text/css">
        body {
            font-family: 'Calibri',sans-serif;
            font-size: 12px;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .data {
            border-bottom: 1px solid #404040;
        }

        .align-center {
            text-align: center;
        }

        .report-header {
            font-weight: bolder;
        }

        hr {
            /*border-top: 3px solid #404040;*/
        }

        tr {
  /*          border: none!important;*/
        }

        tr:nth-child(even){
          
       /*     border: none!important;*/
        }
/*
        tr:hover {
            transition: .4s;
            background: #414141 !important;
            color: white;
        }

        tr:hover .btn {
            border-color: #494949!important;
            border-radius: 0!important;
            -webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
        }*/
            table{
        border:none;
    }
    </style>
</head>
<body>
    <table width="100%" border="0">
        <tr>
            <td width="10%" style="object-fit: cover;"><img src="<?php echo $company_info->logo_path; ?>" style="height: 90px; width: 90px; text-align: left;"></td>
            <td width="90%" class="">
                <span style="font-size: 20px;" class="report-header"><strong><?php echo $company_info->company_name; ?></strong></span><br>
                <span><?php echo $company_info->company_address; ?></span><br>
                <span><?php echo $company_info->landline.'/'.$company_info->mobile_no; ?></span><br>
                <span><?php echo $company_info->email_address; ?></span>
            </td>
        </tr>
    </table><hr>
    <div class="">
        <h3 class="report-header"><strong>CASH DISBURSEMENT</strong></h3>
    </div>
    <table width="100%" border="0" cellspacing="-1">
        <tr>
            <td style="padding: 4px;" width="50%"><strong>DATE :</strong> <?php echo date_format(new DateTime($gen_info->date_txn),"m/d/Y"); ?></td>
            <td style="padding: 4px;" width="50%"><strong>REF # :</strong> </td>
        </tr>
        <?php if ($gen_info->payment_method == 2) { ?>
            <tr> 
                <td style="padding: 4px;" width="50%"><strong>CHECK # :</strong> <?php echo $gen_info->check_no; ?></td>
                <td style="padding: 4px;" width="50%"><strong>CHECK DATE :</strong> <?php echo date_format(new DateTime($gen_info->check_date),"m/d/Y"); ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td style="padding: 4px;" width="50%"><strong>TXN # :</strong> <?php echo $gen_info->temp_voucher_no; ?></td>
            <td style="padding: 4px;" width="50%"><strong>AMOUNT :</strong> <?php echo number_format($gen_info->amount,2); ?></td>
        </tr>
        <tr>
            <td style="padding: 4px;"><strong>PARTICULAR :</strong> <?php echo $gen_info->supplier_name; ?></td>
            <td style="padding: 4px;"><strong>PAYMENT METHOD :</strong> <?php echo $gen_info->payment_method; ?></td>
        </tr>
    </table><br>
    <table width="100%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11" border="0">
            <thead>
            <tr>
                <th width="10%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;">Account #</th>
                <th width="30%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;">Account</th>
                <th width="30%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;">Memo</th>
                <th width="15%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;">Debit</th>
                <th width="15%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;">Credit</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $dr_amount=0.00; $cr_amount=0.00;

            foreach($entries as $account){

                ?>
                <tr>
                    <td width="30%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"><?php echo $account->account_no; ?></td>
                    <td width="30%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"><?php echo $account->account_title; ?></td>
                    <td width="30%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;"><?php echo $account->memo; ?></td>
                    <td width="15%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($account->dr_amount,2); ?></td>
                    <td width="15%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($account->cr_amount,2); ?></td>
                </tr>
                <?php

                $dr_amount+=$account->dr_amount;
                $cr_amount+=$account->cr_amount;

            }

            ?>

            </tbody>
                <tfoot>
                    <tr style="border: 1px solid black;">
                        <td colspan="5"></td>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <td style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;" colspan="2"><strong>Remarks :</strong></td>
                        <td style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;" align="right"><strong>Total : </strong></td>
                        <td style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;" align="right"><strong><?php echo number_format($dr_amount,2); ?></strong></td>
                        <td style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;" align="right"><strong><?php echo number_format($cr_amount,2); ?></strong></td>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <td colspan="2" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"><?php echo $gen_info->remarks; ?></td>
                        <td colspan="3" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"></td>
                    </tr>
                </tfoot>    
        </table><br><br>
        <center>
        <br>
            <table style="text-align: center;border: none!important; ">
                <tr>
                    <td width="25%" style="padding-right: 10px;line-height: 5px;">
                    <?php echo $this->session->journal_prepared_by; ?><br style="">
                    _____________________________</td>
                    <td width="25%" style="padding-right: 10px;line-height: 5px;">
                    <?php echo $this->session->journal_approved_by; ?><br style="line-height:5px;">
                    _____________________________</td>
                    <td width="25%" style="padding-right: 10px;line-height: 5px;">
                    &nbsp;<br style="line-height:5px;">
                    _____________________________</td>
                    <td width="25%" style="padding-right: 10px;line-height: 5px;">
                    &nbsp;<br style="line-height:5px;">
                    _____________________________</td>
                </tr>
                <tr>
                    <td width="25%" style=""><strong>Prepared by</strong></td>
                    <td width="25%" style=""><strong>Approved by</strong></td>
                    <td width="25%" style=""><strong>Received by<br><small>(Signature Over Printed Name)</small></strong></td>
                    <td width="25%" style=""><strong>Date Received</strong></td>
                </tr>
            </table>
        </center>
</body>
</html>







<script type="text/javascript">
    window.print();
</script>












