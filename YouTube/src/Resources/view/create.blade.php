@php
    $locales = app('Webkul\Core\Repositories\LocaleRepository')->getActiveLocales();
@endphp

<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('youtube::app.youtube.create.title')
    </x-slot>

    <!-- Create Attributes Vue Components -->
    <v-create-youtube :locales="{{ $locales->toJson() }}"></v-create-youtube>

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-create-youtube-template"
        >

            {!! view_render_event('unopim.admin.youtube.create.before') !!}

            <!-- Input Form -->
            <x-admin::form
                :action="route('admin.youtube.store')"
                enctype="multipart/form-data"
            >

                {!! view_render_event('unopim.admin.youtube.create.create_form_controls.before') !!}

                <!-- actions buttons -->
                <div class="flex justify-between items-center">
                    <p class="text-xl text-gray-800 dark:text-slate-50 font-bold">
                        @lang('youtube::app.youtube.create.title')
                    </p>

                    <div class="flex gap-x-2.5 items-center">
                        <!-- Cancel Button -->
                        <a
                            href="{{ route('admin.youtube.index') }}"
                            class="transparent-button"
                        >
                            @lang('youtube::app.youtube.create.back-btn')
                        </a>

                        <!-- Save Button -->
                        <button
                            type="submit"
                            class="primary-button"
                        >
                            @lang('youtube::app.youtube.create.save-btn')
                        </button>
                    </div>
                </div>

                <!-- body content -->
                <div class="flex gap-2.5 mt-3.5">

                    {!! view_render_event('unopim.admin.youtube.card.url.before') !!}

                    <!-- Left sub Component -->
                    <div class="flex flex-col gap-2 flex-1 overflow-auto">
                        <!-- General -->
                        <div class="p-4 bg-white dark:bg-cherry-900 box-shadow rounded">
                            <p class="mb-4 text-base text-gray-800 dark:text-white font-semibold">
                                @lang('youtube::app.youtube.create.general')
                            </p>

                            <!-- Attribute  Group Code -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('youtube::app.youtube.create.name')
                                </x-admin::form.control-group.label>

                                <v-field
                                    type="text"
                                    name="name"
                                    rules="required"
                                    value="{{ old('name') }}"
                                    v-slot="{ field }"
                                    label="{{ trans('youtube::app.youtube.create.name') }}"
                                >
                                    <input
                                        type="text"
                                        id="name"
                                        class="flex w-full min-h-[39px] py-2 px-3 border rounded-md text-sm text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400 dark:hover:border-gray-400 dark:focus:border-gray-400 focus:border-gray-400 dark:bg-cherry-800 dark:border-gray-800"
                                        name="name"
                                        v-bind="field"
                                        placeholder="{{ trans('youtube::app.youtube.create.name') }}"
                                        v-name
                                    >
                                </v-field>

                                <x-admin::form.control-group.error control-name="name" />
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('youtube::app.youtube.create.url')
                                </x-admin::form.control-group.label>
                                <v-field
                                    type="text"
                                    name="url"
                                    rules="required"
                                    value="{{ old('url') }}"
                                    v-slot="{ field }"
                                    label="{{ trans('youtube::app.youtube.create.url') }}"
                                >
                                    <input
                                        type="text"
                                        id="url"
                                        class="flex w-full min-h-[39px] py-2 px-3 border rounded-md text-sm text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400 dark:hover:border-gray-400 dark:focus:border-gray-400 focus:border-gray-400 dark:bg-cherry-800 dark:border-gray-800"
                                        name="url"
                                        v-bind="field"
                                        placeholder="{{ trans('youtube::app.youtube.create.url') }}"
                                        v-url
                                    >
                                </v-field>

                                <x-admin::form.control-group.error control-name="url" />
                            </x-admin::form.control-group>
                        </div>

                    </div>

                    {!! view_render_event('unopim.admin.youtube.create.card.label.after') !!}

                    {!! view_render_event('unopim.admin.youtube.card.general.before') !!}

                    <!-- Right sub-component -->
                    <div class="flex flex-col gap-2 w-[360px] max-w-full">

                    </div>

                    {!! view_render_event('unopim.admin.youtube.create.card.general.after') !!}

                </div>

                {!! view_render_event('unopim.admin.youtube.create_form_controls.after') !!}
            </x-admin::form>

            {!! view_render_event('unopim.admin.youtube.create.after') !!}

        </script>

        <script type="module">
            app.component('v-create-youtube', {
                template: '#v-create-youtube-template',

                props: ['locales'],
            });
        </script>
    @endPushOnce
</x-admin::layouts>
