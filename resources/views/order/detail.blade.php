
@foreach($rs as $idx => $item)
<div class="row" style="padding-bottom: 10px;border-bottom: 1px solid #ccc;">
    <div class="col-md-7">
        <div style="font-weight: bold;margin-bottom: 5px;">{{$item->ads_name}}</div>
        <div>{{$item['amount']}} x {{ number_format($item->price) }} đ</div>
    </div>
    <div class="col-md-1 text-center">=</div>
    <div class="col-md-4">
        {{ number_format($item->amount*$item->price) }} đ
    </div>
</div>
@endforeach