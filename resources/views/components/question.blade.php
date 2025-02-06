@if($question == null)
<div class="col-md-12">
    <h4 class="mt-5 yellow">Question {{$j}}.</h4>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="mb-3 col-4">
            <label for="q{{$j}}ex{{$i}}textFirst">First part</label>
            <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}textFirst" name="q{{$j}}ex{{$i}}textFirst">
        </div>
        <div class="mb-3 col-4">
            <label for="q{{$j}}ex{{$i}}textSecond">Second part</label>
            <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}textSecond" name="q{{$j}}ex{{$i}}textSecond">
        </div>
        <div class="mb-3 col-4">
            <label for="q{{$j}}ex{{$i}}explanation">Explanation</label>
            <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}explanation" name="q{{$j}}ex{{$i}}explanation">
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="mb-3 col-4">
            <label for="q{{$j}}ex{{$i}}-correct">Correct answer</label>
            <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}-correct" name="q{{$j}}ex{{$i}}correct">
        </div>
        <div class="mb-3 col-4">
            <label for="q{{$j}}ex{{$i}}-false1">False answer</label>
            <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}-false1" name="q{{$j}}ex{{$i}}false1">
        </div>
        <div class="mb-3 col-4">
            <label for="q{{$j}}ex{{$i}}-false2">False answer</label>
            <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}-false2" name="q{{$j}}ex{{$i}}false2">
        </div>
    </div>
</div>
@else
    <div class="col-md-12">
        <h4 class="mt-5 yellow">Question {{$j}}.</h4>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="mb-3 col-4">
                <label for="q{{$j}}ex{{$i}}textFirst">First part</label>
                <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}textFirst" name="q{{$j}}ex{{$i}}textFirst" value="{{$question->text_first}}">
            </div>
            <div class="mb-3 col-4">
                <label for="q{{$j}}ex{{$i}}textSecond">Second part</label>
                <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}textSecond" name="q{{$j}}ex{{$i}}textSecond" value="{{$question->text_second}}">
            </div>
            <div class="mb-3 col-4">
                <label for="q{{$j}}ex{{$i}}explanation">Explanation</label>
                <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}explanation" name="q{{$j}}ex{{$i}}explanation" value="{{$question->explanation}}">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="mb-3 col-4">
                @foreach($question->answers as $answer)
                    @if($answer->is_correct)
                        <label for="q{{$j}}ex{{$i}}-correct">Correct answer</label>
                        <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}-correct" name="q{{$j}}ex{{$i}}correct" value="{{$answer->text}}">
                    @endif
                @endforeach
            </div>
            @if($question->answers->where("is_correct", false)->count() > 1)
                @php $falseNum = 1; @endphp

                @foreach($question->answers as $answer)
                    @if(!$answer->is_correct)
                        <div class="mb-3 col-4">
                            <label for="q{{$j}}ex{{$i}}-false{{$falseNum}}">False answer</label>
                            <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}-false{{$falseNum}}" name="q{{$j}}ex{{$i}}false{{$falseNum++}}" value="{{$answer->text}}">
                        </div>
                    @endif
                @endforeach
            @else
                @for($m = 1; $m < 3; $m++)
                    <div class="mb-3 col-4">
                        <label for="q{{$j}}ex{{$i}}-false{{$m}}">False answer</label>
                        <input type="text" class="contact_control" id="q{{$j}}ex{{$i}}-false{{$m}}" name="q{{$j}}ex{{$i}}false{{$m}}">
                    </div>
                @endfor
            @endif
        </div>
    </div>
    @endif
