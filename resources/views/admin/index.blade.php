<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">


            <a class="mb-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350"
                href="{{ route('dashboard') }}">
                {{ __('Вернуться к моим заявкам') }}
            </a>
            <div class='cards flex flex-wrap gap-4'>
                @foreach ($reports as $report)
                    <div class='div-col border border-gray-500  rounded-lg p-6 mt-4'>
                        <p class="text-sm text-gray-500">Дата подачи заявки:
                            {{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y') }}</p> <br>
                        <p class="text-xl text-black font-semibold">Пользователь: {{ $report->user->fullName() }}</p>
                        <span class='text-xl font-semibold	'>Услуга: {{ $report->service->title }}</span> <br>
                        <span class='text-xl font-semibold	'>Количество участников: {{ $report->number }}</span> <br>
                        <span class='text-xl font-semibold	'>Дата и время: {{ $report->date }}
                            {{ $report->time }}</span> <br>
                        <span class='text-xl font-semibold	'>Тип оплаты: {{ $report->payment }}</span> <br>
                        <p class='text-blue-500'>{{ $report->description }}</p>
                        @if ($report->status == 'Новая')
                            <form id="form-update-{{ $report->id }}" action="{{ route('reports.update') }}"
                                method="POST">
                                <div>
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $report->id }}">
                                    <select name="status"
                                        onchange="document.getElementById('form-update-{{ $report->id }}').submit()"
                                        class="border-none rounded-xl bg-green-300 mt-3 font-medium">
                                        <option value='Новая'>Новая</option>
                                        <option value='Одобрена'>Одобрена</option>
                                        <option value='Отменена'>Отменена</option>
                                    </select>
                                </div>
                            </form>
                        @else
                            <p id="statusColor"
                                class='statusColor font-medium text-s bg-gray-300 pt-2 pb-2 pl-5 pr-5 rounded-xl	mt-3 w-min border-none'>
                                {{ $report->status }}</p>
                        @endif

                    </div>
                @endforeach
            </div>


        </div>
</x-app-layout>
