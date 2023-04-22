<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\company;
use App\Exports\DataExport;
// use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function export(string $id)
    {
        // $company=company::find($id);

        // $dataExport = new DataExport($id);
        // $fileName = $company->UrlName .'_data_'.Carbon::now()->format('Y-m-d-H:i:s').'.xlsx';
        // // $fileName='dd.xlsx';
        // // dd($fileName);
        // // Generate the Excel file and store it in a temporary location
        // Excel::store($dataExport, $fileName, 'temp');

        // // Get the file path of the stored Excel file
        // $tempFilePath = storage_path('app/temp/' . $fileName);

        // // Create a response and set the appropriate headers for file download
        // // return response()->download($tempFilePath, $fileName, [], 'inline');
        // $filePath = 'temp/' . $fileName; // Update the path based on your storage directory structure
        // $storagePath = storage_path('app/' . $filePath);
        // // dd(!Storage::exists($filePath));
        // if (!Storage::exists($filePath)) {
        //     abort(404, 'File not found');
        // }

        // $mimeType = Storage::mimeType($filePath);
        // $headers = [
        //     'Content-Type' => $mimeType,
        //     'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        // ];

        // return response()->download($storagePath, $fileName, $headers);
        $company = company::find($id);

        $dataExport = new DataExport($id);
        $fileName = $company->UrlName . '_data_' . Carbon::now()->format('Y-m-d-H-i-s') . '.xlsx';
        // dd($fileName);
        // Generate the Excel file and store it in a temporary location
        Excel::store($dataExport, 'temp/' . $fileName);

        // Get the file path of the stored Excel file
        $tempFilePath = storage_path('app/temp/' . $fileName);

        // Check if the file exists
        if (!Storage::exists('temp/' . $fileName)) {
            abort(404, 'File not found');
        }

        $mimeType = Storage::mimeType('temp/' . $fileName);
        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        return response()->download($tempFilePath, $fileName, $headers);



                // $data = DB::table('data')
                //     ->select('id', 'data_1', 'data_2', 'data_3')
                //     ->where('company_id', '=', $id)
                //     ->get();

                // $spreadsheet = new Spreadsheet();
                // $sheet = $spreadsheet->getActiveSheet();
                // $sheet->setCellValue('A1', 'ID');
                // $sheet->setCellValue('B1', 'Data 1');
                // $sheet->setCellValue('C1', 'Data 2');
                // $sheet->setCellValue('D1', 'Data 3');
                // $row = 2;
                // foreach ($data as $row_data) {
                //     $sheet->setCellValue('A' . $row, $row_data->id);
                //     $sheet->setCellValue('B' . $row, $row_data->data_1);
                //     $sheet->setCellValue('C' . $row, $row_data->data_2);
                //     $sheet->setCellValue('D' . $row, $row_data->data_3);
                //     $row++;
                // }
                // $writer = new Xlsx($spreadsheet);
                // $filename = 'data.xlsx';
                // $writer->save($filename);
                // return response()->download($filename)->deleteFileAfterSend();



    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        if($request->hasFile('DocumentFile'))
        {
            $LogoPath=$request->file('DocumentFile')->store('Logos','public');

            $Ad1Path=$request->file('DocumentAd1')->store('Adverts','public');
            $Ad2Path=$request->file('DocumentAd2')->store('Adverts','public');
            $Ad3Path=$request->file('DocumentAd3')->store('Adverts','public');

            $validatedData = $request->validate([
                'CompanyName' => 'required|string',
                'UrlName' => 'required|string|unique:companies',

            ]);

            $data=[$LogoPath,$Ad1Path,$Ad2Path,$Ad3Path,$validatedData];

            $company=new company([
                'name' => $validatedData['CompanyName'],
                'UrlName' => $validatedData['UrlName'],
                'type' => $request['CompanyType'][0],
                'logo' => $LogoPath,
                'ad_1' => $Ad1Path,
                'ad_2' => $Ad2Path,
                'ad_3' => $Ad3Path,
            ]);

            $company->save();
            return redirect()->route('Dashboard');
        }
    }

    public function ShowAll()
    {
        if(Auth('admin')->check())
        {
            $companies=company::all();
            return view('ADMIN.Companeis',['companies'=>$companies]);
        }else{
            return view('ADMIN.Login');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function ShowEdit(string $id)
    {
        $company=company::find($id);
        return view('ADMIN.EditCompany',['company'=>$company]);
    }

    public function showData(string $id)
    {
        $company=company::find($id);
        $data=DB::table('data')->select('*')
        ->where('company_id','=',$id)->get();

        return view('ADMIN.CompanyData',['company'=>$company,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)

    {
    $brand = company::find($id);
// dd($request);
    if (!$brand) {
        return response()->json(['message' => 'Brand not found'], 404);
    }

    $validatedData = $request->validate([
        'CompanyName' => 'string|unique:companies,name,' . $id,
        'CompanyType' => 'string',
        'logo'=>'string',
        'ad1'=>'string',
        'ad2'=>'string',
        'ad3'=>'string',

    ]);


    $brand->name = $validatedData['CompanyName'];
    $brand->type = $validatedData['CompanyType'];

    // Handle ad_1

    if ($request->hasFile('DocumentAd1')) {
        Storage::delete($brand->ad_1);

            Storage::delete($brand->ad_1);
            $ad1Path = $request->file('DocumentAd1')->store('Adverts','public');
            $brand->ad_1 = $ad1Path;

    } else {
        $brand->ad_1=$validatedData['ad1'];
    }

    // Handle ad_2

    if ($request->hasFile('DocumentAd2')) {
        Storage::delete($brand->ad_2);

            Storage::delete($brand->ad_2);
            $ad2Path = $request->file('DocumentAd2')->store('Adverts','public');
            $brand->ad_2 = $ad2Path;

    } else {
        $brand->ad_2=$validatedData['ad2'];
    }

    // Handle ad_3

    if ($request->hasFile('DocumentAd3')) {
        Storage::delete($brand->ad_3);

            Storage::delete($brand->ad_3);
            $ad1Path = $request->file('DocumentAd3')->store('Adverts','public');
            $brand->ad_3 = $ad1Path;

    } else {
        $brand->ad_3=$validatedData['ad3'];
    }

    // Handle logo

    if ($request->hasFile('DocumentLogo')) {
        Storage::delete($brand->logo);

            Storage::delete($brand->logo);
            $logoPath = $request->file('DocumentLogo')->store('Logos','public');
            $brand->logo = $logoPath;

    } else {
        $brand->logo=$validatedData['logo'];
    }


    $brand->save();

    return response()->json(['message' => 'Brand updated successfully', 'brand' => $brand], 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company=company::find($id);
        $company->delete();

    }
}
