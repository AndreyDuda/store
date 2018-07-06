<div class="settings" style="">
        <form action="{{route('settingsSite')}}" method="post"  class="form-inline">
            {{ csrf_field() }}
            <input type="hidden">
            <h2>Настройки сайта</h2>
            <div class="form-group flex">
                @foreach($settings as $setting)
                    @if($setting->type == 'input')
                        <div>
                            <label for="input{{ $setting->id }}">{{ $setting->name }}</label>
                            <input  id="input{{ $setting->id }}" name="{{$setting->option}}" class="form-control mx-sm-3" value="{{$setting->value}}">
                            <small id="" class="text-muted">
                                {{ $setting->desc }}
                            </small>
                        </div>
                    @endif
                @endforeach
            </div>
            <div>
                <div class="flex meta-main">
                    @foreach($settings as $setting)
                        @if($setting->type != 'input')
                                    <div>
                                        <p class="bold">{{ $setting->name }}</p>
                                        <textarea name="{{$setting->option}}" id="" cols="30" rows="10" value="">{{$setting->value}}</textarea>
                                        <p> {{ $setting->desc }} </p>
                                    </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <input type="submit" value="Сохранить" class="settings-submit">
        </form>
</div>
