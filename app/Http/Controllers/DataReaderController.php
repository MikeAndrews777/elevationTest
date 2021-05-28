<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DataReaderController extends Controller
{

    public function show()
    {
        // Basic Homepage

        return view('basic');
    }


    public function upload(Request $request)
    {
        // Upload file into local storage, and sends data to be formatted

        $request->validate([
        'file' => 'required|mimes:txt|max:512',
         ]);

        $fileName = time().'.'.$request->file->extension();

        Storage::disk('local')->putFileAs('', $request->file('file'), $fileName);

        $fileContentArray = explode(PHP_EOL, Storage::disk('local')->get($fileName));

        $data = [];

        // Sends file to be formatted correctly
        foreach($fileContentArray as $fileContent){
            $data[] = $this->massageContent($fileContent);
        }

        return back()
            ->with('success','You have successfully uploaded your file.')
            ->with('file',$fileName)
            ->with('data', $data);

    }


    private function massageContent($lineOfData)
    {
        $lineOfData = str_replace(array('\'', '"'), '', $lineOfData);
        $eachPart = explode(';', $lineOfData);

        $cleanData = array(
            'AccountNumber' => $this->getAccountNumber($eachPart[0]),
            'RequestType' => $this->getRequestType($eachPart[1]),
            'AccountName' => $this->getAccountName($eachPart[2]),
            'Rate' => $this->getRate($eachPart[3]),
            'EffectiveDate' => $this->getEffectiveDate($eachPart[4]),
            'ReasonCode' => $this->getReasonCode($eachPart[5]),
            );

        return($cleanData);
    }


    private function getAccountNumber($data)
    {
        switch ($data){
          case "";
            $data = 'Error: Missing Account Number';
            break;
    }
        return ($data);
    }


    private function getRequestType($data)
    {
        switch ($data){
            case "1";
                $data = 'Active';
                break;
            case "2";
                $data = 'Inactive';
                break;
            case "3";
                $data = 'Pending';
                break;
            case "";
                $data = 'Error: Missing Request Type';
                break;
        }
        return ($data);
    }


    private function getAccountName($data)
    {
        switch ($data){
            case "";
                $data = 'Error: Missing Account Name';
                break;
        }
        return ($data);
    }


    private function getRate($data)
    {
        switch ($data){
            case "";
                $data = 'Error: Missing Rate';
                break;
        }
        return ($data);
    }


    private function getEffectiveDate($data)
    {
        switch ($data){
            case "";
                $data = 'Error: Missing Effective Date';
                break;
            default:
                $date = DateTime::createFromFormat('mdy', $data);
                $data = $date->format('d/M/Y');
        }

        return ($data);
    }


    private function getReasonCode($data)
    {
        switch ($data){
            case "X";
                $data = 'Customer Requested';
                break;
            case "R";
                $data = 'Invalid Account';
                break;
            case "P";
                $data = 'Account Pending Switch';
                break;
            case "U";
                $data = 'Utility Requested';
                break;
            case "";
                $data = 'Error: Missing Reason Code';
                break;
        }
        return ($data);
    }

}
