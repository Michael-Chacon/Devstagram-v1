<div>
    <div class="mt-10 bg-white shadow md-5 rounded max-h-96 overflow-y-scroll">
        @if ($post->comentarios->count())
            @foreach ($post->comentarios as $comentario)
                <div class="flex justify-center items-center">
                    <div class="p-5 border-gray-300 border-b flex-1">
                        <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                            {{ $comentario->user->username }}
                        </a>
                        <p class="">
                            {{ $comentario->comentario }}
                        </p>
                        <small class="text-gray-500">
                            {{ $comentario->created_at->diffForHumans() }}
                        </small>
                    </div>
                    <div class="mr-5">
                        <button wire:click="$emit('eliminarComentario', {{ $comentario->id; }})" class="hover:text-red-500 curson-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        @else
            <p class="p-10 text-center">No hay comentarios aún</p>
        @endif
    </div>
</div>
