<div class="container-fluid" style="">
    <div class="row">
<form action="{{route('settingsSite')}}" method="post"  class="form-inline">
    {{ csrf_field() }}
    <input type="hidden">
    <div class="form-group">
        @foreach($settings as $setting)
            <label for="input{{ $setting->id }}">{{ $setting->name }}</label>
            <input  id="input{{ $setting->id }}" name="{{$setting->option}}" class="form-control mx-sm-3" value="{{$setting->value}}">
            <small id="passwordHelpInline" class="text-muted">
                {{ $setting->desc }}
            </small>
        @endforeach
    </div>
    <input type="submit" value="Сохранить">
</form>
</div>
</div>
