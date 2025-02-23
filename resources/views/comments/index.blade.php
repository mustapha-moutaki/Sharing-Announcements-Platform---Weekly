<div id="comment-section-{{ $annonce->id }}" class="mt-4 hidden">
                    <h4 class="font-bold text-lg">Comments:</h4>
                    <ul class="space-y-2 mt-2">
                        @forelse ($annonce->comments as $comment)
                            <li class="bg-gray-100 p-3 rounded-lg">
                                {{ $comment->content }}
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 text-sm ml-2">❌ delete</button>
                                </form>
                            </li>
                        @empty
                            <p class="text-gray-500">there is no comments yet</p>
                        @endforelse
                    </ul>

                    
                    <div class="mt-4">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                            <textarea name="content" required class="w-full p-2 border rounded-lg" placeholder="add comment ... "></textarea>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-2">send</button>
                        </form>
                    </div>
                </div>