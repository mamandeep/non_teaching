<?php

echo $this->Form->create('Misc', array('id' => 'Misc_Details', 'url' => Router::url( null, true ))); ?>
<div class="main_content_header">5. Referees </div>
<div id="contentContainer">
    <div class="table_headertxt">Names and complete postal addresses of 3 referees: For Class A Posts only (The referee should be the last employers of the candidate or any other person having know-how of candidates experience/knowledge and should not be related to the applicant)</div>
    <table id="referee_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="25%"></td>
            <td width="25%"><?php echo $this->Form->label('Referee1', 'Referee-1'); ?></td>
            <td width="25%"><?php echo $this->Form->label('Referee2', 'Referee-2'); ?></td>
            <td width="25%"><?php echo $this->Form->label('Referee3', 'Referee-3'); ?></td>    
        </tr>
        <tr>
            <td>Name & complete postal addresses</td>
            <td><?php echo $this->Form->input('Misc.id', array('type', 'hidden'));
                      echo $this->Form->input('Misc.user_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));
                      echo $this->Form->input('Misc.ref_add1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_add2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_add3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $this->Form->input('Misc.ref_email1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_email2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_email3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>Phone (Landline) with STD Code:</td>
            <td><?php echo $this->Form->input('Misc.ref_landline1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_landline2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_landline3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>Mobile Ph:</td>
            <td><?php echo $this->Form->input('Misc.ref_mobile1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_mobile2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_mobile3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>Fax:</td>
            <td><?php echo $this->Form->input('Misc.ref_fax1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_fax2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.ref_fax3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
    <br />
    <div class="main_content_header">6. Present Position</div>
    <table id="present_position_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="10%"><?php echo $this->Form->label('Designation', 'Designation'); ?></td>
            <td width="30%"><?php echo $this->Form->label('NameoftheUniversityInstitution', 'Name of the University/Institution'); ?></td>
            <td width="15%"><?php echo $this->Form->label('BasicPay', 'Basic Pay(Rs.)'); ?></td>
            <td width="20%"><?php echo $this->Form->label('PayScale', 'Grade Pay(Rs.)'); ?></td>
            <td width="15%"><?php echo $this->Form->label('GrossPay', 'Gross Pay/Total Salary p.m. (Rs.)'); ?></td>
            <td width="10%"><?php echo $this->Form->label('IncrementDate', 'Increment date(Date/Month)'); ?></td>
            <!--<td width="10%"><?php echo $this->Form->label('SrNoOfProof', 'Sr. no. of proof enclosed'); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Misc.presentp_desig', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.presentp_nameuniv', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.presentp_basic_pay', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.presentp_pay_scale', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.presentp_gross_salary', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Misc.presentp_increment_date', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Misc.presentp_sr_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
    </table>
    <table>
        <tr>
            <td class="table_headertxt" style="width: 30%">Minimum time required for joining, if selected:</td>
            <td style="width: 30%"><?php echo $this->Form->input('Misc.time_req_for_joining', array('label' => false, 'maxlength' => '500')); ?></td>
            <td></td>
        </tr>
    </table>
    <div class="main_content_header">7. Miscellaneous</div>
    <table>
        <tr>
            <td class="table_headertxt misc_col1">Any other information relevant to the post applied for:</td>
            <td colspan="2" style="width: 55%"><?php echo $this->Form->input('Misc.any_other_info', array('label' => false, 'maxlength' => '500'));  ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Membership in Professional Bodies</td>
            <td style="width: 10%">
                <div>
                    <input type="radio" name="data[Misc][mem_pro_bodies]" id="mem_pro_bodies_yes" value="yes">
                    <label>Yes</label>
                </div>
            </td>
            <td style="width: 45%">
                <div>
                    <input type="radio" name="data[Misc][mem_pro_bodies]" id="mem_pro_bodies_no" value="no">
                    <label>No</label>
                </div>
            </td>
        </tr>
        <tr>
            <td class="mem_details table_headertxt misc_col1">Membership Details</td>
            <td class="mem_details" colspan="2" style="width: 55%">
                <?php echo $this->Form->input('Misc.mem_details', array('label' => false, 'maxlength' => '500')); ?>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Have you ever been punished during your service or convicted by a court of law?</td>
            <td style="width: 10%">
                <div>
                    <input type="radio" name="data[Misc][convicted]" id="convicted_yes" value="yes">
                    <label>Yes</label>
                </div>
            </td>
            <td style="width: 45%">
                <div>
                    <input type="radio" name="data[Misc][convicted]" id="convicted_no" value="no">
                    <label>No</label>
                </div>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Do you have any case pending against you in any court of law?</td>
            <td style="width: 10%">
                <div>
                    <input type="radio" name="data[Misc][pending_court]" id="pending_court_yes" value="yes">
                    <label>Yes</label>
                </div>
            </td>
            <td style="width: 45%">
                <div>
                    <input type="radio" name="data[Misc][pending_court]" id="pending_court_no" value="no">
                    <label>No</label>
                </div>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Total number of self-attested documents attached with the hard copy of the application form (Applications without self attested testimonials/documents will not be entertained):</td>
            <td colspan="2" style="width: 55%">
                <?php echo $this->Form->input('Misc.total_self_att_docs_att', array('label' => false, 'maxlength' => '500')); ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Are you willing to accept the minimum initial pay in the grade? If no, state reason(s)</td>
            <td style="width: 10%">
                <div>
                    <input type="radio" name="data[Misc][willg_min_pay]" id="willg_min_pay_yes" value="yes">
                    <label>Yes</label>
                </div>
            </td>
            <td style="width: 45%">
                <div>
                    <input type="radio" name="data[Misc][willg_min_pay]" id="willg_min_pay_no" value="no">
                    <label>No</label>
                </div>
            </td>
        </tr>
        <tr>
            <td class="min_pay_reason" colspan="3" style="width: 100%">
                <?php echo $this->Form->input('Misc.min_pay_no', array('label' => false, 'maxlength' => '500')); ?>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">If selected how would you like to develop your Department/University and your area of interest (only in 200 words):</td>
            <td colspan="2" style="width: 55%"><?php echo $this->Form->input('Misc.develop_department', array('label' => false, 'maxlength' => '500'));  ?></td>
        </tr>
    </table>
    
</div>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>
<script>
    $(document).ready(function() {
        $('.mem_details').each(function(){
                    $(this).css('display','none');
        });
        
        $('.min_pay_reason').each(function(){
                    $(this).css('display','none');
        });
        
        $("input[name='data[Misc][mem_pro_bodies]']").change(function(){
            if($(this).val() === 'yes') {
                $('.mem_details').each(function(){
                    $(this).css('display','table-cell');
                });
            }
            else {
                $('.mem_details').each(function(){
                    $(this).css('display','none');
                });
            }
        });
        
        $("input[name='data[Misc][willg_min_pay]']").change(function(){
            if($(this).val() === 'no') {
                $('.min_pay_reason').each(function(){
                    $(this).css('display','table-cell');
                });
            }
            else {
                $('.min_pay_reason').each(function(){
                    $(this).css('display','none');
                });
            }
        });
        
        <?php 
        if(isset($json_radio)) {
            foreach ($json_radio as $key => $value) {
                if(key($value) == "willg_min_pay" && $value[key($value)] == "no") {
                    echo "$('.min_pay_reason').each(function(){\n
                        $(this).css('display','table-cell');\n
                    });\n"; 
                }
                else if(key($value) == "mem_pro_bodies" && $value[key($value)] == "yes") {
                    echo "$('.mem_details').each(function(){\n
                        $(this).css('display','table-cell');\n
                    });\n";
                }
                echo "$(\":radio[name='data[Misc][" . key($value) . "]'][value='" . $value[key($value)] . "']\").prop('checked', true);\n";
                //echo "// 12";
            }
        }
        ?>
    });
</script>