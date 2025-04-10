<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold py-5">{{ __('Заявка на бронирование арены') }}</h2>
    </x-slot>

    <form class="mx-auto max-w-2xl p-4 md:p-5 space-y-4 flex flex-col gap-5" method="POST"
      action="{{ route('reports.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col gap-5">
        <div>
            <x-input-label for="service_id" :value="__('Выберите услугу')" />
            <select id="service_id" name="service_id" class="block mt-1" required>
                <option value="" disabled {{ is_null($selectedId) ? 'selected' : '' }}>-- Выберите услугу --</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $service->id == $selectedId ? 'selected' : '' }}>
                        {{ $service->title }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('service_id')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="date" :value="__('Дата')" />
            <x-text-input id="date" class="block mt-1" type="date" name="date" required />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="time" :value="__('Время')" />
            <x-text-input id="time" class="block mt-1" type="time" name="time" required />
            <x-input-error :messages="$errors->get('time')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="number" :value="__('Количество игроков')" />
            <x-text-input id="number" class="block mt-1" type="text" name="number" required />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="payment" :value="__('Тип оплаты')" />
            <select id="payment" name="payment" class="block mt-1" required>
                <option value="" disabled selected>-- Выберите тип оплаты --</option>
                <option value="Наличный расчет">Наличный расчет</option>
                <option value="Безналичный расчет">Безналичный расчет</option>
            </select>
            <x-input-error :messages="$errors->get('payment')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="ms-3">
                {{ __('Создать') }}
            </x-primary-button>
        </div>
    </div>
</form>
</x-app-layout>
