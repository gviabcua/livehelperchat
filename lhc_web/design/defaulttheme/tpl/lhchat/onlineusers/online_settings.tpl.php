<ul class="list-inline float-end user-settings-list">
	<li class="li-icon list-inline-item"><a href="#" ng-click="online.disableNewUserSound()"><i class="material-icons" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Enable/Disable sound about new visitor');?>">{{online.soundEnabled ? 'volume_up':'volume_off'}}</i></a></li>
	<li class="li-icon list-inline-item"><a href="#" ng-click="online.disableNewUserBNotif()"><i class="material-icons"  title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Enable/Disable browser notifications about new visitor');?>">{{online.notificationEnabled ? 'visibility' : 'visibility_off'}}</i></a></li>
</ul>