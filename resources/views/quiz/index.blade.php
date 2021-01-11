
<ul>

@foreach($quizzes as $quiz)



<li><a href="{{route('showQuiz', [$quiz->id ,1])}}">{{ $quiz->title  }}</a></li>



    @endforeach


</ul>