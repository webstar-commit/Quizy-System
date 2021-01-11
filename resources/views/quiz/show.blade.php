<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
<h1 class="jumbotron text-center">{{$quiz->title}} Quiz</h1>
<p class="alert alert-danger" id="demo"></p>

<form action="/students_scores/{{Request::segment(2)}}/{{Request::segment(3)}}" method="post">
    {{csrf_field()}}
@foreach($quiz->question as $ques)
<label for="question_1" class="col-form-label">{{$ques->body}}</label> <br>

@foreach($ques->answer as $ans)
            {{--<input type="hidden" value="{{$ans->is_correct}}" name="result">--}}
            <input type="radio" class="iradio_flat-blue" id="question_1" name="{{$ques->body }} " value="{{ $ans->is_correct }}"> {{ $ans->answer }}<br>
@endforeach
        <br>
        <br>
    @endforeach
    <div class="form-group">
    <button id="submitBtn" class="btn btn-success">submit</button>
    </div>
</form>

<script src="{{asset('js/countdown.js')}}"></script>
</div>
</body>
</html>