<div class="UserList">
    @if($navData['userInfo']['avatar_url'])
        <div class="avatar user" style="background-image: url('{{ $navData['userInfo']['avatar_url'] }}');"></div>
    @else
        <div class="avatar user"></div>
    @endif
    <div class="UserList__nickname">{{ $navData['userInfo']['nickname'] }}</div>
</div>