<!-- Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply topic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="{{route('student.title.select')}}">
                {{ csrf_field() }}

                <div class="modal-body">
                        <input type="hidden" name="title_id" id="titleMk">

                        <div class="form-check-inline">
                            <label for="titleMark1">
                                <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="1"  checked @if($apply->has(1)) disabled @endif>
                                <label class="form-check-label" for="titleMark1">First choice</label>
                            </label>
                        </div>
                        <br/>

                        <div class="form-check-inline">
                            <label for="titleMark2">
                                <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="2" checked @if($apply->has(2)) disabled @endif>
                                <label class="form-check-label" for="titleMark2">Second Choice</label>
                            </label>
                        </div>
                        <br/>
                        <div class="form-check-inline">
                            <label for="titleMark3">
                                <input class="form-check-input" type="radio" name="preferenceOrder" id="preferenceOrder" value="3" checked @if($apply->has(3)) disabled @endif>
                                <label class="form-check-label" for="titleMark3">Third Choice</label>
                            </label>
                        </div>
                        <br/>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>