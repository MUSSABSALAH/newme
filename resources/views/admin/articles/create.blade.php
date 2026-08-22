<x-layouts.admin :title="__('articles.create_title')" :heading="__('articles.create_title')" :subtitle="__('articles.subtitle')">
    @include('admin.articles._form', [
        'action' => route('admin.articles.store'),
        'method' => 'POST',
        'article' => null,
    ])
</x-layouts.admin>
