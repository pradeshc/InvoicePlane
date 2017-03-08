<div class="tab-info">

    <div class="row">
        <div class="col-xs-12 col-md-6">

            <div class="form-group">
                <label for="settings[default_invoice_group]" class="control-label">
                    <?php echo trans('default_invoice_group'); ?>
                </label>
                <select name="settings[default_invoice_group]" class=" form-control simple-select">
                    <option value=""><?php echo trans('none'); ?></option>
                    <?php foreach ($invoice_groups as $invoice_group) { ?>
                        <option value="<?php echo $invoice_group->invoice_group_id; ?>"
                            <?php if (get_setting('default_invoice_group') == $invoice_group->invoice_group_id) {
                                echo 'selected="selected"';
                            } ?>>
                            <?php echo $invoice_group->invoice_group_name; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="settings[default_invoice_terms]">
                    <?php echo trans('default_terms'); ?>
                </label>
                <textarea name="settings[default_invoice_terms]" class=" form-control"
                          rows="3"><?php echo get_setting('default_invoice_terms'); ?></textarea>
            </div>

        </div>
        <div class="col-xs-12 col-md-6">

            <div class="form-group">
                <label for="settings[invoice_default_payment_method]" class="control-label">
                    <?php echo trans('default_payment_method'); ?>
                </label>
                <select name="settings[invoice_default_payment_method]" class=" form-control simple-select">
                    <option value=""><?php echo trans('none'); ?></option>
                    <?php
                    $setting = get_setting('invoice_default_payment_method');
                    foreach ($payment_methods as $payment_method) {
                        echo '<option value="' . $payment_method->payment_method_id . '"';
                        if ($payment_method->payment_method_id == $setting) {
                            echo 'selected="selected"';
                        }
                        echo '>' . $payment_method->payment_method_name;
                        echo '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="settings[invoices_due_after]" class="control-label">
                    <?php echo trans('invoices_due_after'); ?>
                </label>
                <input type="text" name="settings[invoices_due_after]" class=" form-control"
                       value="<?php echo get_setting('invoices_due_after'); ?>">
            </div>

            <div class="form-group">
                <label for="settings[generate_invoice_number_for_draft]" class="control-label">
                    <?php echo trans('generate_invoice_number_for_draft'); ?>
                </label>
                <select name="settings[generate_invoice_number_for_draft]" class=" form-control simple-select">
                    <option value="0"
                        <?php if (!get_setting('generate_invoice_number_for_draft')) {
                            echo 'selected="selected"';
                        } ?>>
                        <?php echo trans('no'); ?>
                    </option>
                    <option value="1"
                        <?php if (get_setting('generate_invoice_number_for_draft')) {
                            echo 'selected="selected"';
                        } ?>>
                        <?php echo trans('yes'); ?>
                    </option>
                </select>
            </div>

        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12 col-md-6">

            <h4><?php echo trans('pdf_settings'); ?></h4>
            <br/>

            <div class="form-group">
                <label for="settings[mark_invoices_sent_pdf]" class="control-label">
                    <?php echo trans('mark_invoices_sent_pdf'); ?>
                </label>
                <select name="settings[mark_invoices_sent_pdf]" class=" form-control simple-select">
                    <option value="0"
                            <?php if (!get_setting('mark_invoices_sent_pdf')) { ?>selected="selected"<?php } ?>>
                        <?php echo trans('no'); ?>
                    </option>
                    <option value="1"
                            <?php if (get_setting('mark_invoices_sent_pdf')) { ?>selected="selected"<?php } ?>>
                        <?php echo trans('yes'); ?>
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="settings[invoice_pre_password]" class="control-label">
                    <?php echo trans('invoice_pre_password'); ?>
                </label>
                <input type="text" name="settings[invoice_pre_password]" class=" form-control"
                       value="<?php echo get_setting('invoice_pre_password'); ?>">
            </div>

            <div class="form-group">
                <label for="settings[include_zugferd]" class="control-label">
                    <?php echo trans('invoice_pdf_include_zugferd'); ?>
                </label>
                <select name="settings[include_zugferd]" class=" form-control simple-select">
                    <option value="0"
                            <?php if (!get_setting('include_zugferd')) { ?>selected="selected"<?php } ?>>
                        <?php echo trans('no'); ?>
                    </option>
                    <option value="1"
                            <?php if (get_setting('include_zugferd')) { ?>selected="selected"<?php } ?>>
                        <?php echo trans('yes'); ?>
                    </option>
                </select>
                <p class="help-block"><?php echo trans('invoice_pdf_include_zugferd_help'); ?></p>
            </div>

        </div>
        <div class="col-xs-12 col-md-6">

            <h4>&nbsp;</h4>
            <br/>

            <div class="form-group">
                <label class="control-label">
                    <?php echo trans('invoice_logo'); ?>
                </label>
                <?php if (get_setting('invoice_logo')) { ?>
                    <img
                            src="<?php echo base_url(); ?>uploads/<?php echo get_setting('invoice_logo'); ?>">
                    <br>
                    <?php echo anchor('settings/remove_logo/invoice', 'Remove Logo'); ?><br>
                <?php } ?>
                <input type="file" name="invoice_logo" size="40" class=" form-control"/>
            </div>

        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12 col-md-6">

            <h4><?php echo trans('invoice_template'); ?></h4>
            <br/>

            <div class="form-group">
                <label for="settings[pdf_invoice_template]" class="control-label">
                    <?php echo trans('default_pdf_template'); ?>
                </label>
                <select name="settings[pdf_invoice_template]" class=" form-control simple-select">
                    <option value=""><?php echo trans('none'); ?></option>
                    <?php foreach ($pdf_invoice_templates as $invoice_template) { ?>
                        <option value="<?php echo $invoice_template; ?>"
                                <?php if (get_setting('pdf_invoice_template') == $invoice_template) { ?>selected="selected"<?php } ?>>
                            <?php echo $invoice_template; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="settings[pdf_invoice_template_paid]" class="control-label">
                    <?php echo trans('pdf_template_paid'); ?>
                </label>
                <select name="settings[pdf_invoice_template_paid]" class=" form-control simple-select">
                    <option value=""><?php echo trans('none'); ?></option>
                    <?php foreach ($pdf_invoice_templates as $invoice_template) { ?>
                        <option value="<?php echo $invoice_template; ?>"
                                <?php if (get_setting('pdf_invoice_template_paid') == $invoice_template) {
                                ?>selected="selected"<?php } ?>>
                            <?php echo $invoice_template; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="settings[pdf_invoice_template_overdue]" class="control-label">
                    <?php echo trans('pdf_template_overdue'); ?>
                </label>
                <select name="settings[pdf_invoice_template_overdue]" class=" form-control simple-select">
                    <option value=""><?php echo trans('none'); ?></option>
                    <?php foreach ($pdf_invoice_templates as $invoice_template) { ?>
                        <option value="<?php echo $invoice_template; ?>"
                                <?php if (get_setting('pdf_invoice_template_overdue') == $invoice_template) {
                                ?>selected="selected"<?php } ?>>
                            <?php echo $invoice_template; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="settings[public_invoice_template]" class="control-label">
                    <?php echo trans('default_public_template'); ?>
                </label>
                <select name="settings[public_invoice_template]" class=" form-control simple-select">
                    <option value=""><?php echo trans('none'); ?></option>
                    <?php foreach ($public_invoice_templates as $invoice_template) { ?>
                        <option value="<?php echo $invoice_template; ?>"
                                <?php if (get_setting('public_invoice_template') == $invoice_template) { ?>selected="selected"<?php } ?>>
                            <?php echo $invoice_template; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

        </div>
        <div class="col-xs-12 col-md-6">

            <h4>&nbsp;</h4>
            <br/>

            <div class="form-group">
                <label for="settings[email_invoice_template]" class="control-label">
                    <?php echo trans('default_email_template'); ?>
                </label>
                <select name="settings[email_invoice_template]" class=" form-control simple-select">
                    <option value=""><?php echo trans('none'); ?></option>
                    <?php foreach ($email_templates_invoice as $email_template) { ?>
                        <option value="<?php echo $email_template->email_template_id; ?>"
                                <?php if (get_setting('email_invoice_template') == $email_template->email_template_id) { ?>selected="selected"<?php } ?>>
                            <?php echo $email_template->email_template_title; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="settings[email_invoice_template_paid]" class="control-label">
                    <?php echo trans('email_template_paid'); ?>
                </label>
                <select name="settings[email_invoice_template_paid]" class=" form-control simple-select">
                    <option value=""><?php echo trans('none'); ?></option>
                    <?php foreach ($email_templates_invoice as $email_template) { ?>
                        <option value="<?php echo $email_template->email_template_id; ?>"
                                <?php if (get_setting('email_invoice_template_paid') == $email_template->email_template_id) { ?>selected="selected"<?php } ?>>
                            <?php echo $email_template->email_template_title; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="settings[email_invoice_template_overdue]" class="control-label">
                    <?php echo trans('email_template_overdue'); ?>
                </label>
                <select name="settings[email_invoice_template_overdue]" class=" form-control simple-select">
                    <option value=""><?php echo trans('none'); ?></option>
                    <?php foreach ($email_templates_invoice as $email_template) { ?>
                        <option value="<?php echo $email_template->email_template_id; ?>"
                                <?php if (get_setting('email_invoice_template_overdue') == $email_template->email_template_id) { ?>selected="selected"<?php } ?>>
                            <?php echo $email_template->email_template_title; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="settings[public_invoice_template]" class="control-label">
                    <?php echo trans('pdf_invoice_footer'); ?>
                </label>
                <textarea name="settings[pdf_invoice_footer]"
                          class=" form-control no-margin"><?php echo get_setting('pdf_invoice_footer'); ?></textarea>

                <p class="help-block"><?php echo trans('pdf_invoice_footer_hint'); ?></p>
            </div>

        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12 col-md-6">

            <h4><?php echo trans('email_settings'); ?></h4>
            <br/>

            <div class="form-group">
                <label for="settings[automatic_email_on_recur]" class="control-label">
                    <?php echo trans('automatic_email_on_recur'); ?>
                </label>
                <select name="settings[automatic_email_on_recur]" class=" form-control simple-select">
                    <option value="0"
                        <?php if (!get_setting('automatic_email_on_recur')) {
                            echo 'selected="selected"';
                        } ?>>
                        <?php echo trans('no'); ?>
                    </option>
                    <option value="1"
                        <?php if (get_setting('automatic_email_on_recur')) {
                            echo 'selected="selected"';
                        } ?>>
                        <?php echo trans('yes'); ?>
                    </option>
                </select>
            </div>

            <hr/>
            <h4><?php echo trans('other_settings'); ?></h4>
            <br/>

            <div class="form-group">
                <label for="settings[read_only_toggle]" class="control-label">
                    <?php echo trans('set_to_read_only'); ?>
                </label>
                <select name="settings[read_only_toggle]" class=" form-control simple-select">
                    <option value="2"
                        <?php echo(get_setting('read_only_toggle') == 2 ? 'selected="selected"' : ''); ?>>
                        <?php echo trans('sent'); ?>
                    </option>
                    <option value="3"
                        <?php echo(get_setting('read_only_toggle') == 3 ? 'selected="selected"' : ''); ?>>
                        <?php echo trans('viewed'); ?>
                    </option>
                    <option value="4"
                        <?php echo(get_setting('read_only_toggle') == 4 ? 'selected="selected"' : ''); ?>>
                        <?php echo trans('paid'); ?>
                    </option>
                </select>
            </div>

        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-12 col-md-6">

            <h4><?php echo trans('sumex_settings'); ?></h4>
            <br/>
            <div class="form-group">
                <label class="control-label">
                    <?php echo trans('invoice_sumex'); ?>
                </label>
                <select name="settings[sumex]" class=" form-control simple-select">
                    <option value="0"
                            <?php if (!get_setting('sumex')) { ?>selected="selected"<?php } ?>>
                        <?php echo trans('no'); ?>
                    </option>
                    <option value="1"
                            <?php if (get_setting('sumex')) { ?>selected="selected"<?php } ?>>
                        <?php echo trans('yes'); ?>
                    </option>
                </select>
                <p class="help-block"><?php echo trans('invoice_sumex_help'); ?></p>
            </div>

            <div class="form-group">
                <label class="control-label">
                    <?php echo trans('invoice_sumex_sliptype'); ?>
                </label>
                <select name="settings[sumex_sliptype]" class=" form-control simple-select">
                    <?php
                    $slipTypes = array("esr9", "esrRed");
                    foreach ($slipTypes as $k => $v): ?>
                        <?php $selected = (get_setting('sumex_sliptype') == $k ? " selected" : ""); ?>
                        <option value="<?php echo $k; ?>"<?php echo $selected; ?>>
                            <?php echo trans('invoice_sumex_sliptype-' . $v); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p class="help-block"><?php echo trans('invoice_sumex_sliptype_help'); ?></p>
            </div>

        </div>
        <div class="col-xs-12 col-md-6">
            <h4>&nbsp;</h4>
            <br/>
            <div class="form-group">
                <label class="control-label">
                    <?php echo trans('invoice_sumex_role'); ?>
                </label>
                <select name="settings[sumex_role]" class=" form-control simple-select">
                    <?php
                    $roles = Sumex::ROLES;
                    foreach ($roles as $k => $v): ?>
                        <?php $selected = (get_setting('sumex_role') == $k ? " selected" : ""); ?>
                        <option value="<?php echo $k; ?>"<?php echo $selected; ?>>
                            <?php echo trans('invoice_sumex_role_' . $v); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">
                    <?php echo trans('invoice_sumex_place'); ?>
                </label>
                <select name="settings[sumex_place]" class=" form-control simple-select">
                    <?php
                    $places = Sumex::PLACES;
                    foreach ($places as $k => $v): ?>
                        <?php $selected = (get_setting('sumex_place') == $k ? " selected" : ""); ?>
                        <option value="<?php echo $k; ?>"<?php echo $selected; ?>>
                            <?php echo trans('invoice_sumex_place_' . $v); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">
                    <?php echo trans('invoice_sumex_canton'); ?>
                </label>
                <select name="settings[sumex_canton]" class=" form-control simple-select">
                    <?php
                    $cantons = Sumex::CANTONS;
                    foreach ($cantons as $k => $v): ?>
                        <?php $selected = (get_setting('sumex_canton') == $k ? " selected" : ""); ?>
                        <option value="<?php echo $k; ?>"<?php echo $selected; ?>>
                            <?php echo $v; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

</div>
