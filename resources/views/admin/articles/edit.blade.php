<x-layouts.admin :title="__('articles.edit_title')" :heading="__('articles.edit_title')" :subtitle="__('articles.subtitle')">
    @include('admin.articles._form', [
        'action' => route('admin.articles.update', $article),
        'method' => 'PUT',
        'article' => $article,
    ])
</x-layouts.admin>
