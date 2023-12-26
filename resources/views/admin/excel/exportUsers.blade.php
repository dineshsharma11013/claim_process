
              <table>
                <thead>
                <tr>
                  
                  <th style="color:red;">Name</th>
                  <th>Mobile</th>
                  <th>Email</th> 
                  <th>Address</th>
                  <th>User Name</th>
                  <th>Password</th>
                 
                </tr>
                </thead>
                <tbody>
                  @forelse($users as $uc)
                  <tr>
                    
                    <td>
                        {{ucwords($uc->name)}}
                    </td>
                    <td>
                    {{$uc->mobile}}
                  </td>
                    <td>{{$uc->email}}</td>
                    
                    <td>{{$uc->address}}</td>
                    <td>{{$uc->unique_id}}</td>
                    <td>{{$uc->password}}</td>
                    
                  </tr>
                  @empty
                  <tr><td>No Data</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                @endforelse
                </tbody>
              </table>
          