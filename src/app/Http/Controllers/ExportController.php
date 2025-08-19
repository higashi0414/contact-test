<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function export(): StreamedResponse
    {
        $contacts = Contact::all();

        $csvHeader = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ];

        $callback = function () use ($contacts) {
            $handle = fopen('php://output', 'w');

            // ヘッダー行
            fputcsv($handle, [
                '姓', '名', '性別', 'メールアドレス', '電話番号',
                '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容'
            ]);

            // 各データ行
            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name,
                    $contact->first_name,
                    $contact->gender === 1 ? '男性' : ($contact->gender === 2 ? '女性' : 'その他'),
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    optional($contact->category)->content,
                    $contact->detail,
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $csvHeader);
    }
}
