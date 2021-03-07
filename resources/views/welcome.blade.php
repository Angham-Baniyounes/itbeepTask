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
                
                <input type="text" class="form-control" id="name" placeholder="Angham">
            </div>
            <div class="form-group">
                <label for="mobile" dir="rtl">الجوال</label>
                <input type="number" class="form-control" id="mobile" placeholder="077/7777777">
            </div>
            <div class="form-group">
                <label for="email" dir="rtl">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
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
                            <button type="button">
                                <input type="radio" value="{{$ser['id']}}" class="service">
                                {{$ser['service_name']}}

                                {{-- {{$service_id = session('service_id')}} --}}
                                {{Session::put('service_id', $ser['id'])}}
                            </button>
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
                <form class="form flex col-md-12 center-block" action="/{{$ser['id']}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        @foreach ($intrests as $item)
                            <button type="button" value="{{$item['id']}}">{{$item['intrest_name']}}</button>
                            
                        @endforeach
                    </div>
                    {{-- <div class="form-group">

                        <button type="submit" id="next" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">التالي</button>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        // Session::put('variableName', $value);
    </script>
@endsection        