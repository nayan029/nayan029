<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="POST" id="edit_form" action="{{URL::to('/')}}/admin/enquiry/{{$data->id}}">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="form-group">
                <label for="" class="col-form-label">Status</label><span style="color:red;"> *</span>
                <select value="" class="form-control" id="status" name="status">
                    <option name="" id="" value="">Select Status</option>
                    <option name="" id="" value="2">Call Not Recived</option>
                    <option name="" id="" value="1">Close</option>
                </select>
                <span style="color: red;" id="status_error"></span>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Message</label>
                <input type="text" name="feedback" class="form-control" id="feedback" maxlength="250">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
    </div>
</div>