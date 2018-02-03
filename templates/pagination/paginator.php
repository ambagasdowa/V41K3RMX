<?php
$function = $this->data['function'];
if(isset($this->_paginacion)):?>

    <div class="pagination" style="text-align: center; margin:0px; font-size: 20px;">
        <ul class="pagination_tsr" id="pagination-area" style=" margin:0px">
            <?php if($this->_paginacion['primero']): ?>

                <li><a class="fa fa-angle-double-left" href="javascript:void(0)" onclick="<?php echo $function?>(<?php echo  $this->_paginacion['primero']; ?>)"></a></li>

            <?php else: ?>

                <li class="disabled"><span class="fa fa-angle-double-left"></span></li>

            <?php endif; ?>

            <?php if($this->_paginacion['anterior']): ?>

                <li><a class="fa fa-angle-left" href="javascript:void(0)" onclick="<?php echo $function?>(<?php echo  $this->_paginacion['anterior']; ?>) "></a></li>

            <?php else: ?>

                <li class="disabled"><span class="fa fa-angle-left"></span></li>

            <?php endif; ?>

            <?php for($i = 0; $i < count($this->_paginacion['rango']); $i++): ?>

                <?php if($this->_paginacion['actual'] == $this->_paginacion['rango'][$i]): ?>

                    <li class="active"><span><?php echo $this->_paginacion['rango'][$i]; ?></span></li>

                <?php else: ?>

                    <li>
                        <a href="javascript:void(0)" onclick="<?php echo $function?>(<?php echo  $this->_paginacion['rango'][$i]; ?>)">
                            <?php echo $this->_paginacion['rango'][$i]; ?>
                        </a>
                    </li>

                <?php endif; ?>

            <?php endfor; ?>

            <?php if($this->_paginacion['siguiente']): ?>

                <li><a class="fa fa-angle-right" href="javascript:void(0)" onclick="<?php echo $function?>(<?php echo  $this->_paginacion['siguiente']; ?>)"></a></li>

            <?php else: ?>

                <li class="disabled"><span class="fa fa-angle-right"></span></li>

            <?php endif; ?>

            <?php if($this->_paginacion['ultimo']): ?>

                <li><a class="fa fa-angle-double-right" href="javascript:void(0)" onclick="<?php echo $function?>(<?php echo  $this->_paginacion['ultimo']; ?>)"></a></li>

            <?php else: ?>

                <li class="disabled"><span class="fa fa-angle-double-right"></span></li>

            <?php endif; ?>
        </ul>
    </div>

<?php  endif;