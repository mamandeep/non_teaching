<?php 
echo $this->Html->script('publications');

echo $this->Form->create('Researchpaper', array('id' => 'Researchpaper_Details', 'url' => Router::url( null, true ))); ?>
<div class="main_content_header">4. Publications, if any</div>
<input type="hidden" name="modified" id="modified" value="false" />
<input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('applicant_id'); ?>" />
<fieldset>
    <table id="grade-table">
        <thead>
            <tr>
                <th>Authors</th>
                <th>Title of the Paper</th>
                <th>Journal's Name & Place of Publication</th>
                <th>Publication & ISSN</th>
                <th>Vol./Page No/Year</th>
                <th>Impact Factor</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Researchpaper'])) {
                    for ($key = 0; $key < count($this->request->data['Researchpaper']); $key++) {
                        echo $this->element('publication', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>

<script id="grade-template" type="text/x-underscore-template">
    <?php echo $this->element('publication');?>
</script>

<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('id' => 'formSubmit' , 'div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>

<?php echo $this->Form->end(); ?>