
              <table>
                <thead>
                <tr>
                  
                  <th>Sno</th>
                  <th>From</th>
                  <th>To</th> 
                  <th>Subject</th>
                  <th>Name of the financial creditor</th>
                  <th>Identification number of financial creditor</th>
                  <th>Address of financial Creditor for correspondence.</th>
                  <th>Email Address</th>
                  <th>Principle</th>
                  <th>Interest</th>
                  <th>Total Amount</th>
                  <th>Details of documents by references to which can be substantiated.</th>
                  <th>Details of how and when debt incurred</th>
                  <th>Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim</th>
                  <th>Details of any security held, the value of the security, and the date it was given</th>
                  <th>Account Number</th>
                  <th>Bank Name</th>
                  <th>IFSC Code</th>
                  <th>Name of the insolvency professional who will act as the Authorised representative of creditors of the class</th>

                </tr>
                </thead>
                <tbody>
                  @forelse($data as $uc)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>
                        {{ucwords($uc->fc_name)}}
                    </td>
                    <td>
                    {{$uc->ip_name}}, {{$uc->ip_address}}
                  </td>
                    <td>Submission of claim and proof of claim.</td>
                    
                    <td>{{$uc->fc_name}}</td>
                    <td>{{$uc->fc_identification_number}}</td>
                    <td>{{$uc->fc_address}}</td>
                    <td>{{$uc->fc_email}}</td>
                    <td>{{$uc->claim_principle}}</td>
                    <td>{{$uc->claim_interest}}</td>
                    <td>{{$uc->claim_amt}}</td>
                    <td>{{$uc->document_details}}</td>
                    <td>{{$uc->debt_incurred_details}}</td>
                    <td>{{$uc->other_mutual_details}}</td>
                    <td>{{$uc->security_held}}</td>
                    <td>{{$uc->bank_account_number}}</td>
                    <td>{{$uc->bank_name}}</td>
                    <td>{{$uc->bank_ifsc_code}}</td>
                    <td>{{$uc->insolvency_professional_name}}</td>
                  </tr>
                  @empty
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                 
                @endforelse
                </tbody>
              </table>
          