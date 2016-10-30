			<div class="btn-group">
              <button type="button" class="btn btn-default"><i class="fa fa-refresh"></i></button>
              <a href = "/company/{{$Company->oldestRecord()}}" class="btn btn-default"><i class="fa fa-backward"></i></a>
              <a href = "/company/{{$Company->previousRecord()}}" class="btn btn-default"><i class="fa fa-step-backward"></i></a>
              <a href = "/company/{{$Company->nextRecord()}}"  class="btn btn-default"><i class="fa fa-step-forward"></i></a>
              <a href = "/company/{{$Company->newestRecord()}}"  class="btn btn-default"><i class="fa fa-forward"></i></a>
              <button id = 'getCompany_newRecord' type="button" class="btn btn-default"><i class="fa fa-plus"></i></button>
              <button type="submit" class="btn btn-default"><i class="fa fa-save"></i></button>
              <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i></button>
            </div>