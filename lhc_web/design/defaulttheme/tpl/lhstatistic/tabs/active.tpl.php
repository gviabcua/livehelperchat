<form action="" method="get" autocomplete="off" ng-non-bindable id="form-statistic-action">

<input type="hidden" name="doSearch" value="on" />
<input type="hidden" id="id-report-type" name="reportType" value="live" />

<div class="row form-group">

	<div class="col-md-2">
	   <div class="form-group">
        	<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','User');?></label>
            <?php echo erLhcoreClassRenderHelper::renderMultiDropdown( array (
               'input_name'     => 'user_ids[]',
               'optional_field' => erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select user'),
               'selected_id'    => $input->user_ids,
               'css_class'      => 'form-control',
               'display_name'   => 'name_official',
               'ajax'           => 'users',
               'list_function_params' => array_merge(erLhcoreClassGroupUser::getConditionalUserFilter(),array('sort' => '`name` ASC','limit' => 50)),
               'list_function'  => 'erLhcoreClassModelUser::getUserList'
            )); ?>
        </div>
    </div>
    
	<div class="col-md-2">
	   <div class="form-group">
    	    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','User group');?></label>
            <?php echo erLhcoreClassRenderHelper::renderMultiDropdown( array (
               'input_name'     => 'group_ids[]',
               'optional_field' => erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select group'),
               'selected_id'    => $input->group_ids,
               'css_class'      => 'form-control',
               'display_name'   => 'name',
               'list_function_params' => array_merge(array('sort' => '`name` ASC'),erLhcoreClassGroupUser::getConditionalUserFilter(false, true)),
               'list_function'  => 'erLhcoreClassModelGroup::getList'
            )); ?>
        </div>   
    </div>   

	<div class="col-md-2">
	    <div class="form-group">
    	    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Department');?></label>
            <?php echo erLhcoreClassRenderHelper::renderMultiDropdown( array (
                    'input_name'     => 'department_ids[]',
    				'optional_field' => erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Choose department'),
                    'selected_id'    => $input->department_ids,
    	            'css_class'      => 'form-control',
                    'display_name'   => 'name',
                    'ajax'           => 'deps',
                    'list_function_params' => array_merge(['sort' => '`name` ASC', 'limit' => 20],erLhcoreClassUserDep::conditionalDepartmentFilter()),
                    'list_function'  => 'erLhcoreClassModelDepartament::getList'
            )); ?>
        </div>   
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Invitation');?></label>
            <?php echo erLhcoreClassRenderHelper::renderMultiDropdown( array (
                'input_name'     => 'invitation_ids[]',
                'optional_field' => erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Choose proactive invitation'),
                'selected_id'    => $input->invitation_ids,
                'css_class'      => 'form-control',
                'display_name'   => 'name',
                'list_function_params'  => ['sort' => '`name` ASC'],
                'list_function'  => 'erLhAbstractModelProactiveChatInvitation::getList'
            )); ?>
        </div>
    </div>

	<div class="col-md-2">
	   <div class="form-group">
    	   <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Department group');?></label>
           <?php echo erLhcoreClassRenderHelper::renderMultiDropdown( array (
               'input_name'     => 'department_group_ids[]',
               'optional_field' => erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Choose department group'),
               'selected_id'    => $input->department_group_ids,
               'css_class'      => 'form-control',
               'display_name'   => 'name',
               'list_function_params' => array_merge(['sort' => '`name` ASC'],erLhcoreClassUserDep::conditionalDepartmentGroupFilter()),
               'list_function'  => 'erLhcoreClassModelDepartamentGroup::getList'
           )); ?>
        </div>   
    </div>

    <div class="col-md-2">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Group field');?></label>
                    <select class="form-control form-control-sm" name="group_field">
                        <?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/filter/group_field.tpl.php'));?>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Group limit');?></label>
                <select class="form-control form-control-sm" name="group_limit">
                    <option value="3" <?php if ($input->group_limit == 3) : ?>selected<?php endif;?> >3</option>
                    <option value="5" <?php if ($input->group_limit == 5) : ?>selected<?php endif;?> >5</option>
                    <option value="10" <?php if ($input->group_limit == 10 || $input->group_limit == '') : ?>selected<?php endif;?> >10</option>
                    <option value="15" <?php if ($input->group_limit == 15) : ?>selected<?php endif;?>>15</option>
                    <option value="20" <?php if ($input->group_limit == 20) : ?>selected<?php endif;?>>20</option>
                    <option value="25" <?php if ($input->group_limit == 25) : ?>selected<?php endif;?>>25</option>
                    <option value="30" <?php if ($input->group_limit == 30) : ?>selected<?php endif;?>>30</option>
                    <option value="40" <?php if ($input->group_limit == 40) : ?>selected<?php endif;?>>40</option>
                    <option value="50" <?php if ($input->group_limit == 50) : ?>selected<?php endif;?>>50</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="col-md-2">
        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Group chart');?></label>
        <select class="form-control form-control-sm" name="group_chart_type">
            <option value="vertical_bar" <?php if ($input->group_chart_type == 'vertical_bar') : ?>selected<?php endif;?> >Vertical Bar Chart</option>
            <option value="stacked_bar" <?php if ($input->group_chart_type == 'stacked_bar') : ?>selected<?php endif;?> >Stacked Bar Chart</option>
        </select>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Bot');?></label>
            <?php echo erLhcoreClassRenderHelper::renderMultiDropdown( array (
                'input_name'     => 'bot_ids[]',
                'optional_field' => erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select bot'),
                'selected_id'    => $input->bot_ids,
                'css_class'      => 'form-control',
                'display_name'   => 'name',
                'list_function_params'  => ['sort' => '`name` ASC'],
                'list_function'  => 'erLhcoreClassModelGenericBotBot::getList'
            )); ?>
        </div>
    </div>
    <div class="col-md-2">
        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Visitor status on chat close');?></label>
        <div class="form-group">
            <select name="cls_us" class="form-control form-control-sm">
                <option value=""><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Any');?></option>
                <option value="1" <?php $input->cls_us === 1 ? print 'selected="selected"' : '' ?> ><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Online');?></option>
                <option value="2" <?php $input->cls_us === 2 ? print 'selected="selected"' : '' ?> ><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Offline');?></option>
                <option value="0" <?php $input->cls_us === 0 ? print 'selected="selected"' : '' ?> ><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Undetermined');?></option>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Has unread operator messages');?></label>
        <div class="form-group">
            <select name="has_unread_op_messages" class="form-control form-control-sm">
                <option value=""><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Any');?></option>
                <option value="1" <?php $input->has_unread_op_messages === 1 ? print 'selected="selected"' : '' ?> ><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Yes');?></option>
                <option value="0" <?php $input->has_unread_op_messages === 0 ? print 'selected="selected"' : '' ?> ><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','No');?></option>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Wait time');?></label>
            <div class="row">
                <div class="col-6">
                    <select class="form-control form-control-sm" name="wait_time_from">
                        <option><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','More than');?></option>
                        <option value="0" <?php $input->wait_time_from === 0 ? print 'selected="selected"' : ''?>>0 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="1" <?php $input->wait_time_from === 1 ? print 'selected="selected"' : ''?>>1 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="5" <?php $input->wait_time_from === 5 ? print 'selected="selected"' : ''?>>5 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="10" <?php $input->wait_time_from === 10 ? print 'selected="selected"' : ''?>>10 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="20" <?php $input->wait_time_from === 20 ? print 'selected="selected"' : ''?>>20 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="30" <?php $input->wait_time_from === 30 ? print 'selected="selected"' : ''?>>30 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="40" <?php $input->wait_time_from === 40 ? print 'selected="selected"' : ''?>>40 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="50" <?php $input->wait_time_from === 50 ? print 'selected="selected"' : ''?>>50 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="60" <?php $input->wait_time_from === 60 ? print 'selected="selected"' : ''?>>60 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="90" <?php $input->wait_time_from === 90 ? print 'selected="selected"' : ''?>>90 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>

                        <?php for ($i = 2; $i < 5; $i++) : ?>
                            <option value="<?php echo $i*60?>" <?php $input->wait_time_from === $i*60 ? print 'selected="selected"' : ''?>><?php echo  $i?> m.</option>
                        <?php endfor ?>

                        <?php for ($i = 2; $i < 13; $i++) : ?>
                            <option value="<?php echo $i*5*60?>" <?php $i*60*5 === $input->wait_time_from ? print 'selected="selected"' : ''?>><?php echo $i*5?> m.</option>
                        <?php endfor ?>
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-control form-control-sm" name="wait_time_till">
                        <option><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Less than');?></option>
                        <option value="0" <?php $input->wait_time_till === 0 ? print 'selected="selected"' : ''?>>0 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="1" <?php $input->wait_time_till === 1 ? print 'selected="selected"' : ''?>>1 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="5" <?php $input->wait_time_till === 5 ? print 'selected="selected"' : ''?>>5 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="10" <?php $input->wait_time_till === 10 ? print 'selected="selected"' : ''?>>10 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="20" <?php $input->wait_time_till === 20 ? print 'selected="selected"' : ''?>>20 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="30" <?php $input->wait_time_till === 30 ? print 'selected="selected"' : ''?>>30 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="40" <?php $input->wait_time_till === 40 ? print 'selected="selected"' : ''?>>40 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="50" <?php $input->wait_time_till === 50 ? print 'selected="selected"' : ''?>>50 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>
                        <option value="60" <?php $input->wait_time_till === 60 ? print 'selected="selected"' : ''?>>60 <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','seconds');?></option>

                        <?php for ($i = 2; $i < 5; $i++) : ?>
                            <option value="<?php echo $i*60?>" <?php $input->wait_time_till === $i*60 ? print 'selected="selected"' : ''?>><?php echo  $i?> m.</option>
                        <?php endfor ?>

                        <?php for ($i = 2; $i < 13; $i++) : ?>
                            <option value="<?php echo $i*60*5?>" <?php $i*60*5 === $input->wait_time_till ? print 'selected="selected"' : ''?> ><?php echo $i*5?> m.</option>
                        <?php endfor ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Country');?></label>
            <?php echo erLhcoreClassRenderHelper::renderMultiDropdown( array (
                'input_name'     => 'country_ids[]',
                'optional_field' => erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select country'),
                'selected_id'    => $input->country_ids,
                'css_class'      => 'form-control',
                'display_name'   => 'name',
                'list_function_params' => [],
                'list_function'  => 'lhCountries::getCountries'
            )); ?>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Region');?></label>
            <input type="text" list="regions" class="form-control form-control-sm" name="region" value="<?php echo htmlspecialchars($input->region)?>">
        </div>
        <datalist id="regions">
            <?php foreach (lhCountries::getStates() as $stateCode => $stateName) : ?>
            <option value="<?php echo htmlspecialchars($stateName)?>">
            <?php endforeach; ?>
        </datalist>
    </div>
