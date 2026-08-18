@extends('admin.layouts.app')

@section('title', 'Blog Yazıları')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h2 class="fw-bold text-navy mb-1">Blog Yazıları</h2>
        <p class="text-secondary small mb-0">Lojistik ve satış rehberi makaleleri, SEO içerikleri.</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-teal">
        <i class="bi bi-plus-lg me-1"></i> Yeni Yazı Ekle
    </a>
</div>

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th>BAŞLIK & SLUG</th>
                    <th>KATEGORİ</th>
                    <th>YAZAR</th>
                    <th>YAYIN TARİHİ</th>
                    <th>DURUM</th>
                    <th class="text-end">İŞLEM</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>
                            <div class="fw-bold text-navy">{{ $post->title }}</div>
                            <small class="text-muted"><code>/blog/{{ $post->slug }}</code></small>
                        </td>
                        <td>
                            <span class="badge bg-light text-secondary border font-monospace">{{ $post->category ?: 'Genel' }}</span>
                        </td>
                        <td class="small text-secondary">{{ $post->author ?: 'Fatih PEK' }}</td>
                        <td class="small text-muted">
                            {{ $post->published_at ? $post->published_at->format('d.m.Y H:i') : 'Taslak' }}
                        </td>
                        <td>
                            @if($post->is_active)
                                <span class="badge bg-light text-success border">Yayında</span>
                            @else
                                <span class="badge bg-light text-muted border">Taslak</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-outline-dark me-1" style="border-radius: 8px;">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu blog yazısını silmek istediğinize emin misiniz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Kayıtlı blog yazısı bulunamadı.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
