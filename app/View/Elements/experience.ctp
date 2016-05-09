<?php
$key = isset($key) ? $key : '<%= key %>';
$org = isset($org) ? $org : 'Central_Government';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Experience.{$key}.id") ?>
        <?php echo $this->Form->hidden("Experience.{$key}.user_id") ?>
        <?php echo $this->Form->text("Experience.{$key}.designation"); ?>
    </td>   
    <td>
        <?php echo $this->Form->text("Experience.{$key}.scale_of_pay"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Experience.{$key}.name_add"); ?>
    </td>
    <td>
        <?php 
                    echo $this->Form->input("Experience.{$key}.insti_type", array(
                    'options' => array('Central Government' => 'Central Govt.',
                                       'State Government' => 'State Govt.',
                                       'Autonomous' => 'Autonomous',
                                       'Government Aided' => 'Govt. Aided',
                                       'Private' => 'Private',
                                       'Other' => 'Other'),
                    'selected' => $org,
                    'label' => false
                ));
                 ?>
    </td>
    <td>
        <?php echo $this->Form->text("Experience.{$key}.from_date"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Experience.{$key}.to_date"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Experience.{$key}.no_of_yrs_mnths"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Experience.{$key}.nature_of_work"); ?>
    </td> 
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>