<div class="row">
    <div class="col-md-8">
        <table class="table">
            <tr>
                <th>Name</th>
                <th style="width: 20%">Order Tab</th>
            </tr>

            <?php
            foreach($this->Category as $cat)
            {
                $active1 = ($cat['active_cat'] == 1 ) ? 'active' : '';
                $active2 = ($cat['active_cat'] == 1 ) ? '' : 'active';
                echo '<tr>';
                echo '<td><div class="input-group">
                            <input type="text" class="form-control" onchange="updateCategory(this)"
                                   placeholder="Category Name" f="name_cat" cat_id ="'.$cat['category_id'].'"
                                   value="'.$cat['name_cat'].'">
                            <span class="input-group-addon"><i class="fa fa-navicon"></i></span>
                        </div>
                  </td>';


                echo '<td><div class="input-group">
                            <input type="text" class="form-control" onchange="updateCategory(this)"  cat_id ="'.$cat['category_id'].'"
                                   placeholder="Category Name" f="tab_cat"
                                   value="'.$cat['tab_cat'].'" >
                            <span class="input-group-addon"><i class="fa  fa-sort-amount-asc"></i></span>
                        </div></td>';

                echo '</tr>';
            }
            ?>
            </tr>
        </table>    
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <table class="table">

            <tbody>
            <tr>
                <td><div class="input-group">
                        <input type="text" class="form-control"
                               placeholder="Category Name" id="name_cat"
                               value="">
                        <span class="input-group-addon"><i class="fa fa-navicon"></i></span>
                    </div>
                </td>
                <td style="width: 20%"><div class="input-group">
                        <input type="text" class="form-control"
                               placeholder="0" id="tab_cat"
                               value="" >
                        <span class="input-group-addon"><i class="fa  fa-sort-amount-asc"></i></span>
                    </div></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td  class="pull-right"></td>
            </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-block btn-default" onclick="addCategory();">Add Category</button>
    </div>
</div>