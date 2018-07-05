<div class="settings" style="">
        <form action="{{route('settingsSite')}}" method="post"  class="form-inline">
            {{ csrf_field() }}
            <input type="hidden">
            <h2>Настройки сайта</h2>
            <div class="form-group flex">

                @foreach($settings as $setting)
                    <div>
                        <label for="input{{ $setting->id }}">{{ $setting->name }}</label>
                        <input  id="input{{ $setting->id }}" name="{{$setting->option}}" class="form-control mx-sm-3" value="{{$setting->value}}">
                        <small id="passwordHelpInline" class="text-muted">
                            {{ $setting->desc }}
                        </small>
                    </div>
                    <div>
                        <label for="input{{ $setting->id }}">{{ $setting->name }}</label>
                        <input  id="input{{ $setting->id }}" name="{{$setting->option}}" class="form-control mx-sm-3" value="{{$setting->value}}">
                        <small id="passwordHelpInline" class="text-muted">
                            {{ $setting->desc }}
                        </small>
                    </div>
                    <div>
                        <label for="input{{ $setting->id }}">{{ $setting->name }}</label>
                        <input  id="input{{ $setting->id }}" name="{{$setting->option}}" class="form-control mx-sm-3" value="{{$setting->value}}">
                        <small id="passwordHelpInline" class="text-muted">
                            {{ $setting->desc }}
                        </small>
                    </div>
                    <div>
                        <label for="input{{ $setting->id }}">{{ $setting->name }}</label>
                        <input  id="input{{ $setting->id }}" name="{{$setting->option}}" class="form-control mx-sm-3" value="{{$setting->value}}">
                        <small id="passwordHelpInline" class="text-muted">
                            {{ $setting->desc }}
                        </small>
                    </div>
                    <div>
                        <label for="input{{ $setting->id }}">{{ $setting->name }}</label>
                        <input  id="input{{ $setting->id }}" name="{{$setting->option}}" class="form-control mx-sm-3" value="{{$setting->value}}">
                        <small id="passwordHelpInline" class="text-muted">
                            {{ $setting->desc }}
                        </small>
                    </div>
                @endforeach
            </div>
            <input type="submit" value="Сохранить" class="settings-submit">
        </form>
</div>
