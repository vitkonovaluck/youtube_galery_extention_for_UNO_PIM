<x-admin::layouts>
    <x-slot:title>
        @lang('youtube::app.youtube.index.title')
    </x-slot>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <!-- Title -->
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('youtube::app.youtube.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            @if (bouncer()->hasPermission('youtube.create'))
                <a href="{{route('admin.youtube.create')}}">
                    <div class="primary-button">
                        @lang('youtube::app.youtube.index.add-btn')
                    </div>
                </a>
            @endif
        </div>
    </div>

    {!! view_render_event('unopim.admin.youtube.list.before') !!}

    <x-admin::datagrid :src="route('admin.youtube.index')" />

    {!! view_render_event('unopim.admin.youtube.list.before') !!}

</x-admin::layouts>

