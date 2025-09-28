<?php

namespace App\Livewire\Pages\Members;
use App\Exports\MemberExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class Member extends Component
{


    use WithPagination;

    use WithFileUploads;
    public $fname;
   
    public $nickname;
   
    public $img;
    public $phone = '255';
    public $gender;

    public $search;

   

   
    public $selectuserID = 0;

    protected $rules = [
        'fname' => 'required',
        'img' => 'sometimes|image|mimes:png,jpeg,jpg',
        'nickname' => 'required',
       
        'phone' => 'required',
        'gender' => 'required',
    ];

 public function save()
{
    // Validate input
    $validated = $this->validate([
        'fname'    => 'required|string|max:255',
        'nickname' => 'required|string|max:255',
        'phone'    => 'required|numeric',
        'gender'   => 'required|string',
        'img'      => 'nullable|image|max:1024', // optional, max 1MB
    ]);

    // Check if member already exists
    $existedMember = Customer::where('fname', $validated['fname'])->first();
    if ($existedMember) {
        Toaster::error("Mteja {$validated['fname']} hawezi kusajiliwa tena, tayari yupo kwenye mfumo!");
        return;
    }

    // Handle file upload if image exists
    if ($this->img) {
        $filePath = $this->img->store('passports', 'public');
        $validated['img'] = $filePath;
    }

    // Create the member
    Customer::create($validated);

    // Reset form fields
    $this->reset(['fname', 'nickname', 'phone', 'gender', 'img']);

    // Show success message
    Toaster::success('Registration completed successfully!');

    // Send welcome SMS
    $message = "Mpendwa {$validated['fname']}, karibu CHAWOTE GROUP. Tunafurahi kukuona ukiwa sehemu ya familia yetu. 🙌";
    $this->sendsms($validated['phone'], $message);
}

public function changeDelete($memberid)
{
      $this->selectuserID=$memberid;
}
public function deleteUser()
{
    if($this->selectuserID == 0)
    {
        return redirect()->back();
    }

    $user = Customer::findOrFail($this->selectuserID);
    $user->delete();
    $this->selectuserID =0;

    Toaster::success('umefanikiwa kufuta');
}

public $showModal = false;

public $member;

public function edit($id)
{
    $this->member = Customer::find($id);
    $this->fname = $this->member->fname;
    $this->phone = $this->member->phone;
    $this->nickname = $this->member->nickname;
    $this->gender = $this->member->gender;

    
}

public function update()
{
   

    $this->member->update([
        'fname' => $this->fname,
        'phone' => $this->phone,
        'nickname' => $this->nickname,
        'gender' => $this->gender,
    ]);

    $this->dispatch('member-updated', ['memberId' => $this->member->id]);
    $this->reset();
    

    Toaster::success('updated');
}


public function viewPdf()
{
    $members =Customer::all();

    $pdf = Pdf::loadView('members',['members'=>$members])
    ->setPaper('A4','Landscape');
    return response()->streamDownload(function () use ($pdf) {
        echo $pdf->stream();
        }, 'members.pdf');
}

public function DownloadX()
{
   
    return Excel::download(new MemberExport, 'members.xlsx');
    
}


   public function sendsms($phone,$massage){
    //public function sendsms(){f
    //$phone = '255628323760';
    //$massage = 'mapenzi yanauwa';
    // $api_key = '';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
    //$api_key = 'qFzd89PXu1e/DuwbwxOE5uUBn6';
    //$curl = curl_init();
    $url = "https://sms-api.kadolab.com/api/send-sms";
    $token = getenv('SMS_TOKEN');

  
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Authorization: Bearer '. $token,
      'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
      "phoneNumbers" => ["+$phone"],
      "message" => $massage
    ]));
  
  $server_output = curl_exec($ch);
  curl_close ($ch);
  
  //print_r($server_output);
  }





    public function render()
    {

        $members = Customer::latest()
            ->where('fname', 'like', "%{$this->search}%")

            ->orWhere('nickname', 'like', "%{$this->search}%")
            ->paginate(3);

           

        return view('livewire.pages.member', ['members' => $members]);
    }
}
