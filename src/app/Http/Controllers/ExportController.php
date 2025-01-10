<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function export(Request $request) {
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $category_id = $request->input('category_id');
        $date = $request->input('date');
        $contacts = Contact::with('category')->KeywordSearch($keyword)->GenderSearch($gender)->CategorySearch($category_id)->DateSearch($date)->get();
        return $this->exportCSV($contacts);
    }


    public function exportCSV($contacts) {        
        // CSVデータを作成
        $csvDate = [];
        $csvDate[] = ['名前', '性別', 'メールアドレス', 'お問い合わせの種類'];//ヘッダー

        foreach($contacts as $contact) {
            $csvDate[] = [
                $contact->first_name,
                $contact->last_name,
                $contact->gender_text,
                $contact->email,
                $contact->category->content
            ];
        }

        //CSVファイルを作成
        $filename = 'contacts_' . now()->format('Ymd_His') . 'csv';
        $handle = fopen('php://temp' , 'r+');
        foreach($csvDate as $row) {
            fputcsv($handle, $row);
        }
        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        //ダウンロード用レスポンスを返す
        return Response::make($content, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename"
        ]);
    }

    
}
