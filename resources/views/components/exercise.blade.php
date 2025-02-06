@if($exercise == null)
<div class="col-md-12">
    <h2 class="yellow mt-5">Exercise {{$i}}.</h2>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="exerciseText{{$i}}">Exercise name</label>
        <input type="text" class="contact_control" id="exerciseText{{$i}}" name="exerciseText{{$i}}">
    </div>
    <div class="mb-3">
        <label for="assignment{{$i}}">Assignment</label>
        <input type="text" class="contact_control" id="assignment{{$i}}" name="assignment{{$i}}">
    </div>
</div>
<div class="col-md-6">
        <div class="row pl-5">
            <div class="col-12">
                <h3>Exercise type:</h3>
            </div>
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-6 pl-5">
                        <label for="exType{{$i}}">Text</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" value="1" name="exType{{$i}}">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-6 pl-5">
                        <label for="exType{{$i}}">Radio</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" value="2" name="exType{{$i}}">
                    </div>
                </div>
            </div>
        </div>
</div>

@else
    <div class="col-md-12">
        <h2 class="yellow mt-5">Exercise id: {{$i}}</h2>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exerciseText{{$i}}">Exercise name</label>
            <input type="text" class="contact_control" id="exerciseText{{$i}}" name="exerciseText{{$i}}" value="{{$exercise->text}}">
        </div>
        <div class="mb-3">
            <label for="assignment{{$i}}">Assignment</label>
            <input type="text" class="contact_control" id="assignment{{$i}}" name="assignment{{$i}}" value="{{$exercise->assignment}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="row pl-5">
            <div class="col-12">
                <h3>Exercise type:</h3>
            </div>
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-6 pl-5">
                        <label for="exType{{$i}}">Text</label>
                    </div>
                    <div class="col-6">
                        <input type="radio" value="1" name="exType{{$i}}" @if($exercise->type == "text") checked @endif>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-6 pl-5">
                        <label for="exType{{$i}}">Radio</label>
                    </div>
                    <div class="col-6">
                        <input type="radio" value="2" name="exType{{$i}}" @if($exercise->type == "radio") checked @endif>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
