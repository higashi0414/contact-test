<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // 入力画面（contact.blade.php）
    public function form()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    // 確認画面（confirm.blade.php）
    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();

        // 電話番号を連結
        $inputs['tel'] = $inputs['tel_1'] . $inputs['tel_2'] . $inputs['tel_3'];

        // カテゴリー名を取得
        $category = Category::find($inputs['category_id']);
        $inputs['type'] = $category->content ?? '';

        // 入力内容（textarea）を content に
        $inputs['content'] = $inputs['detail'];

        return view('confirm', ['inputs' => $inputs]);
    }

    // 保存処理 → サンクスページへ
    public function store(Request $request)
    {
        Contact::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'gender' => $request->gender === 'male' ? 1 : ($request->gender === 'female' ? 2 : 3),
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->detail,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('thanks');
    }

    // サンクスページ
    public function thanks()
    {
        return view('thanks');
    }

    // お問い合わせ削除（管理画面から）
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.index')->with('success', 'お問い合わせを削除しました');
    }
}
