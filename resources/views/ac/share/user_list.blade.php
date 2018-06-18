<div class="UserList">
    @if($navData['userInfo']['avatar'])
        <div class="avatar user" style="background-image: url('{{ $navData['userInfo']['avatar'] }}');"></div>
    @else
        <div class="avatar user"></div>
    @endif
    <div class="UserList__nickname">{{ $navData['userInfo']['nickname'] }}</div>
</div>