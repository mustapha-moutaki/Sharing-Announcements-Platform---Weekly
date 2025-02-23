<div id="comment-section-{{ $annonce->id }}" class="mt-4 hidden">
    <h4 class="font-bold text-lg">Comments:</h4>
    <ul class="space-y-2 mt-2">
        @forelse ($annonce->comments as $comment)
            <li class="bg-gray-100 p-3 rounded-lg flex justify-between items-center">
                <div class="flex-1">
                    {{ $comment->content }}
                </div>

                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline ml-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 text-lg transition-all duration-300">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>
            </li>
        @empty
            <p class="text-gray-500">There are no comments yet</p>
        @endforelse
    </ul>

    <div class="mt-4">
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
            <textarea name="content" id="content" required class="w-full p-2 border rounded-lg" placeholder="Add a comment..."></textarea>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-2">Send</button>
        </form>
    </div>
</div>
