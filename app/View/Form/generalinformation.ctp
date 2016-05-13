<div>
<table width="650px" style="table-layout: fixed; margin: 0 auto;">
<tr>
    <td width="20%"></td>
    <td width="50%"><span class="generalinfoheader">Advertisement</span>
    <br/>For Advertisement: <a href="<?php echo $this->webroot . '/files/CUP Recruietment TNT-01(2016 Notice.jpg'; ?>" target="_blank">click here</a>
    <br/></td>
	<td></td>
    
</tr>
<tr>
    <td></td>
    <td><span class="generalinfoheader">Educational Qualifications</span>
    <br/>Essential Qualifications   for Non Teaching positions: 
		<a href="<?php echo $this->webroot . '/files/Final Details TNT-01(2016).doc'; ?>" target="_blank">click here</a><br/>
    <br/></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>There is no fee for SC/ST/PWD applicants and for others the fee is Rs. 600. 
        <br/>
        The last date of online application form is 30<sup>th</sup> May, 2016 1700 hrs
        <br/>
        The last date for signed copy submission is 06<sup>th</sup> June, 2016 1700 hrs
    </td>
    <td>
    </td>
</tr>
<tr>
    <td></td>
    <td>If the candidate is selected, she/he will be required to submit Aadhaar within one month of joining.
    </td>
    <td></td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td>In case of payment failure, the final submission of application will not take place. The candidate will not be able to print the form.</td>
    <td></td>
    <td></td>
</tr>-->
<!--
<tr>
    <td></td>
    <td>If payment fails, it will be automatically refunded to the same account.</td>
    <td></td>
    <td></td>
</tr>-->
<tr>
    <td></td>
    <td>Billing Address is the address of Credit/Debit card holder.</td>
    <td></td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td>
        <span>For detailed qualifications, please <a href="javascript: void(0);" target="_blank">click here</a></span>.
    </td>
    <td></td>
    <td></td>
</tr>-->
<tr>
    <td></td>
    <td><label>I have read the <a href="<?php echo $this->webroot . '/files/General Instructions for Non Teaching.docx'; ?>" target="_blank">General Conditions to Apply</a> and <a href="<?php echo $this->webroot . '/files/Refund Policy.pdf'; ?>">Payment & Refund Policy</a>: (Tick the box to continue)</label>
    </td>
    <td><input type="checkbox" id="declaration" name="declaration"></input></td>
</tr>
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">Post Applied For: *</span>
    </td>
    <td>
        <select id="post_applied_for" name="post_applied_for" style="width: auto;">
            <option value="none" selected="selected">None</option>
            <option value="internalauditofficer">Librarian</option>
            <option value="internalauditofficer">Deputy Librarian</option>
            <option value="internalauditofficer">Internal Audit Officer</option>
            <option value="assistantregistrar">Assistant Registrar</option>
            <option value="assistantregistrar">Medical Officer</option>
            <option value="privatesecretary">Private Secretary</option>
            <option value="privatesecretary">Assistant</option>
            <option value="personalassistant">Personal Assistant</option>
            <option value="juniorengineer_civ">Junior Engineer (Civil)</option>
            <option value="estateofficer">Estate Officer</option>
            <option value="pharmacist">Pharmacist</option>
            <option value="securityinspector">Security Inspector</option>
            <option value="securityinspector">Upper Division Clerk</option>
            <option value="securityinspector">Lower Division Clerk</option>
            <option value="securityinspector">Driver</option>
            <option value="cook">Cook</option>
            <option value="libraryattendant">Library Attendant</option>
            <option value="libraryattendant">Laboratory Attendant</option>
            <option value="libraryattendant">Kitchen Attendant</option>
        </select>
    </td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><div id="post_selected_elig" style="display:none;" class="min_qualification"></div>
    </td>
    <td></td>
    <td></td>
</tr>    
<tr>
    <td></td>
    <td><div style="text-align: center; font-size: 20px;">
        <?php if(isset($applicant) && $applicant['Applicant']['final_submit'] != "1" ) {
              echo $this->Form->create('Temp', array('id' => 'Continue_Form', 'url' => Router::url( '/multi_step_form/wizard/first', true ))); 
              echo $this->Form->submit('Continue to Application Form', array('div' => false, 'id' => 'continue_bt' ));
              echo $this->Form->end(); 
            } ?>
	<!--<a href="<?php echo $this->webroot; ?>multi_step_form/wizard/first" class="button" id="continue_bt">Continue</a>-->
    </div>
    </td>
    <td><div style="text-align: center; font-size: 20px;"><?php if(isset($applicant) && $applicant['Applicant']['final_submit'] == "1" ) {
              echo $this->Form->create('Temp2', array('id' => 'Print_Form', 'url' => Router::url( '/form/print_bfs', true ))); 
              echo $this->Form->submit('Print Application Form', array('div' => false, 'id' => 'print_bt' ));
              echo $this->Form->end(); 
              } ?>
        </div>
    </td>
	<td></td>
</tr>
</table>
<script>
    $(document).ready(function() {
        $('#post_applied_for').val('none');
        //$('#continue_bt').prop('disabled', true);
        $('#declaration').prop('checked', false);

        $('#post_applied_for', '#declaration').on('change', function() {
            if($(this).val() === 'none' || $('#declaration').is(':checked') == false) {
                $('#post_selected_elig').css("display","none");
            }
            else {
                $('#post_selected_elig').empty();
                $('#post_selected_elig').append($('#' + $(this).val()).clone().css('display','block'));
                $('#post_selected_elig').css("display","block");
            }
        });

        $('#continue_bt').on('click', function(e){
            if($('#post_applied_for').find(":selected").val() === 'none'
				|| $('#declaration').is(':checked') == false) {
                e.preventDefault();
				alert('Please select General Conditions to Apply (Tick Box) and Post Applied For.');
            }
            else {
                e.preventDefault();
                window.location.href = '<?php echo $this->webroot; ?>multi_step_form/wizard/first?post=' + $('#post_applied_for').find(":selected").text();
            }
        });
        
        
        <?php 
            if(!empty($this->Session->read('disabled_posts'))) {
                foreach ($this->Session->read('disabled_posts') as $value) {
                    echo "$(\"#post_applied_for option[text='" . $value .  "']\").remove();";
                    echo "$('#post_applied_for option').each(function() {\n
                        if ( $(this).text() == '" . $value . "' ) {\n
                            $(this).remove();\n
                        }\n
                    });\n";
                }
            }
         ?>
         

         $('#declaration').change(function(){
            if($(this).is(':checked')) {
                $('#continue_bt').prop('disabled', false);
            }
            else {
                $('#continue_bt').prop('disabled',true);
            }
        });
    });
</script>
