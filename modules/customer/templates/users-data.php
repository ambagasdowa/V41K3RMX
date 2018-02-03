<?php
if($this->data)
{
    foreach($this->data['users'] as $rs)
    {

        $since=false;
        if(!empty($rs['signed_on']))
        {
            $since=explode(' ',$rs['signed_on']);
        }

        ?>
        <tr style="background-color:<?php echo ($rs['val'] == 1)?'rgb(224, 255, 224)':'none';?>;">
            <input type="hidden" class="mid_val" value="<?php echo $rs['member_id']; ?>"/>
            <!--                        <td><img class="img-circle width-1" src="/uploads/avatar/<?php /*echo ($rs['avatar'] != '')?$rs['avatar']:'sampleUser.png';*/?>"  /></td>
-->                        <td><strong><?php echo $rs['member_id']; ?></strong></td>
            <td><?php echo $rs['first_name']; ?></td>
            <td><?php echo $rs['last_name']; ?></td>
            <td><?php if($since){echo 'Member Since: '.  date('d/M/Y', strtotime($since[0]));}else{echo 'No Signed';}?></td>
            <td>
                <?php

                $LEVELS = array("1"=>"Starter","2"=>"Preferred","3"=>"Elite","4"=>"Select","5"=>"Professional");
                switch ($rs['membership'])
                {
                    case 'starter': $level = 1; break;
                    case 'preferred': $level = 2; break;
                    case 'elite':$level = 3; break;
                    case 'select': $level = 4; break;
                    case 'professional': $level = 5; break;
                }

                ?>
                <select class="form-control manualTrigger"  name="Membership"
                        member_id="<?php echo $rs['member_id']; ?>" user_id="<?php echo $rs['user_id']; ?>"
                        onchange="changeMembershipType(this); return false;">
                    <?php
                    foreach($LEVELS as $l=>$ship)
                    {
                        if($l >= $level)
                        {
                            ?>
                            <option value="<?php echo $ship;?>" <?php echo ($rs['membership'] == $ship)?'selected':''?>><?php echo $ship;?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
            </td>
            <td class="text-right">
                <button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Member history"
                        onclick="openModal(this);return false;"  title="History"   url="/user/history"   folder="agent"  data-id="<?php echo $rs['user_id'];?>"   member-id="<?php echo $rs['member_id']?>" >
                    <i class="fa fa-history"></i>
                </button>

               <!-- <a  class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit properties"
                    href="/agent/property/user/<?php /*echo $rs['user_id'];*/?>" onclick="block()">
                    <i class="fa fa-building"></i>
                </a>-->

                <button  class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit properties"
                     onclick="openModal(this)" title="Properties" url="/agent/property/user" folder="agent" data-id="<?php echo $rs['user_id'];?>">
                    <i class="fa fa-building"></i>
                </button>

               <!-- <button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Email row"
                        onclick="openEmailsForMember(this)" member_id="<?php /*echo $rs['member_id'];*/?>" user_id="<?php /*echo $rs['user_id'];*/?>">
                    <i class="fa fa-envelope"></i>
                </button>-->
                <a type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-original-title="Edit user"
                   mid="<?php echo $rs['user_id'];?>"
                   title="Member Detail" href="/agent/profile/user/<?php echo $rs['user_id']?>" target="_blank">
                <i class="fa fa-user"></i>
                </a>
                <?php
                if($rs['active'] == 1)
                {
                    $class='fa fa-user-times red';
                    $color='red';
                    $value=0;
                    $title='Deactivate Member';

                }
                else if($rs['active'] == 0)
                {
                    $class='fa fa-user-plus green';
                    $color='green';
                    $value=1;
                    $title='Activate Member';
                }
                ?>
                <button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Member history"
                        onclick="openModal(this);return false;"  title="Hitory Sent Messages"   url="/user/history_messages"   folder="agent"  data-id="<?php echo $rs['user_id'];?>"   member-id="<?php echo $rs['member_id']?>" >
                    <i class="fa fa-envelope"></i>
                </button>
                <!--<button type="button" id="sendNotice" class="deactivate btn btn-icon-toggle" data-toggle="tooltip" data-placement="top"
                        mid="<?php /*echo $rs['member_id']; */?>"
                        op="xhtml"
                        onclick="send3rdNoticeEmail(this);return false" >
                    <i class="fa fa-envelope"  ></i>
                </button>-->
                <!-- <button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button> -->
                <button type="button" id="deactivate" class="deactivate btn btn-icon-toggle" data-toggle="tooltip" data-placement="top"
                        mid="<?php echo $rs['member_id']; ?>"
                        title="<?php echo $title; ?>"
                        uid="<?php echo $rs['user_id']; ?>"
                        data-value="<?php echo $value;?>" onclick="addRemoveMember(this)" >
                    <i class="<?php echo $class?>" ></i>
                </button>

            </td>
        </tr>

        <?php
    }
}
?>