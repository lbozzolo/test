<div class="row">
    <div class="col-xs-12">

        {{-- Errores --}}
        @if ($errors->count() > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Ha ocurrido un error:<br />
                @if ($errors->count() > 1)
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                @else
                    {{ $errors->first() }}
                @endif
            </div>
        @endif

        {{-- Success --}}
        @if (session()->has('msgOk') || isset($msgOk))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                @if (session()->has('msgOk'))
                    {!! session('msgOk') !!}
                @else
                    {!! $msgOk !!}
                @endif
            </div>
        @endif
    </div>
</div>
