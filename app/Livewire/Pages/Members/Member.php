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

        sleep(2);


        $validated = $this->validate();

        $existedMember = Customer::where('fname', $validated['fname'])
                    
                                 ->first();

        if ($existedMember) {
            Toaster::error('Mteja ' . $validated['fname'] . ' Hawezi kusajiliwa tena tayari yupo kwenye mfumo!'); // 👈
            return redirect()->back();
        }

        if (isset($this->img)) {
          
            $filePath = $this->img->store('passports', 'public');
    
           
            $validated['img'] = $filePath; 
        }

        Customer::create($validated);
      $this->reset('fname','nickname','phone','gender','img');
        Toaster::success('Umefanikiwa kumsajili!' .$validated['fname']. ' '); // 👈
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








    public function render()
    {

        $members = Customer::latest()
            ->where('fname', 'like', "%{$this->search}%")

            ->orWhere('nickname', 'like', "%{$this->search}%")
            ->paginate(3);

           

        return view('livewire.pages.member', ['members' => $members]);
    }
}
