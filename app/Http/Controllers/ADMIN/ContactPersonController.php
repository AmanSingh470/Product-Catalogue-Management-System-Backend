<?php
namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Services\admin\ContactPersonService;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ContactPersonController extends Controller
{
    protected $service;

    public function __construct(ContactPersonService $service)
    {
        $this->service = $service;
    }

    public function ContactPersonData()
    {
        $stats          = $this->service->getContactPersonsStats();
        $contactPersons = $this->service->getContactPersons();
        $companies      = $this->service->getCompanies();

        return view('admin.company_contact_person.index', [
            'username'       => 'Aman',
            'stats'          => $stats,
            'contactPersons' => $contactPersons,
            'companies'      => $companies,
        ]);
    }

    public function createContactPerson()
    {
        $validator = Validator::make(request()->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email'],
            'function' => ['required', 'string'],
            'company'  => ['required', 'integer', 'exists:companies,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $contactPerson = $this->service->createContactPerson($data);

            return response()->json([
                'message' => 'Contact Person created successfully.',
                'data'    => $contactPerson,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

    public function getSingleContactPerson()
    {
        $id            = request()->route('id');
        $contactPerson = $this->service->getSingleContactPerson($id);
        return $contactPerson;
    }

    public function updateContactPerson()
    {
        $id        = request()->route('id');

        $validator = Validator::make(request()->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email'],
            'function' => ['required', 'string'],
            'company'  => ['required', 'integer', 'exists:companies,id'],            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $contactPerson = $this->service->editContactPerson($id, $data);

            return response()->json([
                'message' => 'Contact Person edited successfully.',
                'data'    => $contactPerson,
            ], 201);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

    public function deleteContactPerson()
    {
        $id = request()->route('id');

        try {

            $this->service->deleteContactPerson($id);

            return response()->json([
                'message' => 'Contact person deleted successfully.',
            ], 200);

        } catch (Throwable $th) {

            return response()->json([
                'message' => 'Some error occurred.',
            ], 500);
        }
    }

}