</div>

<div class="row">
	<div class="col-md-2">
	  <div class="form-group">
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Date range from');?></label>
			<div class="row">
				<div class="col-md-12">
					<input type="text" class="form-control form-control-sm" name="timefrom" id="id_timefrom" placeholder="E.g <?php echo date('Y-m-d',time()-7*24*3600)?>" value="<?php echo htmlspecialchars($input->timefrom)?>" />
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-2">
	  <div class="form-group">
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Hour and minute from');?>

            <a href="#" onclick="lhc.revealModal({'url':WWW_DIR_JAVASCRIPT+'genericbot/help/timefilter'});" class="material-icons text-muted">help</a>

        </label>
		<div class="row">				
			<div class="col-md-4">
			    <select name="timefrom_hours" class="form-control form-control-sm">
			        <option value=""><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select hour');?></option>
			        <?php for ($i = 0; $i <= 23; $i++) : ?>
			            <option value="<?php echo $i?>" <?php if (isset($input->timefrom_hours) && $input->timefrom_hours === $i) : ?>selected="selected"<?php endif;?>><?php echo str_pad($i,2, '0', STR_PAD_LEFT);?> h.</option>
			        <?php endfor;?>
			    </select>
			</div>
			<div class="col-md-4">
			    <select name="timefrom_minutes" class="form-control form-control-sm">
			        <option value=""><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select minute');?></option>
			        <?php for ($i = 0; $i <= 59; $i++) : ?>
			            <option value="<?php echo $i?>" <?php if (isset($input->timefrom_minutes) && $input->timefrom_minutes === $i) : ?>selected="selected"<?php endif;?>><?php echo str_pad($i,2, '0', STR_PAD_LEFT);?> m.</option>
			        <?php endfor;?>
			    </select>
			</div>
            <div class="col-md-4">
			    <select name="timefrom_seconds" class="form-control form-control-sm">
			        <option value=""><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select seconds');?></option>
			        <?php for ($i = 0; $i <= 59; $i++) : ?>
			            <option value="<?php echo $i?>" <?php if (isset($input->timefrom_seconds) && $input->timefrom_seconds === $i) : ?>selected="selected"<?php endif;?>><?php echo str_pad($i,2, '0', STR_PAD_LEFT);?> s.</option>
			        <?php endfor;?>
			    </select>
			</div>
		</div>
		</div>
	</div>
	
	<div class="col-md-2">
	  <div class="form-group">
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Date range to');?></label>
			<div class="row">
				<div class="col-md-12">
					<input type="text" class="form-control form-control-sm" name="timeto" id="id_timeto" placeholder="E.g <?php echo date('Y-m-d')?>" value="<?php echo htmlspecialchars($input->timeto)?>" />
				</div>							
			</div>
		</div>
	</div>
	<div class="col-md-2">
	  <div class="form-group">
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Hour and minute to');?></label>
	    <div class="row">
			<div class="col-md-4">
			    <select name="timeto_hours" class="form-control form-control-sm">
			        <option value=""><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select hour');?></option>
			        <?php for ($i = 0; $i <= 23; $i++) : ?>
			            <option value="<?php echo $i?>" <?php if (isset($input->timeto_hours) && $input->timeto_hours === $i) : ?>selected="selected"<?php endif;?>><?php echo str_pad($i,2, '0', STR_PAD_LEFT);?> h.</option>
			        <?php endfor;?>
			    </select>
			</div>
			<div class="col-md-4">
			    <select name="timeto_minutes" class="form-control form-control-sm">
			        <option value=""><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select minute');?></option>
			        <?php for ($i = 0; $i <= 59; $i++) : ?>
			            <option value="<?php echo $i?>" <?php if (isset($input->timeto_minutes) && $input->timeto_minutes === $i) : ?>selected="selected"<?php endif;?>><?php echo str_pad($i,2, '0', STR_PAD_LEFT);?> m.</option>
			        <?php endfor;?>
			    </select>
			</div>
            <div class="col-md-4">
			    <select name="timeto_seconds" class="form-control form-control-sm">
			        <option value=""><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Select seconds');?></option>
			        <?php for ($i = 0; $i <= 59; $i++) : ?>
			            <option value="<?php echo $i?>" <?php if (isset($input->timeto_seconds) && $input->timeto_seconds === $i) : ?>selected="selected"<?php endif;?>><?php echo str_pad($i,2, '0', STR_PAD_LEFT);?> s.</option>
			        <?php endfor;?>
			    </select>
			</div>
	    </div>
	  </div>
	</div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-3"><label><input type="checkbox" name="exclude_offline" value="<?php echo erLhcoreClassModelChat::STATUS_SUB_OFFLINE_REQUEST ?>" <?php $input->exclude_offline == erLhcoreClassModelChat::STATUS_SUB_OFFLINE_REQUEST ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Exclude offline requests from charts')?></label>&nbsp;&nbsp;</div>
            <div class="col-3"><label><input type="checkbox" name="online_offline" value="<?php echo erLhcoreClassModelChat::STATUS_SUB_OFFLINE_REQUEST ?>" <?php $input->online_offline == erLhcoreClassModelChat::STATUS_SUB_OFFLINE_REQUEST ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Show only offline requests')?></label></div>
            <div class="col-3"><label><input type="checkbox" name="no_operator" value="1" <?php $input->no_operator == true ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Chats without an operator')?></label></div>
            <div class="col-3"><label><input type="checkbox" name="has_operator" value="1" <?php $input->has_operator == true ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Chats with an operator')?></label></div>
            <div class="col-3"><label><input type="checkbox" name="with_bot" value="1" <?php $input->with_bot == true ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Chats which had a bot')?></label></div>
            <div class="col-3"><label><input type="checkbox" name="without_bot" value="1" <?php $input->without_bot == true ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Chats which did not have a bot')?></label></div>
            <div class="col-3"><label><input type="checkbox" name="has_unread_messages" value="1" <?php $input->has_unread_messages == true ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Has unread messages from visitor')?></label></div>
            <?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/filter/abandoned_chat.tpl.php'));?>
            <?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/filter/dropped_chat.tpl.php'));?>
            <div class="col-3"><label><input type="checkbox" name="proactive_chat" value="<?php echo erLhcoreClassModelChat::CHAT_INITIATOR_PROACTIVE ?>" <?php $input->proactive_chat == true ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Proactive chat')?></label></div>
            <div class="col-3"><label><input type="checkbox" name="not_invitation" value="0" <?php $input->not_invitation === 0 ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Not automatic invitation')?></label></div>
            <div class="col-3"><label><input type="checkbox" name="transfer_happened" value="1" <?php $input->transfer_happened == true ? print 'checked="checked"' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Transfer happened')?></label></div>
        </div>
    </div>

    <?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/filter/statistic_active_filter_multiinclude.tpl.php'));?>

    <div class="col-md-12">
        <h6><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','What charts to display')?></h6>
        <div class="row">
            <?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/statistic_active_chart_type_multiinclude.tpl.php'));?>

            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="active" <?php if (in_array('active',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Chat numbers by status')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="unanswered" <?php if (in_array('unanswered',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Unanswered chat numbers')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="msgtype" <?php if (in_array('msgtype',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Message types')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="proactivevsdefault" <?php if (in_array('proactivevsdefault',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Proactive chats number vs visitors initiated')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="subject" <?php if (in_array('subject',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of chats by subject')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="canned" <?php if (in_array('canned',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Canned messages statistic')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="thumbs" <?php if (in_array('thumbs',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of Thumbs Up/Down')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="country" <?php if (in_array('country',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of chats by country')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="usermsg" <?php if (in_array('usermsg',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of messages by user')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="avgduration" <?php if (in_array('avgduration',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of chats per hour, average chat duration')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="waitmonth" <?php if (in_array('waitmonth',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Average wait time in seconds (maximum of 10 minutes)')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="chatbyuser" <?php if (in_array('chatbyuser',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of chats by user')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="chatbyuserparticipant" <?php if (in_array('chatbyuserparticipant',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of chats by user (participant)')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="msgdelop" <?php if (in_array('msgdelop',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Message delivery statistic (operator)')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="msgdelbot" <?php if (in_array('msgdelbot',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Message delivery statistic (bot)')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="chatbytransferuser" <?php if (in_array('chatbytransferuser',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of chats by transfer operator')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="chatbydep" <?php if (in_array('chatbydep',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of chats by department')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="waitbyoperator" <?php if (in_array('waitbyoperator',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','AVG visitor wait time by operator')?></label></div>
            <div class="col-4"><label><input type="checkbox" name="chart_type[]" value="avgdurationop" <?php if (in_array('avgdurationop',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Average chat duration by user in seconds')?></label></div>
            <div class="col-4"><label title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Usefull if you prefill usernames always')?>"><input type="checkbox" name="chart_type[]" value="nickgroupingdate" <?php if (in_array('nickgroupingdate',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Unique group field records grouped by date')?></label></div>
            <div class="col-4"><label title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Usefull if you prefill usernames always')?>"><input type="checkbox" name="chart_type[]" value="nickgroupingdatenick" <?php if (in_array('nickgroupingdatenick',is_array($input->chart_type) ? $input->chart_type : array())) : ?>checked="checked"<?php endif;?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Chats number grouped by date and group field')?></label></div>
        </div>

    </div>
	<?php 
	/**
	 * Not implemented at the moment 
	<div class="col-md-3">	   
	    <br>
    	<label><input type="checkbox" value="on" name="comparetopast" <?php $input->comparetopast == 1 ? print 'checked="checked"' : ''?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Compare to past');?></label>    	
    </div>*/
	?>
</div>

    <div class="btn-group me-2" role="group" aria-label="...">
        <button type="submit" name="doSearch" onclick="$('#id-report-type').val('live')" class="btn btn-sm btn-primary" >
            <span class="material-icons">search</span><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Search');?>
        </button>
        <a class="btn btn-outline-secondary btn-sm" href="<?php echo erLhcoreClassDesign::baseurl('statistic/statistic')?>/(tab)/active"><span class="material-icons">refresh</span><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/lists/search_panel','Reset');?></a>
        <?php $tabStatistic = 'active'; ?>
        <?php include(erLhcoreClassDesign::designtpl('lhstatistic/report_button.tpl.php'));?>
    </div>
    
	<script>
	$(function() {
        $('.btn-block-department').makeDropdown();
		$('#id_timefrom,#id_timeto').fdatepicker({
			format: 'yyyy-mm-dd'
		});
	});
	</script>							
</form>

<?php if (isset($_GET['doSearch'])) : ?>

<script type="text/javascript">
	function redrawAllCharts(){
			drawChart();
			drawChartCountry();
			drawChartUser();
			drawChartPerMonth();
			drawChartWorkload();
			drawChartWorkloadHourly();
			drawChartUserMessages();
			drawChartUserAVGWaitTime();
			drawChartUserAverage();
            drawChartDepartmnent();
            drawChartByNickMonth();
	};

    // Define a plugin to provide data labels
    Chart.plugins.register({
        afterDatasetsDraw: function(chart, easing) {
            // To only draw at the end of animation, check for easing === 1
            var ctx = chart.ctx;

            chart.data.datasets.forEach(function (dataset, i) {
                var meta = chart.getDatasetMeta(i);
                if (!meta.hidden) {
                    meta.data.forEach(function(element, index) {

                        var maxValue = 0;

                        if (chart.options.perc) {
                            meta.data.forEach(function(element, index) {
                                maxValue += dataset.data[index];
                            })
                        }

                        // Draw the text in black, with the specified font
                        var dataString = dataset.data[index].toString();
                        if (dataString !== '0')
                        {
                            ctx.fillStyle = chart.data.datasets.length > 1 ? 'rgb(255, 255, 255)' : 'rgb(0, 0, 0)';
                            var fontSize = 11;
                            var fontStyle = 'normal';
                            var fontFamily = 'Arial';
                            ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
                            // Just naively convert to string for now

                            // Make sure alignment settings are correct
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'middle';

                            var padding = 0;

                            if (chart.data.datasets.length > 1) {
                                // Specify the shadow colour.
                                ctx.shadowColor = "black";
                                ctx.shadowOffsetX = 1;
                                ctx.shadowOffsetY = 1;
                                ctx.shadowBlur = 1;
                                if (typeof element.height == 'function') {
                                    padding = -element.height()/2-5;
                                }
                            }

                            var position = element.tooltipPosition();

                            if (chart.options.perc) {
                                ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                                ctx.fillText((parseInt(dataString)*100 / maxValue).toFixed(0)+"%", position.x, position.y - (fontSize / 2) - padding - 15);
                            } else {
                                ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                            }

                            ctx.shadowColor = "";
                            ctx.shadowOffsetX = 0;
                            ctx.shadowOffsetY = 0;
                            ctx.shadowBlur = 0;
                        }
                    });
                }
            });
        }
    });

    Chart.Legend.prototype.afterFit = function() {
        this.height = this.height + 10;
    };

	function drawChart() {
	  <?php if (!empty($userStats['thumbsup'])) : ?>
        var barChartData = {
            labels: [<?php foreach ($userStats['thumbsup'] as $key => $data) : $nameUser = erLhcoreClassModelUser::fetch($data['user_id'],true); echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars((is_object($nameUser) ? $nameUser->name_official : '-'),ENT_QUOTES).'\''; endforeach;?>],
            datasets: [{
                label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Thumbs up')?>',
                backgroundColor: '#109618',
                borderColor: '#109618',
                borderWidth: 1,
                data: [<?php foreach ($userStats['thumbsup'] as $key => $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; endforeach;?>]
            }]
        };

        var ctx = document.getElementById("chart_div_upvotes_canvas").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    display : false,
                    position: 'top',
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: '<?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_thumbs_up.tpl.php'));?>'
                }
            }
        });
	  <?php endif;?>

	  <?php if (!empty($userStats['thumbdown'])) : ?>
        var barChartData = {
            labels: [<?php foreach ($userStats['thumbdown'] as $key => $data) : echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars($data['user_id'] > 0 ? ((($userStat = erLhcoreClassModelUser::fetch($data['user_id'],true)) && $userStat instanceof erLhcoreClassModelUser) ? $userStat->name_official : $data['user_id']) : 'Unknown',ENT_QUOTES).'\''; endforeach;?>],
            datasets: [{
                label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Thumbs down')?>',
                backgroundColor: '#f497a9',
                borderColor: '#f497a9',
                borderWidth: 1,
                data: [<?php foreach ($userStats['thumbdown'] as $key => $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; endforeach;?>]
            }]
        };
        var ctx = document.getElementById("chart_div_downvotes_canvas").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    display : false,
                    position: 'top',
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: '<?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_thumbs_down.tpl.php'));?>'
                }
            }
        });
	  <?php endif;?>

	  <?php if (!empty($subjectsStatistic)) : ?>
	    var barChartData = {
            labels: [<?php foreach ($subjectsStatistic as $key => $data) : echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars((string)erLhAbstractModelSubject::fetch($data['subject_id'],true),ENT_QUOTES).'\''; endforeach;?>],
            datasets: [{
                label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of chats')?>',
                backgroundColor: '#4bc044',
                borderColor: '#4bc044',
                borderWidth: 1,
                data: [<?php foreach ($subjectsStatistic as $key => $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; endforeach;?>]
            }]
        };
        drawBasicChart(barChartData,'chart_div_subjects_statistic');
      <?php endif; ?>

        <?php if (!empty($cannedStatistic)) : ?>
	    var barChartData = {
            labels: [<?php foreach ($cannedStatistic as $key => $data) : echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars((string)erLhcoreClassModelCannedMsg::fetch($data['canned_id'],true),ENT_QUOTES).'\''; endforeach;?>],
            datasets: [{
                label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Number of chats')?>',
                backgroundColor: '#4bc044',
                borderColor: '#4bc044',
                borderWidth: 1,
                data: [<?php foreach ($cannedStatistic as $key => $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; endforeach;?>]
            }]
        };
        drawBasicChart(barChartData,'chart_div_canned_statistic');
      <?php endif; ?>

	};

	function drawChartCountry() {
		<?php if (!empty($countryStats)) : ?>
        var barChartData = {
            labels: [<?php $key = 0; foreach ($countryStats as $data) : echo ($key > 0 ? ',' : ''),'\''.$data['country_name'].'\'';$key++; endforeach;?>],
            datasets: [{
                backgroundColor: '#36c',
                borderColor: '#36c',
                borderWidth: 1,
                data: [<?php $key = 0; foreach ($countryStats as $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; $key++; endforeach;?>]
            }]
        };
        drawBasicChart(barChartData,'chart_div_country');
		<?php endif;?>
	};

	function drawChartUser() {
		<?php if (!empty($userChatsStats)) : ?>
                var barChartData = {
                    labels: [<?php $key = 0; foreach ($userChatsStats as $data) : $obUser = erLhcoreClassModelUser::fetch($data['user_id'],true); echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars((is_object($obUser) ? $obUser->name_official : $data['user_id']),ENT_QUOTES).'\'';$key++; endforeach;?>],
                    datasets: [{
                        backgroundColor: '#36c',
                        borderColor: '#36c',
                        borderWidth: 1,
                        data: [<?php $key = 0; foreach ($userChatsStats as $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; $key++; endforeach;?>]
                    }]
                };
                drawBasicChart(barChartData,'chart_div_user');
		  <?php endif;?>

        <?php if (!empty($userChatsParticipantStats)) : ?>
                var barChartData = {
                    labels: [<?php $key = 0; foreach ($userChatsParticipantStats as $data) : $obUser = erLhcoreClassModelUser::fetch($data['user_id'],true); echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars((is_object($obUser) ? $obUser->name_official : ($data['user_id'] == -2 ? 'BOT' : $data['user_id'])),ENT_QUOTES).'\'';$key++; endforeach;?>],
                    datasets: [{
                        backgroundColor: '#36c',
                        borderColor: '#36c',
                        borderWidth: 1,
                        data: [<?php $key = 0; foreach ($userChatsParticipantStats as $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; $key++; endforeach;?>]
                    }]
                };
                drawBasicChart(barChartData,'chart_div_user_participant');
		  <?php endif;?>

        <?php if (!empty($userTransferChatsStats)) : ?>
                var barChartData = {
                    labels: [<?php $key = 0; foreach ($userTransferChatsStats as $data) : $obUser = erLhcoreClassModelUser::fetch($data['user_id'],true); echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars((is_object($obUser) ? $obUser->name_official : $data['user_id']),ENT_QUOTES).'\'';$key++; endforeach;?>],
                    datasets: [{
                        backgroundColor: '#36c',
                        borderColor: '#36c',
                        borderWidth: 1,
                        data: [<?php $key = 0; foreach ($userTransferChatsStats as $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; $key++; endforeach;?>]
                    }]
                };
                drawBasicChart(barChartData,'chart_div_transfer_user');
		  <?php endif;?>
	};

	function drawChartDepartmnent() {
		<?php if (!empty($depChatsStats)) : ?>
            var barChartData = {
                        labels: [<?php $key = 0; foreach ($depChatsStats as $data) : $obUser = erLhcoreClassModelDepartament::fetch($data['dep_id'],true); echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars((is_object($obUser) ? $obUser->name : $data['dep_id']),ENT_QUOTES).'\'';$key++; endforeach;?>],
                        datasets: [{
                            backgroundColor: '#36c',
                            borderColor: '#36c',
                            borderWidth: 1,
                            data: [<?php $key = 0; foreach ($depChatsStats as $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; $key++; endforeach;?>]
                        }]
                    };
            drawBasicChart(barChartData,'chart_div_dep');
		  <?php endif;?>
	};

	function drawChartUserAverage() {
		<?php if (!empty($userChatsAverageStats)) : ?>
        var barChartData = {
            labels: [<?php $key = 0; foreach ($userChatsAverageStats as $data) :  $obUser = erLhcoreClassModelUser::fetch($data['user_id'],true); echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars((is_object($obUser) ? $obUser->name_official : $data['user_id']),ENT_QUOTES).'\'';$key++; endforeach;?>],
            datasets: [{
                backgroundColor: '#36c',
                borderColor: '#36c',
                borderWidth: 1,
                data: [<?php $key = 0; foreach ($userChatsAverageStats as $data) : echo ($key > 0 ? ',' : ''),round($data['avg_chat_duration']); $key++; endforeach;?>]
            }]
        };

        drawBasicChart(barChartData,'chart_div_avg_user');
        <?php endif;?>
	};

	function drawChartUserAVGWaitTime() {
		<?php if (!empty($userWaitTimeByOperator)) : ?>


		var barChartData = {
            labels: [<?php $key = 0; foreach ($userWaitTimeByOperator as $data) : $obUser = erLhcoreClassModelUser::fetch($data['user_id'],true); echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars((is_object($obUser) ? $obUser->name_official : $data['user_id']),ENT_QUOTES).'\'';$key++; endforeach;?>],
            datasets: [{
                backgroundColor: '#36c',
                borderColor: '#36c',
                borderWidth: 1,
                data: [<?php $key = 0; foreach ($userWaitTimeByOperator as $data) : echo ($key > 0 ? ',' : ''),round($data['avg_wait_time']); $key++; endforeach;?>]
            }]
        };

		drawBasicChart(barChartData,'chart_div_user_wait_time');
		<?php endif;?>
	};

	function drawChartUserMessages() {
		<?php if (!empty($numberOfMsgByUser)) : ?>

        var barChartData = {
            labels: [<?php $key = 0; foreach ($numberOfMsgByUser as $data) :
            $operator = '';
		    if ($data['user_id'] == 0) {
		    	$operator = 'Visitor';
		    } elseif ($data['user_id'] == -1) {
		    	$operator = 'System assistant';
		    } elseif ($data['user_id'] == -2) {
		    	$operator = 'Virtual assistant';
		    } else {
		        $operatorObj = erLhcoreClassModelUser::fetch($data['user_id'],true);
		        if (is_object($operatorObj) ) {
		    	   $operator = $operatorObj->name_official;
		        } else {
		           $operator = '['.$data['user_id'].']';
		        }
		    }; echo ($key > 0 ? ',' : ''),'\''.htmlspecialchars($operator,ENT_QUOTES).'\'';$key++; endforeach;?>],
            datasets: [{
                backgroundColor: '#36c',
                borderColor: '#36c',
                borderWidth: 1,
                data: [<?php $key = 0; foreach ($numberOfMsgByUser as $data) : echo ($key > 0 ? ',' : ''),$data['number_of_chats']; $key++; endforeach;?>]
            }]
        };

        drawBasicChart(barChartData,'chart_div_user_msg');
		<?php endif;?>
	};

	function drawChartByNickMonth() {
	  <?php if (isset($nickgroupingdate) && !empty($nickgroupingdate)) : ?>
	    <?php if (in_array('nickgroupingdate',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
	        var barChartData = {
            labels: [<?php $key = 0; foreach ($nickgroupingdate as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),'\''.date('Y.m',$monthUnix).'\'';$key++; endforeach;?>],
            datasets: [
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Unique records');?>',
                    backgroundColor: '#3366cc',
                    borderColor: '#3366cc',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($nickgroupingdate as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['unique']; $key++; endforeach;?>]
                }
            ]
        };

        var ctx = document.getElementById("chart_nickgroupingdate").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                perc: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: false
                }
            }
        });
	    <?php endif; ?>
	  <?php endif; ?>

      <?php if (isset($nickgroupingdatenick) && !empty($nickgroupingdatenick)) : ?>

	        <?php if (in_array('nickgroupingdatenick',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
	        var barChartData = {
            labels: [<?php $key = 0; foreach ($nickgroupingdatenick['labels'] as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),'\''.date('Y.m',$monthUnix).'\'';$key++; endforeach;?>],
            datasets: [
                <?php foreach ($nickgroupingdatenick['data'] as $data) : ?>
                    {
                        data: [<?php echo implode(',',$data['data'])?>],
                        backgroundColor: [<?php echo implode(',',$data['color'])?>],
                        labels: [<?php echo implode(',',$data['nick'])?>]
                    },
                <?php endforeach; ?>
            ]
        };

        var ctx = document.getElementById("chart_nickgroupingdatenick").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var index = tooltipItem.index;
                            if (dataset.data[index] != 0) {
                                return  dataset.data[index] + ': ' + (dataset.labels[index] == '' ? 'Unknown' : dataset.labels[index]);
                            }
                        }
                    }
                },
                legend: {
                    display: false,
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                scales: {
                    xAxes: [{
                        <?php ($input->group_chart_type == 'stacked_bar') ? print 'stacked: true,' : '' ?>
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        <?php ($input->group_chart_type == 'stacked_bar') ? print 'stacked: true,' : '' ?>
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: false
                }
            }
        });
	    <?php endif; ?>
	  <?php endif; ?>
	}

	function drawChartPerMonth() {

	    <?php if (isset($numberOfChatsPerMonth) && !empty($numberOfChatsPerMonth)) : ?>

        <?php if (in_array('active',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
		  // Chats number by statuses
		var barChartData = {
            labels: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),'\''.date('Y.m',$monthUnix).'\'';$key++; endforeach;?>],
            datasets: [
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Active');?>',
                    backgroundColor: '#dc3912',
                    borderColor: '#dc3912',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['active']; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Operators');?>',
                    backgroundColor: '#ff9900',
                    borderColor: '#ff9900',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['operators']; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Pending');?>',
                    backgroundColor: '#109618',
                    borderColor: '#109618',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['pending']; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Bot');?>',
                    backgroundColor: '#109684',
                    borderColor: '#109684',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['bot']; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Closed');?>',
                    backgroundColor: '#3366cc',
                    borderColor: '#3366cc',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['closed']; $key++; endforeach;?>]
                },
            ]
        };

        var ctx = document.getElementById("chart_div_per_month").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: false
                }
            }
        });
        <?php endif; ?>

        <?php if (in_array('unanswered',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
		  // Chats number by unanswered chats
            var barChartData = {
                labels: [<?php $dataRange = array(); $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : $dataRange[] = '/(timefrom)/' . date('Y-m-d',$monthUnix) . '/(timeto)/' . date('Y-m-d',mktime(0,0,0,date('m',$monthUnix)+1,1,date('Y',$monthUnix))); echo ($key > 0 ? ',' : ''),'\''.date('Y.m',$monthUnix).'\'';$key++; endforeach;?>],
                datasets: [{
                    backgroundColor: '#36c',
                    borderColor: '#36c',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['unanswered']; $key++; endforeach;?>]
                }]
            };

            var ctx = document.getElementById("chart_div_per_month_unanswered").getContext("2d");
            var myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    layout: {
                        padding: {
                             top: 20
                        }
                    },
                    perc: true,
                    legend: {
                        display : false,
                        position: 'top',
                    },
                    onClick : function(evt) {
                        var activeElement = myBar.getElementAtEvent(evt);
                        var filter = <?php echo json_encode($dataRange)?>;
                        document.location = "<?php echo erLhcoreClassDesign::baseurl('chat/list')?><?php echo erLhcoreClassSearchHandler::getURLAppendFromInput($input,false,array('timefrom','timeto','timefrom_hours','timefrom_minutes','timeto_hours','timeto_minutes'))?>/(una)/1/" + filter[activeElement[0]._index];
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                stepSize: 1,
                                min: 0,
                                autoSkip: false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: false
                    }
                }
            });
            <?php endif; ?>

        <?php if (in_array('proactivevsdefault',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
        var barChartData = {
            labels: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),'\''.date('Y.m',$monthUnix).'\'';$key++; endforeach;?>],
            datasets: [
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Proactive invitation');?>',
                    backgroundColor: '#dc3912',
                    borderColor: '#dc3912',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['chatinitproact']; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Manual invitation');?>',
                    backgroundColor: '#cca333',
                    borderColor: '#cca333',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['chatinitmanualinv']; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Visitors initiated');?>',
                    backgroundColor: '#36c',
                    borderColor: '#36c',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['chatinitdefault']; $key++; endforeach;?>]
                }
            ]
        };

        var ctx = document.getElementById("chart_type_div_per_month").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                /*legend: {
                    display : false,
                    position: 'top',
                },*/
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }
                    ],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: false
                }
            }
        });
        <?php endif;?>

        <?php if (in_array('msgtype',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
        var barChartData = {
            labels: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),'\''.date('Y.m',$monthUnix).'\'';$key++; endforeach;?>],
            datasets: [
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Visitors');?>',
                    backgroundColor: '#36c',
                    borderColor: '#36c',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['msg_user']; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Operators');?>',
                    backgroundColor: '#dc3912',
                    borderColor: '#dc3912',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['msg_operator']; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','System');?>',
                    backgroundColor: '#ff9900',
                    borderColor: '#ff9900',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['msg_system']; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Bot and Auto responder');?>',
                    backgroundColor: 'green',
                    borderColor: 'green',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data['msg_bot']; $key++; endforeach;?>]
                }
            ]
        };

        var ctx = document.getElementById("chart_type_div_msg_type").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: false
                }
            }
        });
        <?php endif; ?>
        <?php if (in_array('msgdelop',is_array($input->chart_type) ? $input->chart_type : array())) : ?>

        var barChartData = {
            labels: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),'\''.date('Y.m',$monthUnix).'\'';$key++; endforeach;?>],
            datasets: [
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Pending');?>',
                    backgroundColor: '#a2a2a2',
                    borderColor: '#a2a2a2',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelop'][0]) ? $data['msgdelop'][0] : 0) ; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Sent');?>',
                    backgroundColor: '#084f8b',
                    borderColor: '#084f8b',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelop'][1]) ? $data['msgdelop'][1] : 0); $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Delivered');?>',
                    backgroundColor: '#ff9900',
                    borderColor: '#ff9900',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelop'][2]) ? $data['msgdelop'][2] : 0); $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Read');?>',
                    backgroundColor: '#28ad0c',
                    borderColor: '#28ad0c',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelop'][3]) ? $data['msgdelop'][3] : 0); $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Rejected');?>',
                    backgroundColor: '#ed1148',
                    borderColor: '#ed1148',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelop'][4]) ? $data['msgdelop'][4] : 0); $key++; endforeach;?>]
                }
            ]
        };

        var ctx = document.getElementById("chart_type_div_msg_del_op").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: false
                }
            }
        });
        <?php endif; ?>
        <?php if (in_array('msgdelbot',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
        var barChartData = {
            labels: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),'\''.date('Y.m',$monthUnix).'\'';$key++; endforeach;?>],
            datasets: [
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Pending');?>',
                    backgroundColor: '#a2a2a2',
                    borderColor: '#a2a2a2',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelbot'][0]) ? $data['msgdelbot'][0] : 0) ; $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Sent');?>',
                    backgroundColor: '#084f8b',
                    borderColor: '#084f8b',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelbot'][1]) ? $data['msgdelbot'][1] : 0); $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Delivered');?>',
                    backgroundColor: '#ff9900',
                    borderColor: '#ff9900',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelbot'][2]) ? $data['msgdelbot'][2] : 0); $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Read');?>',
                    backgroundColor: '#28ad0c',
                    borderColor: '#28ad0c',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelbot'][3]) ? $data['msgdelbot'][3] : 0); $key++; endforeach;?>]
                },
                {
                    label: '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Rejected');?>',
                    backgroundColor: '#ed1148',
                    borderColor: '#ed1148',
                    borderWidth: 1,
                    data: [<?php $key = 0; foreach ($numberOfChatsPerMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),(isset($data['msgdelbot'][4]) ? $data['msgdelbot'][4] : 0); $key++; endforeach;?>]
                }
            ]
        };

        var ctx = document.getElementById("chart_type_div_msg_del_bot").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: false
                }
            }
        });
        <?php endif; ?>

        <?php endif; ?>

		  // AVG Wait time
		<?php if (isset($numberOfChatsPerWaitTimeMonth) && !empty($numberOfChatsPerWaitTimeMonth)) : ?>
        var barChartData = {
            labels: [<?php $key = 0; foreach ($numberOfChatsPerWaitTimeMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),'\''.date('Y.m',$monthUnix).'\'';$key++; endforeach;?>],
            datasets: [{
                backgroundColor: '#36c',
                borderColor: '#36c',
                borderWidth: 1,
                data: [<?php $key = 0; foreach ($numberOfChatsPerWaitTimeMonth as $monthUnix => $data) : echo ($key > 0 ? ',' : ''),$data; $key++; endforeach;?>]
            }]
        };
        drawBasicChart(barChartData,'chart_div_per_month_wait_time');
        <?php endif; ?>
	}

	function drawChartWorkload() {
	    <?php if (isset($numberOfChatsPerHour['total'])) : ?>
        var barChartData = {
            labels: [<?php $key = 0; foreach ($numberOfChatsPerHour['total'] as $hour => $chatsNumber) : echo ($key > 0 ? ',' : ''),'\''.$hour.'\'';$key++; endforeach;?>],
            datasets: [{
                backgroundColor: '#36c',
                borderColor: '#36c',
                borderWidth: 1,
                data: [<?php $key = 0; foreach ($numberOfChatsPerHour['total'] as $hour => $chatsNumber) : echo ($key > 0 ? ',' : ''),$chatsNumber; $key++; endforeach;?>]
            }]
        };
        drawBasicChart(barChartData,'chart_div_per_hour');
        <?php endif; ?>
	}

	function drawBasicChart(data, id) {
        var ctx = document.getElementById(id).getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                legend: {
                    display : false,
                    position: 'top',
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                perc: true,
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: false
                }
            }
        });
	}

	function drawChartWorkloadHourly() {

	    <?php if (isset($numberOfChatsPerHour['byday'])) : ?>
        var barChartData = {
            labels: [<?php $key = 0; foreach ($numberOfChatsPerHour['byday'] as $hour => $chatsNumber) : echo ($key > 0 ? ',' : ''),'\''.$hour.'\'';$key++; endforeach;?>],
            datasets: [{
                type: 'line',
                backgroundColor: '#36c',
                borderColor: '#36c',
                borderWidth: 2,
                fill: false,
                data: [<?php $key = 0; foreach ($numberOfChatsPerHour['byday'] as $hour => $chatsNumber) : echo ($key > 0 ? ',' : ''),'\'' . round($chatsNumber,2) . '\'';$key++; endforeach;?>]
            }<?php if (isset($numberOfChatsPerHour['bydaymax'])) : ?>,
            {
                type: 'bar',
                backgroundColor: '#89e089',
                data: [<?php $key = 0; $timesEvent = array(); foreach ($numberOfChatsPerHour['bydaymax'] as $hour => $chatsData) : $timesEvent[] = date('Y-m-d',$chatsData['time']);echo ($key > 0 ? ',' : ''),'\'' . $chatsData['total_records'] . '\'';$key++; endforeach;?>],
                borderColor: 'white',
                borderWidth: 2
            }<?php endif; ?>]
        };

        var ctx = document.getElementById("chart_div_per_hour_by_hour").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    display : false,
                    position: 'top',
                },
                layout: {
                    padding: {
                         top: 20
                    }
                },
                tooltips: {
                    callbacks: {
                        label : function(param) {
                            var times = <?php echo isset($timesEvent) ? json_encode($timesEvent) : '[]';?>;
                            if (param.datasetIndex == 0) {
                                return '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Average chats');?>: ' + param.yLabel;
                            } else {
                                return '<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Max chats');?>: '+param.yLabel+', ' + times[param.index];
                            }
                        }
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 11,
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: false
                }
            }
        });
        <?php endif; ?>
	}

	$( document ).ready(function() {
		redrawAllCharts();
	});

