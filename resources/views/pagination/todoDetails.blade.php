  <div class="table-responsive">

  Total Records : {{count($users)}} 

  <table id="exampleTodo" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    @if(!isset($id))
                    <th>Corporate debtor Name</th>
                    @endif
                   <th>Task</th>
                    <th>Assigned To</th>

                    <th>Priority</th>

                    <th>Status</th>
                    <th>Start Date</th>
                    <th>Due Date</th>
                    <th>Description</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                  @if($rect == 2)
                    <?php $i=$users->perPage() * ($users->currentPage() - 1); $i=$i+1; ?>
                    @endif

                  @forelse($users as $us)
                    <tr>
                      <td>
                      	@if($rect == 2)
                      	{{$i++}}
                      	@else
                      	{{$loop->index+1}}
                      	@endif
                      </td>
                      @if(!isset($id))
                      <td>
                        @foreach($companies as $cm)
      @if($cm->id == $us->cirp_name)
          {{$cm->name}}
      @endif
      @endforeach
      @if($us->cirp_name == 'other')
          {{$us->comapny}}
      @endif
                      </td>
                      @endif
                      <td>
                        {{$us->task}}
                      </td>
                      <td>
                      {{$us->name}}
                      </td>
                      <td>
                        @foreach(Config::get('site.priority') as $ik=>$iv)
                        @if($ik == $us->priority)
                          {{$iv}}
                        @endif
                        @endforeach
                      </td>


                      <td>
                       @foreach(Config::get('site.task_status') as $ik=>$iv)
                       @if($us->status == $ik)
                        {{$iv}}
                       @endif
                       @endforeach

                      </td>
                      <td>{{$us->start_at ? dateFm2($us->start_at) : dateFm2($us->start_date)}}</td>
                      <td>{{$us->end_at ? dateFm2($us->end_at) : dateFm2($us->end_date)}}</td>
                        <td>{{ $us->message }}</td>
                        <td>
                          <a href="javascript:void(0)" data-toggle="modal" onclick="getDetails('{{$us->id}}', '/get-todo-info/', 'getDetails')" data-target="#myModal" id="export" class="btn bg-orange btn-sm" ><i class="fa fa-eye"></i></a>
                          
                          @if(isset($id))
                          <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-assign-task/'.$us->id.'/'.$id)}}"><i class="fa fa-edit"></i></a>
                          @else
                          <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-assign-task/'.$us->id)}}"><i class="fa fa-edit"></i></a>
                          @endif

                            <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-assign-task/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i></a>

                            <!-- <a class="{{Config::get('site.viewDataBtn')}}" href="{{url(admin().'/detail-assign-task/'.$us->id)}}"><i class="fa fa-eye"></i> Details</a>
                             -->
                        </td>


                    </tr>
                   @empty

                   <tr><td>{{Config::get('site.no_data')}}</td>

                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    @if(!isset($id))
                    <td></td>
                    @endif
                  </tr>

                   @endforelse

                </table>
                @if($rect == 2)

                {{$users->links('pagination.paginate')}}
                @endif

  </div>
