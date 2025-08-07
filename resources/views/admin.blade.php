@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-container">
    <h1 class="admin-title">Admin</h1>


    <div class="admin-search-area">
        <form action="{{ route('admin.index') }}" method="GET" class="search-form">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" class="search-input">
            <select name="gender" class="search-select">
                <option value="">性別</option>
                <option value="all">全て</option>
                <option value="male">男性</option>
                <option value="female">女性</option>
                <option value="other">その他</option>
            </select>
            <select name="contact_type" class="search-select">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
            <input type="date" name="date" class="search-date">
            <button type="submit" class="search-button">検索</button>
            <a href="{{ route('admin.index') }}" class="reset-link">リセット</a>
        </form>
        <form action="{{ route('contacts.export') }}" method="GET">
            <button type="submit" class="export-button">エクスポート</button>
        </form>
    </div>


    <div class="table-and-pagination-wrapper">
        <table class="contact-table">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>
                        @if($contact->gender == 1) 男性
                        @elseif($contact->gender == 2) 女性
                        @else その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content ?? '' }}</td>
                    <td>
                        <button class="detail-button" data-bs-toggle="modal" data-bs-target="#modal-{{ $contact->id }}">
                            詳細
                        </button>
                    </td>
                </tr>


                <div class="modal fade" id="modal-{{ $contact->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">お問い合わせ詳細</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-item">
                                    <p class="modal-label">お名前</p>
                                    <p class="modal-data">{{ $contact->last_name }} {{ $contact->first_name }}</p>
                                </div>
                                <div class="modal-item">
                                    <p class="modal-label">性別</p>
                                    <p class="modal-data">
                                        @if($contact->gender == 1) 男性
                                        @elseif($contact->gender == 2) 女性
                                        @else その他
                                        @endif
                                    </p>
                                </div>
                                <div class="modal-item">
                                    <p class="modal-label">メールアドレス</p>
                                    <p class="modal-data">{{ $contact->email }}</p>
                                </div>
                                <div class="modal-item">
                                    <p class="modal-label">電話番号</p>
                                    <p class="modal-data">{{ $contact->tel }}</p>
                                </div>
                                <div class="modal-item">
                                    <p class="modal-label">住所</p>
                                    <p class="modal-data">{{ $contact->address }}</p>
                                </div>
                                <div class="modal-item">
                                    <p class="modal-label">建物名</p>
                                    <p class="modal-data">{{ $contact->building }}</p>
                                </div>
                                <div class="modal-item">
                                    <p class="modal-label">お問い合わせの種類</p>
                                    <p class="modal-data">{{ $contact->category->content ?? '' }}</p>
                                </div>
                                <div class="modal-item message-content">
                                    <p class="modal-label">お問い合わせ内容</p>
                                    <p class="modal-data">{{ $contact->detail }}</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">削除</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>


        <div class="pagination">
            {{ $contacts->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
