{{-- -------------------- Saved Messages -------------------- --}}
@php
$setting = \App\Models\Utility::colorset();
$color = 'theme-3';
if (!empty($setting['color'])) {
    $color = $setting['color'];
}
@endphp
@if($get == 'saved')
    <table class="messenger-list-item m-li-divider @if('user_'.Auth::user()->id == $id && $id != "0") m-list-active @endif">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
                @if ($color == 'theme-1')
                    <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                        <span class="far fa-bookmark"
                            style="font-size: 22px; color: #51459d; margin-top: 11px !important; display:block; " ></span>
                    </div>
                @endif
                @if ($color == 'theme-2')
                    <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                        <span class="far fa-bookmark"
                            style="font-size: 22px; color: #1f3996; margin-top: 11px !important; display:block; "></span>
                    </div>
                @endif
                @if ($color == 'theme-3')
                    <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                        <span class="far fa-bookmark"
                            style="font-size: 22px; color: #6fd943; margin-top: 11px !important; display:block; "></span>
                    </div>
                @endif
                @if ($color == 'theme-4')
                    <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                        <span class="far fa-bookmark"
                            style="font-size: 22px; color: #584ed2; margin-top: 11px !important; display:block; "></span>
                    </div>
                @endif


                {{-- <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                    <span class="far fa-bookmark" style="font-size: 22px; color: #2359ee;margin-top: 5px !important;"></span>
                </div> --}}
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ 'user_'.Auth::user()->id }}">{{__('Saved Messages')}} <span>{{__('You')}}</span></p>
                <span>{{__('Save messages secretly')}}</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- All users/group list -------------------- --}}
@if($get == 'users')
    <table class="messenger-list-item messenger-list-item @if($user->id == $id && $id != "0") m-list-active @endif" data-contact="{{ $user->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td style="position: relative">
                @if($user->active_status)
                    <span class="activeStatus"></span>
                @endif
                {{-- @if(!empty($user->avatar))
                    <div class="avatar av-m"
                         style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}');">
                    </div>
                @else
                    <div class="avatar av-m"
                         style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png') }}');">
                    </div>
                @endif --}}
                @if (!empty($user->getUserInfo->profile_pic))
                <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
                     style="background-image: url('{{ asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic }}');">
                </div>
                @else
                    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
                        style="background-image: url('{{ asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png' }}');">
                    </div>
                @endif
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ $type.'_'.$user->id }}">
                    {{ strlen($user->first_name) > 12 ? trim(substr($user->first_name,0,12)).'..' : $user->first_name }}
                    <span>{{ $lastMessage->created_at->diffForHumans() }}</span></p>
                <span>
            {{-- Last Message user indicator --}}
                    {!!
                        $lastMessage->from_id == Auth::user()->id
                        ? '<span class="lastMessageIndicator text-primary">'.__('You :').'</span>'
                        : ''
                    !!}
                    {{-- Last message body --}}
                    @if($lastMessage->attachment == null)
                        {{
                            strlen($lastMessage->body) > 30
                            ? trim(substr($lastMessage->body, 0, 30)).'..'
                            : $lastMessage->body
                        }}
                    @else
                        <span class="fas fa-file"></span> {{__('Attachment')}}
                    @endif
        </span>
                {{-- New messages counter --}}
                {!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}
            </td>

        </tr>
    </table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
    <table class="messenger-list-item" data-contact="{{ $user->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td style="position: relative">
                @if($user->active_status)
                    <span class="activeStatus"></span>
                @endif
                {{-- @if(!empty($user->avatar))
                    <div class="avatar av-m"
                         style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}');">
                    </div>
                @else
                    <div class="avatar av-m"
                         style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png') }}');">
                    </div>
                @endif --}}
                @if (!empty($user->getUserInfo->profile_pic))
                <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
                     style="background-image: url('{{ asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic }}');">
                </div>
                @else
                    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
                        style="background-image: url('{{ asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png' }}');">
                    </div>
                @endif
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ $type.'_'.$user->id }}">
                {{ strlen($user->first_name) > 12 ? trim(substr($user->first_name,0,12)).'..' : $user->first_name }}
            </td>

        </tr>
    </table>
@endif

{{-- -------------------- Get All Members -------------------- --}}

@if($get == 'all_members')
    <table class="messenger-list-item" data-contact="{{ $user->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td style="position: relative">
                @if($user->active_status)
                    <span class="activeStatus"></span>
                @endif
                {{-- @if(!empty($user->avatar))
                    <div class="avatar av-m"
                         style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}');">
                    </div>
                @else
                    <div class="avatar av-m"
                         style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png') }}');">
                    </div>
                @endif --}}
                @if (!empty($user->getUserInfo->profile_pic))
                <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
                     style="background-image: url('{{ asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic }}');">
                </div>
                @else
                    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
                        style="background-image: url('{{ asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png' }}');">
                    </div>
                @endif
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ $type.'_'.$user->id }}">
                {{ strlen($user->first_name) > 12 ? trim(substr($user->first_name,0,12)).'..' : $user->first_name }}
            </td>

        </tr>
    </table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
    <div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>
@endif


