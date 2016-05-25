<!--<div class="main_content_header">Download API Proforma: <a href="<?php echo $this->webroot . '/files/CAS-API-Score Sheet.xls'; ?>">Click Here</a></div> -->
<?php
/*echo $this->Html->script('jquery.ui.widget.js');
echo $this->Html->script('jquery.iframe-transport.js');
echo $this->Html->script('jquery.fileupload.js');*/
if(!empty($applicant['Applicant']['post_applied_for']) && ($applicant['Applicant']['post_applied_for'] == "Librarian" || $applicant['Applicant']['post_applied_for'] == "Deputy Librarian")) {
echo $this->Form->create('Image', array('id' => 'Image_Details', 'url' => Router::url( null, true ), 'type' => 'file')); ?>
<div class="main_content_header"> Upload Documents</div>
<div id="contentContainer">
    <table>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">API Proforma (MS Word format - <a href="<?php echo $this->webroot . '/files/API Form.doc'; ?>">Download</a>, Fill and Upload here, min size 10 kb, max size 800 kb)
                    <?php echo $this->Form->input('Image.id', array('type' => 'hidden'));
                          echo $this->Form->input('Image.applicant_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));   ?>
            </td>
            <td><?php echo $this->Form->input('filename5', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        
        <!--<tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Note: Images can be uploaded using the mobile phone also.</td>
            <td></td>
        </tr>-->
    </table>
    
</div>
<div class="submit">
    <?php echo $this->Form->submit('Submit', array('div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>
<?php } ?>
<script>
    /*$(function () {
        $('#fileupload').fileupload({
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo(document.body);
                });
            }
        });
    });*/
</script>