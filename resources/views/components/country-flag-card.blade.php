<div>
    <div class="card" style="width: 18rem;" country="{{$country['iso']}}">
        @if (isset($country['flagUrl']) )
            <img class="card-img-top" src="{{$country['flagUrl']}}" alt="{{$country['name']}}">
        @else
            <div class="card-body">
                <h5 class="card-title">{{$country["name"]}}</h5>
            </div>
        @endif
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="modal-{{$country['iso']}}">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{$country['name']}} ({{$country['iso']}})</h5>
            </div>
            <div class="modal-body">
                <dl class="list-group">
                    <dt class="pb-1">General Information</dt>
                    <dd>Capital City:&nbsp;{{$country["capital"]}}</dd>
                    <dd>Population Count:&nbsp;{{$country["pop"]}}</dd>
                    <dd>ISO Code:&nbsp;{{$country['iso']}}</dd>
                    <hr/>
                    <dt>Currencies</dt>
                    @forelse ($country["currencies"] as $code => $currency)
                        <dd class="mt-0 pt-0 pb-0 mb-0">{{$currency['name']}}&nbsp;({{$code}})&nbsp;[{{array_key_exists('symbol',$currency) ? $currency['symbol'] : "???"}}]</dd>
                    @empty
                        <dd>Does not have an official currency.</dd>                        
                    @endforelse
                    <hr/>
                    <dt>Languages</dt>
                    @forelse ($country["languages"] as $language)
                        <dd class="mt-0 pt-0 pb-0 mb-0">{{$language}}</dd>
                    @empty
                        <dd>Does not have an official language.</dd>                        
                    @endforelse
                </dl>
            </div>
          </div>
        </div>
      </div>
</div>

<script>
    $(document).ready(() => {
        jQuery(document.body).on('click', '.card[country="{{$country['iso']}}"]', (e) => {
            console.log("clicked {{$country['iso']}}!");
            jQuery({!! "'#modal-" . $country['iso'] . "'" !!} ).modal('show');
        });
    });
</script>