</script>

<?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/statistic_active_content_multiinclude.tpl.php'));?>


<?php if (in_array('active',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
<hr>
<h5><a class="csv-export" data-scope="numberOfChatsPerMonth" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a> <?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/chats_number_by_statuses.tpl.php'));?></h5>
<canvas id="chart_div_per_month"></canvas>
<?php endif;?>

<?php if (in_array('nickgroupingdate',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
<hr>
<h5><a class="csv-export" data-scope="nickgroupingdate" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/nickgroupingdate.tpl.php'));?></h5>
<canvas id="chart_nickgroupingdate"></canvas>
<?php endif; ?>

<?php if (in_array('nickgroupingdatenick',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
<hr>
<h5><a class="csv-export" data-scope="nickgroupingdatenick" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/nickgroupingdatenick.tpl.php'));?></h5>
<canvas id="chart_nickgroupingdatenick"></canvas>
<?php endif; ?>

<?php if (in_array('proactivevsdefault',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
<hr>
<h5><a class="csv-export" data-scope="proactivevsdefault" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/proactive_chats_number_vs_visitors_initiated.tpl.php'));?></h5>
<canvas id="chart_type_div_per_month"></canvas>
<?php endif;?>

<?php if (in_array('msgtype',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
<hr>
<h5><a class="csv-export" data-scope="msgtype" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/messages_types.tpl.php'));?></h5>
<canvas id="chart_type_div_msg_type"></canvas>
<?php endif;?>

<?php if (in_array('msgdelop',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
<hr>
<h5><a class="csv-export" data-scope="msgdelop" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/messages_del_op.tpl.php'));?></h5>
<canvas id="chart_type_div_msg_del_op"></canvas>
<?php endif;?>

<?php if (in_array('msgdelbot',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
<hr>
<h5><a class="csv-export" data-scope="msgdelbot" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/messages_del_bot.tpl.php'));?></h5>
<canvas id="chart_type_div_msg_del_bot"></canvas>
<?php endif;?>

<?php if (isset($numberOfChatsPerWaitTimeMonth) && !empty($numberOfChatsPerWaitTimeMonth)) : ?>
<hr>
<h5><a class="csv-export" data-scope="waitmonth" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/avg_wait_time_in_seconds_max_10_mininutes.tpl.php'));?></h5>
<canvas id="chart_div_per_month_wait_time"></canvas>
<?php endif; ?>

<?php if (in_array('unanswered',is_array($input->chart_type) ? $input->chart_type : array())) : ?>
<hr>
<h5><a class="csv-export" data-scope="unanswered" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/unanswered_chats_numbers.tpl.php'));?></h5>
<canvas id="chart_div_per_month_unanswered"></canvas>
<?php endif; ?>

<?php if (isset($numberOfChatsPerHour['byday'])) : ?>
<hr>
<h5><a class="csv-export" data-scope="hourbyhour" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_chats_per_hour_average_chat_duration_hour.tpl.php'));?><h5>
<canvas id="chart_div_per_hour_by_hour"></canvas>

<hr>
<h5><a class="csv-export" data-scope="chatperhour" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a> <?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_chats_per_hour_average_chat_duration.tpl.php'));?>&nbsp;<?php echo $averageChatTime != null ? erLhcoreClassChat::formatSeconds($averageChatTime) : '(-)';?></h5>
<canvas id="chart_div_per_hour"></canvas>
<?php endif; ?>

<?php if (!empty($countryStats)) : ?>
<hr>
<h5><a class="csv-export" data-scope="country" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_chats_by_country.tpl.php'));?></h5>
<canvas id="chart_div_country"></canvas>
<?php endif;?>

<?php if (!empty($userChatsStats)) : ?>
<hr>
<h5><a class="csv-export" data-scope="chatbyuser" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_chats_by_user.tpl.php'));?></h5>
<canvas id="chart_div_user"></canvas>
<?php endif;?>

<?php if (!empty($userChatsParticipantStats)) : ?>
<hr>
<h5><a class="csv-export" data-scope="chatbyuserparticipant" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_chats_by_user_participant.tpl.php'));?></h5>
<canvas id="chart_div_user_participant"></canvas>
<?php endif;?>

<?php if (!empty($userTransferChatsStats)) : ?>
<hr>
<h5><a class="csv-export" data-scope="chatbytransferuser" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_chats_by_transfer_user.tpl.php'));?></h5>
<canvas id="chart_div_transfer_user"></canvas>
<?php endif;?>

<?php if (!empty($depChatsStats)) : ?>
<hr>
<h5><a class="csv-export" data-scope="chatbydep" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a> <?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_chats_by_dep.tpl.php'));?></h5>
<canvas id="chart_div_dep"></canvas>
<?php endif;?>

<?php if (!empty($numberOfMsgByUser)) : ?>
<hr>
<h5><a class="csv-export" data-scope="usermsg" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_messages_by_user.tpl.php'));?></h5>
<canvas id="chart_div_user_msg"></canvas>
<?php endif;?>

<?php if (!empty($userChatsAverageStats)) : ?>
<hr>
<h5><a href="<?php echo erLhcoreClassDesign::baseurl('statistic/statistic')?><?php echo $urlappend?>?xmlavguser=1" target="_blank" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','All operators statistic will be downloaded')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/average_chat_duration_by_user.tpl.php'));?></h5>
<canvas id="chart_div_avg_user"></canvas>
<?php endif;?>

<?php if (!empty($userWaitTimeByOperator)) : ?>
<hr>
<h5><a class="csv-export" data-scope="waitbyoperator" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/avg_visitor_wait_time_by_operator.tpl.php'));?></h5>
<canvas id="chart_div_user_wait_time"></canvas>
<?php endif;?>

<?php if (!empty($subjectsStatistic)) : ?>
<hr>
<h5><a class="csv-export" data-scope="subject" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_chats_by_subject.tpl.php'));?></h5>
<canvas id="chart_div_subjects_statistic"></canvas>
<?php endif; ?>

<?php if (!empty($cannedStatistic)) : ?>
<hr>
<h5><a class="csv-export" data-scope="canned" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a><?php include(erLhcoreClassDesign::designtpl('lhstatistic/tabs/titles/number_of_chats_by_canned.tpl.php'));?></h5>
<canvas id="chart_div_canned_statistic"></canvas>
<?php endif; ?>

<?php if (!empty($userStats['thumbsup'])) : ?>
<a class="csv-export" data-scope="thumbsup" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a>
<canvas id="chart_div_upvotes_canvas"></canvas>
<?php endif; ?>

<?php if (!empty($userStats['thumbdown'])) : ?>
<a class="csv-export" data-scope="thumbdown" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Download CSV')?>"><i class="material-icons me-0">file_download</i></a>
<canvas id="chart_div_downvotes_canvas"></canvas>
<?php endif; ?>

<script>
$(".csv-export").click(function(event) {
    event.preventDefault();
    $('#id-report-type').val($(this).attr('data-scope'));
    $('#form-statistic-action').submit();
})
</script>



<?php else : ?>
<br/>
<div class="alert alert-info">
  <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/statistic','Please choose statistic parameters first!');?>
</div>
<?php endif; ?>