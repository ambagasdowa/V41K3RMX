
<div class="grid simple">

    <div class="grid-title no-border">
        <h3>Reports</h3>
    </div>

    <div class="grid-body no-border">


        <table data-toggle="table"
               data-search="true"
               data-show-toggle="true"
               data-show-columns="true"
               data-pagination="true">
            <thead>
            <tr>
                <th data-sortable="true">Ad ID</th>
                <th data-sortable="true">Property Name</th>
                <th data-sortable="true" data-visible="false">Price</th>
                <th data-sortable="true">User Name</th>
                <th data-sortable="true" data-visible="false">Member Id</th>
                <th data-sortable="true" data-visible="false">Publish</th>
                <th data-sortable="true">Buy</th>
                <th data-sortable="true">Rent</th>
                <th data-sortable="true" >Swap</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach($this->properties as $prop){
                ?>
                <tr>
                    <td><?php echo $prop['ad_id']?></td>
                    <td><?php echo $prop['name']?></td>
                    <td><?php echo $prop['resale_fee']?></td>
                    <td><?php echo $prop['first_name'].' '.$prop['last_name']; ?> </td>
                    <td><?php echo $prop['member_id']?> </td>
                    <td> <i class="<?php echo ($prop['status']==1) ? 'fa fa-check' : 'fa fa-times'  ?>"></i> </td>
                    <td> <i class="<?php echo ($prop['buy']==1) ? 'fa fa-check' : 'fa fa-times'  ?>"></i> </td>
                    <td> <i class="<?php echo ($prop['rent']==1) ? 'fa fa-check' : 'fa fa-times'  ?>"></i> </td>
                    <td> <i class="<?php echo ($prop['swap']==1) ? 'fa fa-check' : 'fa fa-times'  ?>"></i> </td>

                </tr>
                    <?php
            }

            ?>
            </tbody>
        </table>


    </div>

</div>

