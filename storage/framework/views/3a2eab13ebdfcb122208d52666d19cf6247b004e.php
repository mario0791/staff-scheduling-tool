


<?php
$users = App\Models\ChMessage::join('users',  function ($join) {
            $join->on('ch_messages.from_id', '=', 'users.id')
                ->orOn('ch_messages.to_id', '=', 'users.id');
        })
        ->where(function ($q) {
            $q->where('ch_messages.from_id', Auth::user()->id)
              ->orWhere('ch_messages.to_id', Auth::user()->id);
        })
        ->orderBy('ch_messages.created_at', 'desc')
        ->get()
        ->unique('id');
$user = \Auth::user();
?>

<?php if(!empty($user->getUserInfo->profile_pic)): ?>
    <img class="wid-100 hei-250 avatar rounded-circle avatar-sm info-avatar" title=""
        alt="Image placeholder"
        <?php if(!empty($user->getUserInfo->profile_pic)): ?> src="<?php echo e(asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic); ?>"
        <?php else: ?>  src="<?php echo e(asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png'); ?>" <?php endif; ?>>
<?php else: ?>
    <img class="wid-36 hei-35 avatar rounded-circle avatar-sm info-avatar"
    title="" alt="Image placeholder"
    <?php if(!empty($user->getUserInfo->profile_pic)): ?>
    src="<?php echo e(asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic); ?>"
    <?php else: ?>
    src="<?php echo e(asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png'); ?>"
    <?php endif; ?>
    >

<?php endif; ?>

<p class="info-name"><?php echo e(config('chatify.name')); ?></p>

<div class="messenger-infoView-btns">
    
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Delete Conversation</a>
</div>

<div class="messenger-infoView-shared">
    <p class="messenger-title">shared photos</p>
    <div class="shared-photos-list"></div>
</div>
<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/vendor/Chatify/layouts/info.blade.php ENDPATH**/ ?>