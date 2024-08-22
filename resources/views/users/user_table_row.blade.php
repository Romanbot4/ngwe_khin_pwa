<div class="d-flex gap-4">
    <div class="avatar avatar-md">
        <img class="avatar-img" style="height: 2.5rem; width: 2.5rem;" src="{{$image}}" alt="{{$email}}">
        <span class="avatar-status bg-success"></span>
    </div>
    <div class="row">
        <div class="text-nowrap">{{$name}}</div>
        <div class="small text-body-secondary text-nowrap">
            @if($is_new_user) <span>New</span> @endif | Registered: {{$register_date}}
        </div>
    </div>
</div>
