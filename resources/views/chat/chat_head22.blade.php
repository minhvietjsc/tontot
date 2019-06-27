
@foreach($chat as $value)
    <?php

    if($value->image ==''){
        if($value->type == 'c' ){
            $avator = asset('assets/images/users/company.png');
        }
        if($value->type == 'u' ){
            if($value->gender == 'm'){
                $avator = asset('assets/images/users/male.png');
            }
            if($value->gender == 'f'){
                $avator = asset('assets/images/users/female.png');
            }
        }
    }else{
        $avator = asset('assets/images/users/'.$value->image.'');
    }
    ?>
    <li class="clearfix {{ ( $value->id != Auth::user()->id )? 'odd' : ''  }} ">
        <div class="chat-avatar">
            <img src="{{ $avator }}" alt="male">
            <i><small>{{ date('H:i a', strtotime($value->created_at)) }}</small></i>
        </div>
        <div class="conversation-text">
            <div class="ctext-wrap">
                <i>{{ ucwords($value->name) }}</i>
                <p>
                    {!! $value->text !!}
                </p>
            </div>
        </div>
    </li>
@endforeach
