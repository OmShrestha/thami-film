<div class="modal fade" id="createPointModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form id="ajaxForm" class="modal-form" action="{{route('admin.approach.point.store')}}" method="POST">
           <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Point</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
           </div>
           <div class="modal-body">
              <div class="row">
                 <div class="col-lg-12">
                    @csrf
                    <div class="form-group">
                        <label for="">Language **</label>
                        <select name="language_id" class="form-control">
                            <option value="" selected disabled>Select a language</option>
                            @foreach ($langs as $lang)
                                <option value="{{$lang->id}}">{{$lang->name}}</option>
                            @endforeach
                        </select>
                        <p id="errlanguage_id" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                       <label for="">Icon **</label>
                       <div class="btn-group d-block">
                          <button type="button" class="btn btn-primary iconpicker-component"><i
                             class="fa fa-fw fa-heart"></i></button>
                          <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                             data-selected="fa-car" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu"></div>
                       </div>
                       <input id="inputIcon" type="hidden" name="icon" value="fas fa-heart">
                       <div class="mt-2">
                          <small>NB: click on the dropdown sign to select an icon.</small>
                       </div>
                    </div>

                    @if ($bs->theme_version == 'cleaning')
                        <div class="form-group">
                            <label for="">Color **</label>
                            <input type="text" class="form-control jscolor" name="color" value="39498a">
                            <p id="errcolor" class="mb-0 text-danger em"></p>
                        </div>
                    @endif

                    <div class="form-group">
                       <label for="">Title **</label>
                       <input type="text" class="form-control" name="title" value="" placeholder="Enter Title">
                       <p id="errtitle" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                       <label for="">Short Text **</label>
                       <input type="text" class="form-control" name="short_text" value="" placeholder="Enter Short Text">
                       <p id="errshort_text" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                      <label for="">Serial Number **</label>
                      <input type="number" class="form-control ltr" name="serial_number" value="" placeholder="Enter Serial Number">
                      <p id="errserial_number" class="mb-0 text-danger em"></p>
                      <p class="text-warning"><small>The higher the serial number is, the later the point will be shown in approach section.</small></p>
                    </div>
                 </div>
              </div>
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button id="submitBtn" type="submit" class="btn btn-success">Submit</button>
           </div>
         </form>
      </div>
   </div>
</div>
