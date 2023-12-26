<div class="table-responsive">

	Total Records : {{count($users)}}

	<!-- Total Recors : {{count($users)}} -->

	<table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                	<th><input type="checkbox" id="selectAll" onclick="checkList('userBody')" autocomplete="off"></th>
                  <th>S. No.</th>
                  @if(userType()->user_type==1)
                  <th>Created By</th>
                  @endif
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Status</th>
                  <th>Auth Type</th>
                  <th>Created</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody id="userBody">
                	@if($rect == 2)
                  <?php $i=$users->perPage() * ($users->currentPage() - 1); $i=$i+1; ?>
                  @endif
                @forelse($users as $us)
                  <tr>
                  	<td><input type="checkbox" id="master" name="master" value="{{$us->id}}" autocomplete="off"></td>
                    <td>
                    	@if($rect == 2)
                    	{{$i++}}
                    	@else
                    	{{$loop->index+1}}
                    	@endif
                    </td>
                    @if(userType()->user_type==1)
                  <td>{{$us->first_name ?? Config::get('site.unauthourised')}}</td>
                  @endif
                    <td>
                    {{ucwords($us->name)}}
                    </td>
                    <td>
                      {{$us->email}}
                    </td>
                    <td>
                      {{$us->mobile}}
                    </td>
                    <td>
                  @foreach(Config::get('site.status') as $sk=>$sv)
                     @if($sk==$us->status)
                     {{$sv}}
                     @endif
                     @endforeach
                    </td>
                    <td>
                      {{ucwords($us->auth_type)}}
                    </td>
                      <td>{{dateFm2($us->created_at)}}</td>
                      <td>
                        <!-- <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-user/'.$us->id)}}"><i class="fa fa-edit"></i> Edit</a> -->
                        <a class="btn btn-primary btn-sm" onclick="updateUser('{{$us->id}}','userModal','edit-user-info','formBody','updateUserForm')"><i class="fa fa-edit"></i> Edit </a>
                          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-user/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                      
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                 @endforelse
          
              </table>
               @if($rect == 2)
              {{$users->links('pagination.paginate')}}
              @endif
</div>