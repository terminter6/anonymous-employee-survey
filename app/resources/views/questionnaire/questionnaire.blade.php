@extends('layot.index')
@section('title')
    {{ $questionnaire->name }}
@endsection
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>{{ $questionnaire->name }}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="#">
                @csrf
                @foreach($questionnaire->questions as $question)
                    <div class="mb-4">
                        <label class="form-label"><b>{{ $question->text }}</b></label>
                        @if($question->type === 'scale')
                            <div>
                                @for($i = 1; $i <= 10; $i++)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="q{{ $question->id }}_{{ $i }}" value="{{ $i }}">
                                        <label class="form-check-label" for="q{{ $question->id }}_{{ $i }}">{{ $i }}</label>
                                    </div>
                                @endfor
                            </div>
                        @elseif($question->type === 'text')
                            <textarea class="form-control" name="answers[{{ $question->id }}]" rows="2"></textarea>
                        @endif
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>
@endsection


