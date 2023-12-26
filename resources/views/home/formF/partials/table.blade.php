 @forelse($other_files as $fl)
                <tr id="row{{$loop->index+1}}">
                     @php $tbl= Config::get('site.formCOtherDoc'); @endphp
                     <td><input type='text' placeholder='enter document name' value="{{$fl->document_name}}" name="other_doc[]" autocomplete="off"></td>
                  <td><input type='file' name="other_doc_file[]" onchange="updateFile('financialCreditorFormF','/update-formf-file','{{$fl->id}}','{{$loop->index}}', '{{$tbl}}')">
                    <input type="hidden" name="other_doc_id[]" value="{{$fl->id}}">
                    <input type="hidden" name="other_doc_file_old[]" id="other_doc_file_old" value="{{$fl->file}}">
                  </td>  
                  <td> <button class="btn btn-primary btn-sm" type="button" id="addMore" onclick="myFunction()">Add More</button>
              <button class="btn btn-primary btn-sm" type="button" id="deleteRowBtn{{$loop->index+1}}" onclick="del('{{$loop->index+1}}', '{{$fl->id}}', '/remove-formf-data', 'deleteRowBtn', 'financialCreditorFormF', 'errMessage_4')">Delete Row</button></td>
                </tr>
                @empty
                <tr id="row1">
                     <td><input type='text' placeholder='enter document name' name="other_doc[]" autocomplete="off"></td>
                  <td><input type='file' name="other_doc_file[]"></td>  
                  <input type="hidden" name="other_doc_id[]" value="">
                    <input type="hidden" name="other_doc_file_old[]" id="other_doc_file_old" value="">
                  <td> <button class="btn btn-primary btn-sm" type="button" id="addMore" onclick="myFunction()">Add More</button>
              <button class="btn btn-primary btn-sm" type="button" onclick="del('1')">Delete Row</button></td>
                </tr>
                @endforelse

