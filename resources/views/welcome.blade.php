@extends('layout')
@section('content')
    <div class="position-ref full-height">
        <div class="header">
            <h1 class="text-center">Itbeep</h1>
        </div>
        <form class="form flex col-md-12 center-block" action="" method="post">
            @csrf
            <div class="form-group">
                <label class="flex-end" for="name" dir="rtl">الإسم</label>
                <input type="text" class="form-control" id="name" placeholder="Angham" name="name">
            </div>
            <div class="form-group">
                <label for="mobile" dir="rtl">الجوال</label>
                <input type="number" class="form-control" id="mobile" placeholder="077/7777777" name="mobile">
            </div>
            <div class="form-group">
                <label for="email" dir="rtl">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
            </div>
            <div class="form-group">
                <button type="submit" id="send" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#offers">Send</button>
            </div>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="offers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" dir="rtl">أختر عرض من العروض التالية</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form flex col-md-12 center-block" action="" >
                    <div class="form-group">
                        @foreach ($services as $ser)
                            <div>
                                <input type="checkbox" value="{{$ser['id']}}" class="service" name="service_id">
                                {{$ser['service_name']}}                                
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" id="next" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#times">التالي</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="times" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">متى ترغب برفع الطلب ؟</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form flex col-md-12 center-block" acrion="/addUser" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="" value="{{$ser_id = session()->get('service_id')}}">
                        @foreach ($intrests as $item)
                            @if ($item['service_id'] == $ser_id)
                                <button type="button" value="{{$item['id']}}" >{{$item['intrest_name']}}
                                    <input type="checkbox" name="intrest_id" id="intrest_id" value="{{$item['id']}}">
                                </button>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" id="insert" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">التالي</button>
                        <input class="btn btn-primary" type="submit" value="Submit" name="submit"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@endsection        