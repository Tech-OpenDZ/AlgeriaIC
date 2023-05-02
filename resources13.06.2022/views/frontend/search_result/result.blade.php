@forelse($data as $d)
    <div class="search-find-results pb-3 mb-3">
        <h6 class="pb-2"><a href="{{$d['url']}}" target="_blank" class="search-result-heading">{{$d['title']}}</a></h6>
        <p class="pb-1">{{$d['content']}}</p>
        <p class="search-result-date">{{$d['date']}}</p>
    </div>
@empty
@if($data->currentPage() == 1)
    @if($search == null)
    <h6>@lang('search_result.enter_keyword') </h6>
    @else 
    <h6>@lang('search_result.notMatch') "{{$search}}"</h6>
    @endif
@endif
@endforelse
