<h1>Articles</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Article Name</th>
            <th>Author</th>
            <th>Created at</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @forelse ($articles as $article)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $article->article_name }}</td>
                <td>{{ $article->author }}</td>
                <td>{{ $article->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="4">No data found</td>
            </tr>
        @endforelse
    </tbody>
</table>

