
<?php
$setting = \App\Models\Utility::colorset();
$color = 'theme-3';
if (!empty($setting['color'])) {
    $color = $setting['color'];
}
?>
<?php if($get == 'saved'): ?>
    <table class="messenger-list-item m-li-divider <?php if('user_'.Auth::user()->id == $id && $id != "0"): ?> m-list-active <?php endif; ?>">
        <tr data-action="0">
            
            <td>
                <?php if($color == 'theme-1'): ?>
                    <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                        <span class="far fa-bookmark"
                            style="font-size: 22px; color: #51459d; margin-top: 11px !important; display:block; " ></span>
                    </div>
                <?php endif; ?>
                <?php if($color == 'theme-2'): ?>
                    <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                        <span class="far fa-bookmark"
                            style="font-size: 22px; color: #1f3996; margin-top: 11px !important; display:block; "></span>
                    </div>
                <?php endif; ?>
                <?php if($color == 'theme-3'): ?>
                    <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                        <span class="far fa-bookmark"
                            style="font-size: 22px; color: #6fd943; margin-top: 11px !important; display:block; "></span>
                    </div>
                <?php endif; ?>
                <?php if($color == 'theme-4'): ?>
                    <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                        <span class="far fa-bookmark"
                            style="font-size: 22px; color: #584ed2; margin-top: 11px !important; display:block; "></span>
                    </div>
                <?php endif; ?>


                
            </td>
            
            <td>
                <p data-id="<?php echo e('user_'.Auth::user()->id); ?>"><?php echo e(__('Saved Messages')); ?> <span><?php echo e(__('You')); ?></span></p>
                <span><?php echo e(__('Save messages secretly')); ?></span>
            </td>
        </tr>
    </table>
<?php endif; ?>


<?php if($get == 'users'): ?>
    <table class="messenger-list-item messenger-list-item <?php if($user->id == $id && $id != "0"): ?> m-list-active <?php endif; ?>" data-contact="<?php echo e($user->id); ?>">
        <tr data-action="0">
            
            <td style="position: relative">
                <?php if($user->active_status): ?>
                    <span class="activeStatus"></span>
                <?php endif; ?>
                
                <?php if(!empty($user->getUserInfo->profile_pic)): ?>
                <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m"
                     style="background-image: url('<?php echo e(asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic); ?>');">
                </div>
                <?php else: ?>
                    <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m"
                        style="background-image: url('<?php echo e(asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png'); ?>');">
                    </div>
                <?php endif; ?>
            </td>
            
            <td>
                <p data-id="<?php echo e($type.'_'.$user->id); ?>">
                    <?php echo e(strlen($user->first_name) > 12 ? trim(substr($user->first_name,0,12)).'..' : $user->first_name); ?>

                    <span><?php echo e($lastMessage->created_at->diffForHumans()); ?></span></p>
                <span>
            
                    <?php echo $lastMessage->from_id == Auth::user()->id
                        ? '<span class="lastMessageIndicator text-primary">'.__('You :').'</span>'
                        : ''; ?>

                    
                    <?php if($lastMessage->attachment == null): ?>
                        <?php echo e(strlen($lastMessage->body) > 30
                            ? trim(substr($lastMessage->body, 0, 30)).'..'
                            : $lastMessage->body); ?>

                    <?php else: ?>
                        <span class="fas fa-file"></span> <?php echo e(__('Attachment')); ?>

                    <?php endif; ?>
        </span>
                
                <?php echo $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : ''; ?>

            </td>

        </tr>
    </table>
<?php endif; ?>


<?php if($get == 'search_item'): ?>
    <table class="messenger-list-item" data-contact="<?php echo e($user->id); ?>">
        <tr data-action="0">
            
            <td style="position: relative">
                <?php if($user->active_status): ?>
                    <span class="activeStatus"></span>
                <?php endif; ?>
                
                <?php if(!empty($user->getUserInfo->profile_pic)): ?>
                <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m"
                     style="background-image: url('<?php echo e(asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic); ?>');">
                </div>
                <?php else: ?>
                    <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m"
                        style="background-image: url('<?php echo e(asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png'); ?>');">
                    </div>
                <?php endif; ?>
            </td>
            
            <td>
                <p data-id="<?php echo e($type.'_'.$user->id); ?>">
                <?php echo e(strlen($user->first_name) > 12 ? trim(substr($user->first_name,0,12)).'..' : $user->first_name); ?>

            </td>

        </tr>
    </table>
<?php endif; ?>



<?php if($get == 'all_members'): ?>
    <table class="messenger-list-item" data-contact="<?php echo e($user->id); ?>">
        <tr data-action="0">
            
            <td style="position: relative">
                <?php if($user->active_status): ?>
                    <span class="activeStatus"></span>
                <?php endif; ?>
                
                <?php if(!empty($user->getUserInfo->profile_pic)): ?>
                <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m"
                     style="background-image: url('<?php echo e(asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic); ?>');">
                </div>
                <?php else: ?>
                    <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m"
                        style="background-image: url('<?php echo e(asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png'); ?>');">
                    </div>
                <?php endif; ?>
            </td>
            
            <td>
                <p data-id="<?php echo e($type.'_'.$user->id); ?>">
                <?php echo e(strlen($user->first_name) > 12 ? trim(substr($user->first_name,0,12)).'..' : $user->first_name); ?>

            </td>

        </tr>
    </table>
<?php endif; ?>


<?php if($get == 'sharedPhoto'): ?>
    <div class="shared-photo chat-image" style="background-image: url('<?php echo e($image); ?>')"></div>
<?php endif; ?>


<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/vendor/Chatify/layouts/listItem.blade.php ENDPATH**/ ?>