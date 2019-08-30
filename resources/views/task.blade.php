@extends('layouts.app')

@section('content')
    <script>
        var resultFuncDef = "\
def resultTest(elemList, resultsList):\n\
    if elemList == resultsList:\n\
        return '*result*1*result*'\n\
    else:\n\
        return '*result*0*result*'\n\
\n";

        var resultParams = "\n\
elemList = {{json_decode($subTasks[0]->dod, true)['elemList']}}\n\
resultsList = {{json_decode($subTasks[0]->dod, true)['resultsList']}}\n\
\n";

        var resultTest = "\n\
print(resultTest(elemList, resultsList))\n\
\n";



    </script>
    <div class="row">
        <div class="col-sm-5">
            <div class="card shadow mb-4">
                    <textarea style="height: 600px; border-radius:5px;" id="yourcode">{{$subTasks[0]->code}}</textarea>
                <div class="card-body">
                    <div class="text-right">
                        <a href="#" class="btn btn-success" onclick="runit()">
                            <span>Запустить!</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Что же делать?</h6>
                </div>
                <div class="card-body">
                    {{$task->desc}}
                </div>
            </div>


            {{--@foreach($subTasks as $subTask)--}}
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Задача #{{$subTasks[0]->count}} - {{$subTasks[0]->name}}</h6>
                    </div>
                    <div class="card-body">
                        {!! $subTasks[0]->desc !!}
                    </div>
                </div>
            {{--@endforeach--}}

            <div class="card shadow mb-4">
                <div class="card-body">
                    Вывод:
                    <p id="output">

                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
