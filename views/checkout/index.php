<?php
/**
 * Created by PhpStorm.
 * User: cyberio
 * Date: 21/05/17
 * Time: 1:08 AM
 */
#$this->pr($_SESSION);
?>
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <small class="pull-right">  <?php echo $today = date("F j, Y | H:i");?></small>
                <img class="img-responsive" width="32px" height="32px" src="/public/img/logo_open.png" alt="" /></div>

        </h2>
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-xs-6 table-responsive">

                <?php
                $Enterprise = Session::get('Shopping');
                #$Enterprise = $this->Enterprise;
                #$this->pr($Enterprise);
                $cycler = 0;
                if(!empty($Enterprise))
                {
                    foreach ($Enterprise['Enterprise'] as $e => $enterprise)
                    {
                        ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $subtotal = 0;
                                foreach ($enterprise as $e_id => $stuff)
                                {
                                    if ($e_id !== 'enterprise_data'){
                                        $subtotal = 0;
                                        foreach ($stuff as $s_id => $Stuff) {
                                            if (is_int($s_id)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $Stuff['how_many']; ?></td>
                                                    <td><?php echo $Stuff['stuff_data']['name_stuff']; ?></td>
                                                    <td class="pull-right" >$<?php echo number_format($Stuff['how_many']*$Stuff['price'],2,'.',','); ?></td>
                                                </tr>

                                                <?php
                                                    $subtotal +=($Stuff['how_many']*$Stuff['price']);

                                            }
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                        <?php
                        $cycler += CYCLER;
                    }
                }
                ?>



        </div>


    </div>

    <div class="row">
        <div class="col-xs-12" id="addressClient">
            <?php require_once $params['templates'][0];?>
        </div><!-- /.col -->

    </div><!-- /.row -->
    <div class="row">

    </div>
    <div class="row p-bottom-40">
        <!-- accepted payments column -->
        <div class="col-xs-9">

            <!--<p class="lead">Payment Methods:</p>
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
            </p>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-3">



        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
   <!-- <div class="row no-print">
        <div class="col-xs-12">
            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
            </button>
        </div>
    </div>-->
</section>
