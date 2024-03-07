<button type="button"
        aria-label="show notifications"
        class="font-sans text-gray-900"
        @click="open = true"
>
    <span class="sr-only">Show Notifications</span>
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M12.02 2.91c-3.31 0-6 2.69-6 6v2.89c0 .61-.26 1.54-.57 2.06L4.3 15.77c-.71 1.18-.22 2.49 1.08 2.93 4.31 1.44 8.96 1.44 13.27 0 1.21-.4 1.74-1.83 1.08-2.93l-1.15-1.91c-.3-.52-.56-1.45-.56-2.06V8.91c0-3.3-2.7-6-6-6Z" stroke="#555555" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path><path d="M13.87 3.2a6.754 6.754 0 0 0-3.7 0c.29-.74 1.01-1.26 1.85-1.26.84 0 1.56.52 1.85 1.26Z" stroke="#555555" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.02 19.06c0 1.65-1.35 3-3 3-.82 0-1.58-.34-2.12-.88a3.01 3.01 0 0 1-.88-2.12" stroke="#555555" stroke-width="1.5" stroke-miterlimit="10"></path></svg>
    @if ($unread->count() > 0)
        @if($showCount)
            <span aria-label="unread count" class="absolute top-0 left-0 aspect-square max-h-fit rounded-full border-2 bg-red-500 px-1.5 shadow leading-5 text-white font-semibold text-xs">
                {{ $unread->count() }}
            </span>
        @else
            <span aria-label="has unread notifications" class="absolute top-0 left-0 aspect-square h-2/5 rounded-full bg-red-500 shadow">
        @endif
    @endif
</button>
