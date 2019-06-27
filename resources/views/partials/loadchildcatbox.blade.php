@foreach($parent_cat as $item)
	<div class="category-box-child-item">
        <a href="{{url('search/query?main_category='.urlencode($item['cat']->slug))}}"><b>{{$item['cat']->name}}</b></a>
        <ul>
        @foreach($item['children'] as $cat)
        @if($cat->status == 1)
        <li>
        	<a href="{{url('search/query?main_category='.urlencode($cat->slug))}}">{{$cat->name}}</a>
        </li>
        @endif
        @endforeach
    	</ul>
    </div>
@endforeach