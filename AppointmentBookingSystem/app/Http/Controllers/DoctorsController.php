<?php
namespace App\Http\Controllers;
use App\Http\Requests\DoctorRequest;
use App\Models\User;
use App\Models\Doctors;
use App\Models\Education;
use App\Models\Experience;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctors::all();
        return view('doctors.index', compact('doctors'));
    }
    public function create()
    {
        return view('doctors.create');
    }
    public function store(DoctorRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

        $validatedData['user_id'] = $user->id;
        $doctor = Doctors::create($validatedData);

        $validatedData['doctors_id']=$doctor->id;

        $educationData = Education::where('doctors_id',$doctor->id)->get();
        foreach($validatedData['institution'] as $key => $item){
            $educationData[$key] = [
                'doctors_id' => $doctor->id,
                'institution' => $validatedData['institution'][$key],
                'level' => $validatedData['level'][$key],
                'board' => $validatedData['board'][$key],
                'completion_year' => $validatedData['completion_year'][$key],
                'gpa' => $validatedData['gpa'][$key],
         ];
        Education::create($educationData[$key]);
        }
        $experienceData = Experience::where('doctors_id',$doctor->id)->get();
        foreach($validatedData['organization'] as $key => $item){
            $experienceData[$key] = [
                'doctors_id' => $doctor->id,
                'organization' => $validatedData['organization'][$key],
                'position' => $validatedData['position'][$key],
                'job_description' => $validatedData['job_description'][$key],
                'start_date' => $validatedData['start_date'][$key],
                'end_date' => $validatedData['end_date'][$key],
         ];
        Experience::create($experienceData[$key]);
        }
        return redirect()->route('doctors.index')->with('success', 'Doctor registered successfully.');
    }


    public function edit(Doctors $doctor)
    {
        $education = $doctor->education;
        $experience = $doctor->experience;
        return view('doctors.edit', compact('doctor', 'education','experience'));
    }
    public function update(DoctorRequest $request, Doctors $doctor)
    {
        $validatedData = $request->validated();
        $doctor->user->update($validatedData);
            $educationData = Education::where('doctors_id', $doctor->id)->get();
           foreach ($validatedData['institution'] as $key => $item) {
                $educationData[$key]->update([
                    'institution' => $validatedData['institution'][$key],
                    'level' => $validatedData['level'][$key],
                    'board' => $validatedData['board'][$key],
                    'completion_year' => $validatedData['completion_year'][$key],
                    'gpa' => $validatedData['gpa'][$key],
                ]);
            }
            $experienceData = Experience::where('doctors_id', $doctor->id)->get();
            foreach ($validatedData['organization'] as $key => $item) {
                $experienceData[$key]->update([
                    'organization' => $validatedData['organization'][$key],
                    'position' => $validatedData['position'][$key],
                    'job_description' => $validatedData['job_description'][$key],
                    'start_date' => $validatedData['start_date'][$key],
                    'end_date' => $validatedData['end_date'][$key],
                ]);
            }
        $doctor->update($validatedData);
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function delete(Doctors $doctor)
    {
       $doctor->user->delete();
       $doctor->delete();
       return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}


